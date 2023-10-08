<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class, 'transaction_item')->withPivot('quantity')->withTimestamps();
    }
}