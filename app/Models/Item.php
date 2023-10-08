<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'threshold',
        'priority',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this
            ->belongsToMany(Menu::class)
            ->withPivot(
                'special_price',
                'discount',
                'adjustment_type'
            );
    }

    public function transactions(){
        return $this->belongsToMany(Transaction::class,'transaction_item')->withPivot('quantity')->withTimestamps();
    }
}
