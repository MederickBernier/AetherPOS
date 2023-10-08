<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\Transaction;

class EventSales extends Component
{
    public $totalSales = 0;

    public function mount(){
        $this->fetchTotalSales();
    }

    public function fetchTotalSales(){
        $now = now();
        $activeEvent = Event::where('start_timestamp','<=', $now)->where('end_timestamp','>=',$now)->first();

        if($activeEvent){
            $this->totalSales = Transaction::where('event_id', $activeEvent->id)->sum('total_amount');
        }else{
            $this->totalSales = 0;
        }
    }

    public function render()
    {
        return view('livewire.event-sales');
    }
}
