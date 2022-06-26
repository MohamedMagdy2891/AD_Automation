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

    public function register(Request $request){

        $rules = [
            'fn_name'  => 'required|alpha|min:2|max:20',
            'ln_name'  => 'required|alpha|min:2|max:20',
            'phone' => 'required|numeric',
            'address' => 'required',
            'date_of_birth' => 'required|date_format:Y/m/d',
            'country' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|email|unique:users',
            'password' => 'required|min:8|max:30',
            'photo'  => 'nullable|mimes:jpeg,jpg,png,gif|max:2048'
        ];

        $validation = Validator::make($request->all(),$rules);

        try{
            if($validation->fails()){
                return $this->Data($validation->errors(),'Failed To Register',false,400);
            }
            else{
                $request->photo != null ? $photo = $request->photo : $photo = null;

                DB::beginTransaction();
                $data = $this->clientAuth->register($request->fn_name,$request->ln_name,$request->phone,$request->address,
                $request->date_of_birth,$request->country,$request->email,$request->password,$photo);
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
