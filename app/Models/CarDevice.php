<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'iemi',
        'vin',
        'status',
        'lock',
        'block'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getCar()
    {
        return $this->hasOne(Car::class,'id','car_id');
    }
}
