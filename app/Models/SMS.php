<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    use HasFactory;
    protected $fillable = ['gateway'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
