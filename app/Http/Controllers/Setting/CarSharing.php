<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use App\Models\CarDevice;
class CarSharing{


    private $username = "abud_API_user";
    private $password = "abud_API_user_001";



    public function login(){
        $response = Http::post('https://carsharing.ruptela.com/auth/sessions?version=1', [
            'username' => $this->username,
            'password' => $this->password,
        ]);
        return $response['access_token'];
    }

    public function create($name,$plateNumber,$iemi,$vin){

        $response = Http::withToken($this->login())->post('https://carsharing.ruptela.com/fleets/vehicles?version=2', [
            'name' =>$name,
            'imei' => $iemi,
            'vin'=>$vin,
            'plateNumber'=>$plateNumber
        ]);

        if(($response->status() == 200 ||$response->status() == 201  ) && $response->ok() == true &&$response->successful() == true){
            return $result = ['status' => true,'message'=> 'Done'];
        }
        else if ($response->serverError() == true){
            return $result = ['status' => false,'message'=> 'Server Error'];
        }
        else if($response->clientError() == true){
            return $result = ['status' => false,'message'=> 'Client Error'];
        }
        else if($response->failed() == true){
            return $result = ['status' => false,'message'=> 'Response Failed'];
        }
        else{
            return $result = ['status' => false,'message'=> 'Failed'];
        }
    }

    public function getAll(){

        $response = Http::withToken($this->login())->get('https://carsharing.ruptela.com/fleets/vehicles?version=2');

        if(($response->status() == 200 ||$response->status() == 201  ) && $response->ok() == true &&$response->successful() == true){
            return $result = ['status' => true,'message'=> 'Done','data'=> $response,'accessToken' => $this->login()];
        }
        else if ($response->serverError() == true){
            return $result = ['status' => false,'message'=> 'Server Error','data'=>null,'accessToken' =>null];
        }
        else if($response->clientError() == true){
            return $result = ['status' => false,'message'=> 'Client Error','data'=>null,'accessToken' =>null];
        }
        else if($response->failed() == true){
            return $result = ['status' => false,'message'=> 'Response Failed','data'=>null,'accessToken' =>null];
        }
        else{
            return $result = ['status' => false,'message'=> 'Failed','data'=>null,'accessToken' =>null];
        }
    }
    public function getSingleCarDevice($vin){
        // $car_commandID=$car->commandID;
        $response = Http::withToken($this->login())->get("https://carsharing.ruptela.com/fleets/vehicles/$vin/commands/test-command-0019?version=1");

        if(($response->status() == 200 ||$response->status() == 201  ) && $response->ok() == true &&$response->successful() == true){

            return $result = ['status' => true,'message'=> 'Done','data'=> $response,'accessToken' => $this->login()];
        }
        else if ($response->serverError() == true){
            return "server";
            return $result = ['status' => false,'message'=> 'Server Error','data'=>null,'accessToken' =>null];
        }
        else if($response->clientError() == true){

            return $result = ['status' => false,'message'=> 'Client Error','data'=>null,'accessToken' =>null];
        }
        else if($response->failed() == true){
            return "failed";
            return $result = ['status' => false,'message'=> 'Response Failed','data'=>null,'accessToken' =>null];
        }
        else{
            return "other";
            return $result = ['status' => false,'message'=> 'Failed','data'=>null,'accessToken' =>null];
        }
    }
    public function updateCarDeviceCommandStatus($vin,$commandID){

        $response = Http::withToken($this->login())
        ->post("https://carsharing.ruptela.com/fleets/vehicles/LS5A2ASE9ND916864/commands/unblock?version=1", [
            'commandId' =>$commandID
        ]);
        if(($response->status() == 200 ||$response->status() == 201  ) && $response->ok() == true &&$response->successful() == true){

            return $result = ['status' => true,'message'=> 'Done','data'=> $response,'accessToken' => $this->login()];
        }
        else if ($response->serverError() == true){
            return "server";
            return $result = ['status' => false,'message'=> 'Server Error','data'=>null,'accessToken' =>null];
        }
        else if($response->clientError() == true){

            return $result = ['status' => false,'message'=> 'Client Error','data'=>null,'accessToken' =>null];
        }
        else if($response->failed() == true){
            return "failed";
            return $result = ['status' => false,'message'=> 'Response Failed','data'=>null,'accessToken' =>null];
        }
        else{
            return "other";
            return $result = ['status' => false,'message'=> 'Failed','data'=>null,'accessToken' =>null];
        }
    }
}
