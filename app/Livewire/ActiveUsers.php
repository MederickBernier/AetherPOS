<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;

class ActiveUsers extends Component
{
    public $activeUsers;

    public function mount(){
        $this->getActiveUsers();
    }

    public function getActiveUsers(){
        $twoHoursAgo = Carbon::now()->subHours(2);

        // Set is_active to false for users who haven't been active in the last 2 hours
        User::where('is_active', true)->where('last_active', '<=', $twoHoursAgo)->update(['is_active' => false]);

        // Fetch the active users
        $this->activeUsers = User::where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.active-users');
    }
}
