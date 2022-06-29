<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
