<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Garage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_garage',
        'en_garage',
        'area_id',
        'lat',
        'lang'
    ];

   // protected $foreignKey = 'region_id';

    protected $hidden = [
        'create_at',
        'updated_at'
    ];

    public function Area(){
        return $this->hasOne(Area::class,'id','area_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}
