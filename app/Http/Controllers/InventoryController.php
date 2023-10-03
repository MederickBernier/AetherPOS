<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Nette\NotImplementedException;

class InventoryController extends Controller
{
    public function index(){
        $items = Item::all();
        return view('inventory.index',compact('items'));
    }

    public function create(){
        return view('inventory.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'quantity' => 'required|integer|min:0',
            'threshold' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $data['name'] = capitalizeItemName($data['name']);

        Item::create($data);

        return redirect()->route('inventory.index')->with('success','Item added successfully');
    }

    public function show(Item $item){
        return view('inventory.show',compact('item'));
    }

    public function edit(Item $item){
        return view('inventory.edit',compact('item'));
    }

    public function update(Request $request, Item $item){
        // Validate the incoming request
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'quantity' => 'required|integer|min:0',
            'threshold' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        // Capitalize the item name
        $data['name'] = capitalizeItemName($data['name']);

        $item->update($data);

        return redirect()->route('inventory.index')->with('success', 'Item updated successfully');
    }

    public function destroy(Item $item){
        $item->delete();
        return redirect()->route('inventory.index')->with('success','Item deleted successfully');
    }

    // Will stay unimplemented until it's required to have it working like the dataset is too large or something.
    public function search(){
        throw new NotImplementedException();
    }

    public function replenish(Item $item, Request $request){
        $request->validate([
            'replenish_quantity' => 'required|integer|min:1'
        ]);

        $item->increment('quantity', $request->input('replenish_quantity'));

        return redirect()->route('inventory.index')->with('success','Item replenished successfully');
    }

    public function deplete(Item $item, Request $request){
        $request->validate([
            'deplete_quantity' => 'required|integer|min:1'
        ]);

        if($item->quantity >= $request->input('deplete_quantity')){
            $item->decrement('quantity', $request->input('deplete_quantity'));
            return redirect()->route('inventory.index')->with('success','Item decremented successfully');
        }else{
            return redirect()->route('inventory.index')->with('error','Insufficient quantity to deplete');
        }
    }
}
