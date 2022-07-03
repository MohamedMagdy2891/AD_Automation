<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_area',
        'en_area',
        'region_id',
        'lat',
        'lang'
    ];


    public function Region(){
        return $this->hasOne(Region::class,'id','region_id');
    }

    public function Garage(){
        return $this->hasMany(Garage::class,'area_id','id');
    }

}
