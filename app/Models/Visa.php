<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'result',
        'exp_date_year',
        'exp_date_month',
        'credit_card_type',
        'credit_card_number',
        'csv_number',
        'payment_message_code',
        'payment_message'

    ];

    public function Client(){
        return $this->belongsTo(Client::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
