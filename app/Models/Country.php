<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_code',
        'country_en_name',
        'country_ar_name',
        'country_en_nationality',
        'country_ar_nationality'
    ];
}
