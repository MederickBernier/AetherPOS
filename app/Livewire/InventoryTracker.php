<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class InventoryTracker extends Component
{
    public $lowStockItems = [];
    public $progressValue = 100;

    public function mount(){
        $this->getLowStockItems();
    }

    public function getLowStockItems(){
        $this->lowStockItems = Item::whereColumn('quantity','<','threshold')->get();
        $this->progressValue = 100;
    }
    public function render()
    {
        return view('livewire.inventory-tracker');
    }
}
