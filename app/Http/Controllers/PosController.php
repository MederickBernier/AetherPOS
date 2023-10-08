<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Event;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(){
        // Get the current date and time
        $now = now();

        // Check if there's an active event based on the current date and time
        $activeEvent = Event::where('start_timestamp','<=', $now)->where('end_timestamp','>=',$now)->first();

        if($activeEvent && $activeEvent->menu){
            // Fetch items associated with the active event's menu
            $items = $activeEvent->menu->items;
            $title = $activeEvent->name;

            // Apply the modifications to the items
            foreach($items as $item){
                $pivotData = $item->pivot;

                if($pivotData->special_price){
                    $item->price = floor($pivotData->special_price);
                }elseif($pivotData->discount){
                    $item->price = floor($item->price - ($item->price * ($pivotData->discount/100)));
                }
            }
        }else{
            $items = Item::all();
            $title = "AetherPOS";
        }

        return view('pos.index', compact('items','title'));
    }
}
