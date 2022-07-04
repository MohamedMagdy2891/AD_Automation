<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'message',
        'gateway'
    ];

    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

}
