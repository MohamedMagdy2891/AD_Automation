<?php
namespace App\Http\Controllers\API\DataResources;
use App\Models\Client;
use App\Http\Controllers\API\Traits\LicenseImageTrait;
use App\Http\Controllers\API\Traits\PhotoTrait;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;

class ClientAuthResource{
    use PhotoTrait,LicenseImageTrait;
    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getAllCountries()
    {
        $rows = Country::latest();
        return $rows;
    }


    public function register($full_name,$email,$phone,$password,$license_id,$license_image,$photo=null){

        $photo != null ? $photo = $this->photo($this->client,'Clients',$photo) : $photo = null;


        $this->client->full_name  = $full_name;
        $this->client->email = $email;
        $this->client->phone = $phone;
        $this->client->password = Hash::make($password);
        $this->client->photo  = $photo;
        $this->client->license_id  = $license_id;
        $this->client->license_image  = $this->LicenseImage($this->client,'Clients_Licenses',$license_image);
        $this->client->verification_code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->client->saveOrFail();


        $token = $this->client->createToken('Automation - client Token')->accessToken;

        $client_find = $this->client::find($this->client->id);

        $data = [
            'id' => $this->client->id,
            'full_name'  => $this->client->full_name,
            'email' => $this->client->email,
            'phone' => $this->client->phone,
            'photo'  => $client_find->photo != null ? env('DOMAIN').$client_find->photo : null,
            'license_id' => $this->client->license_id,
            'license_image' => env('DOMAIN').$this->client->license_image,
            'verification_code' => $this->client->verification_code,
            'verification_status' => $client_find->verification_status,
            'token' => $token

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

            $data = [
                'id' => $client_find->id,
                'fn_name'  => $client_find->fn_name,
                'ln_name'  => $client_find->ln_name,
                'phone' => $client_find->phone,
                'address' => $client_find->address,
                'date_of_birth' => $client_find->date_of_birth,
                'email' => $client_find->email,
                'verification_code' => $client_find->verification_code,
                'verification_status' => $client_find->verification_status,
                'image'  => env('DOMAIN').$client_find->image,
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
