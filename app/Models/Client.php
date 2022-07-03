<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Country;
use App\Models\Order;
class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'fn_name',
        'ln_name',
        'address',
        'phone',
        'date_of_birth',
        'country_id',
        'email',
        'password',
        'photo',
        'verification_code',
        'verification_status'
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];


    public function getCountry(){
        return $this->hasOne(Country::class,'country_id','id');
    }

    public function orders()
        {
            return $this->hasMany(Order::class);
        }


}
