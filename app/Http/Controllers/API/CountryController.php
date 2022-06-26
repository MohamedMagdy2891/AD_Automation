<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\DataResources\CountryResource;
use App\Http\Controllers\API\Traits\ResponseData;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use ResponseData;

    public $countryResource;

    public function __construct()
    {
        $this->countryResource = new CountryResource();
    }

    public function index()
    {
        try{
            $data = $this->countryResource->getAllCountries();
            return $this->Data($data,'Countries Return Successfully',true,200);
        }
        catch(Exception $ex){
            return $this->Data('',$ex);
        }
    }
}
