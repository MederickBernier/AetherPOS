<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
