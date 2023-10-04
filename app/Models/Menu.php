<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function items()
    {
        return $this
            ->belongsToMany(Item::class, 'menu_items')
            ->withPivot(
                'special_price',
                'discount',
                'adjustment_type'
            );
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
}
