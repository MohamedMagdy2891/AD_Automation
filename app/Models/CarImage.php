<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getCar()
    {
        return $this->belongsTo(Car::class,'car_id','id');
    }
}
