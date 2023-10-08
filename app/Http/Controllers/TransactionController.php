<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with(['items', 'user'])->get();
        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request){

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'is_fc_member' => 'required|string', // Validate as a string
        ]);

        // Convert the string to a boolean
        $data['is_fc_member'] = filter_var($data['is_fc_member'], FILTER_VALIDATE_BOOLEAN);

        DB::beginTransaction();

        try {

            $now = now();
            $activeEvent = Event::where('start_timestamp','<=', $now)->where('end_timestamp','>=',$now)->first();

            $transaction = Transaction::create([
                'user_id' => $data['user_id'],
                'total_amount' => 0,
                'event_id' => $activeEvent ? $activeEvent->id : null,  // Associate with the active event if there's one
                'is_fc_member' => $data['is_fc_member'], // Store the boolean value
            ]);

            $totalAmount = 0;

            foreach($data['items'] as $itemData){
                $item = Item::find($itemData['id']);

                // Check if there's enough stock
                if($item->quantity < $itemData['quantity']){
                    throw new \Exception("Not enough stock for item : {$item->name}");
                }

                // Deduct the quantity from inventory
                $item->decrement('quantity', $itemData['quantity']);

                // Use base price initially
                $itemPrice = $item->price;

                // If there's an active event, get the modified price
                if ($activeEvent) {
                    $eventItem = $activeEvent->menu->items->where('id', $item->id)->first();
                    if ($eventItem) {
                        $pivotData = $eventItem->pivot;
                        if ($pivotData->special_price) {
                            $itemPrice = $pivotData->special_price;
                        } elseif ($pivotData->discount) {
                            $itemPrice = $itemPrice - ($itemPrice * ($pivotData->discount / 100));
                        }
                    }
                }

                // If the transaction is for an FC member, set the item price to 0
                if ($data['is_fc_member']) {
                    $itemPrice = 0;
                }

                // Calculate the total amount for this item
                $totalAmount += $itemPrice * $itemData['quantity'];

                // Associate the item with the transaction
                $transaction->items()->attach($item->id, ['quantity' => $itemData['quantity']]);
            }

            $transaction->update(['total_amount' => $totalAmount]);

            // Commit the database transaction
            DB::commit();

            // Return a success response
            return redirect()->route('pos.index')->with('success', 'Transaction completed successfully');

        } catch(\Exception $e) {
            DB::rollBack();

            // Return an error response
            return redirect()->route('pos.index')->with('error', $e->getMessage());
        }
    }

    public function cancel(Transaction $transaction)
    {
    DB::beginTransaction();

    try {
        // Refund the items back to the inventory
        foreach ($transaction->items as $item) {
            $item->increment('quantity', $item->pivot->quantity);
        }

        // Optionally, you can delete the transaction or mark it as cancelled
        $transaction->delete();

        DB::commit();

        return redirect()->route('transactions.index')->with('success', 'Transaction cancelled and items refunded.');

    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->route('transactions.index')->with('error', 'Failed to cancel the transaction: ' . $e->getMessage());
    }
}
}
