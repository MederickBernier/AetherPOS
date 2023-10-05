<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'total_amount',
        'payment_method_id',
        'is_fc_member',
        'fc_member_name',
    ];

    public function event(){
        return $this->belongsTo(Event::clasS);
    }

    public function saleItems(){
        return $this->hasMany(SaleItem::class);
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
}
