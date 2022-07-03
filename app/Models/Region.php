<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_name','en_name'
    ];

    protected $hidden = ['created_at' , 'updated_at'];

    public function Area(){
        return $this->hasMany(Area::class,'region_id','id');
    }
}
