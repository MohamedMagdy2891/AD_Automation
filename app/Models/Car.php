<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_name',
        'en_name',
        'code',
        'color',
        'status_id',
        'model_id',
        'garage_id',
        'category_id',
        'car_model_year',
        'no_doors',
        'no_bags',
        'car_type',
        'price_per_hour',
        'discount_per_hour',
        'discount_price_per_hour',
        'price_per_half_day',
        'discount_per_half_day',
        'discount_price_per_half_day',
        'price_per_day',
        'discount_per_day',
        'discount_price_per_day',
        'insurance',
        'insurance_price',
        'extra_driver',
        'extra_driver_price',
        'shield',
        'shield_price',
        'baby_seat',
        'baby_seat_price',
        'open_kilometers',
        'open_kilometers_price'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function Garage()
    {
        return $this->hasOne(Garage::class,'id','garage_id');
    }

    public function CarModel()
    {
        return $this->hasOne(CarModel::class,'id','model_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function Category()
    {
        return $this->hasOne(CarCategory::class,'id','category_id');
    }
    public function Status()
    {
        return $this->hasOne(CarStatus::class,'id','status_id');
    }


}
