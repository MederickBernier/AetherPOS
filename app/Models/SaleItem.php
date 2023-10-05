<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'item_id',
        'quantity',
        'sold_price',
    ];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function getFinalPriceAttribute()
    {
        $menuItem = $this->item->menuItems->first();
        if ($menuItem->adjustment_type == 'special_price') {
            return $menuItem->special_price;
        } elseif ($menuItem->adjustment_type == 'discount') {
            return $this->item->price - ($this->item->price * ($menuItem->discount / 100));
        } else {
            return $this->item->price;
        }
    }
}
