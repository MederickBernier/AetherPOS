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
        $this->activeUsers = User::where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.active-users');
    }
}
