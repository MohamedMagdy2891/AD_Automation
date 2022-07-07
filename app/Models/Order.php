<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'car_id',
        'receive_place',
        'deliver_place',
        'receive_time',
        'deliver_time',
        'killometers_consumed',
        'hours_consumed',
        'extra_driver_price',
        'shield_price',
        'baby_seat_price',
        'open_kilometers_price',
        'order_status',
        'support',
        'total',
        'extra_driver_checked',
        'shield_checked',
        'baby_seat_checked',
        'open_kilometers_checked',
        'user_id'
    ];

    public function Garage1(){
        return $this->belongsTo(Garage::class,'receive_place');
    }
    public function Garage2(){
        return $this->belongsTo(Garage::class,'deliver_place');
    }
    public function Client(){
        return $this->belongsTo(Client::class);
    }
    public function Car(){
        return $this->belongsTo(Car::class);
    }
    public function Visa(){
        return $this->belongsTo(Visa::class);
    }
}
