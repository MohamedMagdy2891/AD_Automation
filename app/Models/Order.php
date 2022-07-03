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
        'kilometers'
    ];


}
