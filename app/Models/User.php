<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'character_first_name',
        'character_last_name',
        'character_server',
        'email',
        'password',
        'is_active',
        'last_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_active' => 'datetime',
    ];

    public function getIsOnlineAttribute()
    {
        if ($this->is_active && $this->last_active->diffInMinutes(now()) < 5) {
            return true;
        }
        return false;
    }
}
