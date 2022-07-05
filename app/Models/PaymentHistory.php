<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_message_code',
        'payment_message'

    ];

    public function Order(){
        return $this->belongsTo(Order::class);
    }
}
