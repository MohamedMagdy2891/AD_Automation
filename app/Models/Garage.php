<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Garage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_garage',
        'en_garage',
        'ar_address',
        'en_address',
        'region_id',
        'lat',
        'lang'
    ];

   // protected $foreignKey = 'region_id';


    protected $hidden = [
        'create_at',
        'updated_at'
    ];

    public function Region(){
        return $this->belongsTo(Region::class);
    }
    public function orders()
        {
            return $this->hasMany(Order::class);
        }
}
