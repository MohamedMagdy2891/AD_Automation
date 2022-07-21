<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Country;
use App\Models\Order;
use App\Models\Visa;
class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'photo',
        'licenese_id',
        'licenese_image',
        'country_id',
        'password',
        'verification_code',
        'verification_status'
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];




    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function visas()
    {
        return $this->hasMany(Visa::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class,'id','client_id');
    }

}
