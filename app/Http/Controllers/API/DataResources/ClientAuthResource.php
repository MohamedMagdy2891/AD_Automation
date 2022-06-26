<?php
namespace App\Http\Controllers\API\DataResources;
use App\Models\Client;
use App\Models\Country;
use App\Http\Controllers\API\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;

class ClientAuthResource{
    use ImageTrait;
    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }


    public function register($fn_name,$ln_name,$phone,$address,$date_of_birth,$country,$email,$password,$photo=null){

        $photo != null ? $photo = $this->Image($this->client,'clients',$photo) : $photo = null;


        $this->client->fn_name  = $fn_name;
        $this->client->ln_name  = $ln_name;
        $this->client->phone = $phone;
        $this->client->address = $address;
        $this->client->date_of_birth = $date_of_birth;
        $this->client->country_id = $country;
        $this->client->email = $email;
        $this->client->password = Hash::make($password);
        $this->client->photo  = $photo;
        $this->client->verification_code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->client->getCountry($this->client->country_id);
        $this->client->saveOrFail();


        $token = $this->client->createToken('Automation this->client Token')->accessToken;

        $client_find = $this->client::find($this->client->id);
        $country_find = Country::find($client_find->country_id);

        $data = [
            'id' => $this->client->id,
            'fn_name'  => $this->client->fn_name,
            'ln_name'  => $this->client->ln_name,
            'phone' => $this->client->phone,
            'address' => $this->client->address,
            'date_of_birth' => $this->client->date_of_birth,
            'country' => $country_find,
            'email' => $this->client->email,
            'verification_code' => $this->client->verification_code,
            'verification_status' => $client_find->verification_status,
            'photo'  => env('DOMAIN').$client_find->photo,
            'token' => $token,

        ];
        return $data;


    }

    public function login($email=null,$phone=null,$password){

        if( $email != null){
            $client_find = $this->client->query()->where('email',$email)->first();
        }

        //Auth by Phone
        if($phone != null ){
            $client_find = $this->client->query()->where('phone',$phone)->first();
        }

        $data = [];
        if($client_find != null){
            Hash::check($password, $client_find->password) ? $check_Auth_login = 1 : $check_Auth_login = 0;
        }


        if($check_Auth_login == 1){
            $client_find->tokens()->delete();
            $token = $client_find->createToken('Automation this->client Token')->accessToken;
            $country_find = Country::find($client_find->country_id);

            $data = [
                'id' => $client_find->id,
                'fn_name'  => $client_find->fn_name,
                'ln_name'  => $client_find->ln_name,
                'phone' => $client_find->phone,
                'address' => $client_find->address,
                'date_of_birth' => $client_find->date_of_birth,
                'country' => $country_find,
                'email' => $client_find->email,
                'verification_code' => $client_find->verification_code,
                'verification_status' => $client_find->verification_status,
                'photo'  => env('DOMAIN').$client_find->photo,
                'token' => $token,
            ];
        }
        $collection = [
            'check_Auth_login' => $check_Auth_login,
            'data' => $data
        ];
        return $collection;

    }

}
