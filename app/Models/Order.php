<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Client;
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

    // public function garage(){
    //     return $this->belongsTo(Garage::class);
    // }
    public function Client(){
        return $this->belongsTo(Client::class);
    }
    public function Car(){
        return $this->belongsTo(Car::class);
    }
    public function payment_histories()
    {
        return $this->hasMany(PaymentHistory::class);
    }
}
