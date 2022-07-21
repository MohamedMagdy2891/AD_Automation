<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\Traits\ResponseData;
use Exception;
use App\Http\Controllers\API\DataResources\ClientAuthResource;
use Illuminate\Support\Facades\DB;

class ClientAuthController extends Controller
{
    use ResponseData;
    public $auth;

    function __construct()
    {
        $this->clientAuth = new ClientAuthResource();
    }


    public function countries()
    {
        array_key_exists('lang', $_GET) == true ? $lang = $_GET['lang'] : $lang = null;
        $rows = $this->clientAuth->getAllCountries($lang);
        return $this->Data($rows,'Success To Get All Countries',true,200);
    }

    public function register(Request $request){

        $rules = [
            'full_name'  => 'required|min:2|max:20',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|email|unique:clients',
            'phone' => 'required|numeric|unique:clients',
            'password' => 'required|min:8|max:30',
            'license_id'  => 'required|numeric',
            'license_image'  => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'photo'  => 'nullable|mimes:jpeg,jpg,png,gif|max:2048'
        ];

        $validation = Validator::make($request->all(),$rules);

        try{
            if($validation->fails()){
                return $this->Data($validation->errors(),'Failed To Register',false,400);
            }
            else{
                DB::beginTransaction();
                $data = $this->clientAuth->register($request->full_name,$request->email,$request->phone,$request->password,
                $request->license_id,$request->license_image);
                DB::commit();

                return $this->Data($data,'User Register Successfuly',true,200);
            }

        }
        catch(Exception $ex){
            DB::rollBack();
            return $this->Data('',$ex);
        }





    }

    public function login(Request $request){

        $rules = [
            'email' => 'nullable',
            'phone' => 'nullable',
            'password' => 'required',
        ];
        $validation = Validator::make($request->all(),$rules);

        try{
            if($validation->fails()){
                return $this->Data($validation->errors(),'Failed To Register',false,400);
            }
            else{
                $data = $this->clientAuth->login($request->email,$request->phone,$request->password);
                if($data['check_Auth_login'] == 1){
                    return $this->Data($data['data'],'User Login Successfuly',true,200);
                }else{
                    return $this->Data($data['data'],'User Not Found',true,200);
                }

            }

        }
        catch(Exception $ex){
            return $this->Data('',$ex);
        }





    }
}
