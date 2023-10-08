<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('menus.index',compact('menus'));
    }

    public function create(){
        $items = Item::all();
        return view('menus.create',compact('items'));
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'items.*.id' => 'required|exists:items,id',
            'items.*.adjustment_type' => 'required|in:none,special_price,discount',
            'items.*.special_price' => 'nullable|numeric',
            'items.*.discount' => 'nullable|integer|min:0|max:100',
        ]);

        $menu = Menu::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        if(isset($data['items']) && !empty($data['items'])){
            foreach($data['items'] as $itemData){
                $itemId = $itemData['id'];
                $adjustmentType = $itemData['adjustment_type'];
                $specialPrice = null;
                $discount = null;

                if ($adjustmentType === 'special_price') {
                    $specialPrice = $itemData['special_price'] ?? null;
                } elseif ($adjustmentType === 'discount') {
                    $discount = $itemData['discount'] ?? null;
                }

                $menu->items()->attach($itemId, [
                    'special_price' => $specialPrice,
                    'discount' => $discount,
                    'adjustment_type' => $adjustmentType,
                ]);
            }
        }

        return redirect()->route('menus.index')->with('success','Menu created successfully');
    }

    public function show(Menu $menu){
        return view('menus.show',compact('menu'));
    }

    public function edit(Menu $menu){
        $items = Item::all();
        return view('menus.edit',compact('menu','items'));
    }

    public function update(Request $request, Menu $menu){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'items.*.id' => 'required|exists:items,id',
            'items.*.adjustment_type' => 'required|in:none,special_price,discount',
            'items.*.special_price' => 'nullable|numeric',
            'items.*.discount' => 'nullable|integer|min:0|max:100',
        ]);

        $menu->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        // Prepare the pivot data for sync
        $syncData = [];
        foreach ($data['items'] as $itemData) {
            $syncData[$itemData['id']] = [
                'adjustment_type' => $itemData['adjustment_type'],
                'special_price' => $itemData['special_price'] ?? null,
                'discount' => $itemData['discount'] ?? null,
            ];
        }

        // Sync the menu's items with pivot data
        $menu->items()->sync($syncData);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully');
    }


    public function destroy(Menu $menu){
        $menu->items()->detach();
        $menu->delete();
        return redirect()->route('menus.index')->with('success','Menu deleted successfully');
    }
}
