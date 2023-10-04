<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;

class UpcomingEvents extends Component
{
    public $events;

    public function mount(){
        $this->fetchEvents();
    }

    public function fetchEvents()
    {
        $now = Carbon::now();
        $this->events = Event::whereDate('end_date', '>=', $now->toDateString())
            ->orWhere(function ($query) use ($now) {
                $query->whereDate('end_date', '=', $now->toDateString())
                      ->whereTime('end_time', '>', $now->toTimeString());
            })
            ->orderBy('start_date', 'asc')
            ->orderBy('start_time', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.upcoming-events');
    }
}
