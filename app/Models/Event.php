<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'residential_district',
        'ward',
        'plot',
        'menu_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'start_timestamp',
        'end_timestamp'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    protected static function booted(){
        static::saving(function($event){
            $event->start_timestamp = "{$event->start_date} {$event->start_time}";
            $event->end_timestamp = "{$event->end_date} {$event->end_time}";
        });
    }
}
