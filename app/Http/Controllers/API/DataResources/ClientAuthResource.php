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

    public function getAllCountries($lang = null)
    {
        $rows = Country::get()->all();
        $data = [];
        foreach($rows as $row){
            if($lang == "ar"){

                array_push($data , [
                    'id' => $row->id,
                    'nationality' =>  $row->country_ar_nationality
                ]);
            }else{
                array_push($data , [
                    'id' => $row->id,
                    'nationality' => $row->country_en_nationality
                ]);
            }
        }
        return $data;
    }


    public function register($full_name,$email,$phone,$password,$license_id,$license_image,$country,$lang = null){

        $this->client->full_name  = $full_name;
        $this->client->email = $email;
        $this->client->phone = $phone;
        $this->client->password = Hash::make($password);
        $this->client->license_id  = $license_id;
        $this->client->license_image  = $this->LicenseImage($this->client,'/Clients_Licenses',$license_image);
        $this->client->country_id  = $country;
        $this->client->verification_code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->client->photo = null;
        $this->client->saveOrFail();


        $token = $this->client->createToken('Automation - client Token')->accessToken;

        $client_find = $this->client::find($this->client->id);
        $country_row = Country::find($country);
        if($lang == "ar"){
            $nationality =  $country_row->country_ar_nationality;
        }else{
            $nationality =  $country_row->country_en_nationality;
        }
        $data = [
            'id' => $this->client->id,
            'full_name'  => $this->client->full_name,
            'email' => $this->client->email,
            'phone' => $this->client->phone,
            'photo'  => $client_find->photo == null ? null : env('APP_URL').$client_find->photo ,
            'license_id' => $this->client->license_id,
            'license_image' => env('APP_URL').$this->client->license_image,
            'nationality' => $nationality,
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
                'full_name'  => $client_find->full_name,
                'email' => $client_find->email,
                'phone' => $client_find->phone,
                'photo'  => $client_find->photo != null ? env('APP_URL').$client_find->photo : null,
                'license_id' => $client_find->license_id,
                'license_image' => env('APP_URL').$client_find->license_image,
                'nationality' => 'ss',
                'verification_code' => $client_find->verification_code,
                'verification_status' => $client_find->verification_status,
                'token' => $token

            ];
        }
        $collection = [
            'check_Auth_login' => $check_Auth_login,
            'data' => $data
        ];
        return $collection;

    }

}
