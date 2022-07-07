<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\DASHBOARD\DataResources\VisaDataResource;


class VisaController extends Controller
{
    public $VisaDataResource;
    public function __construct()
    {
        $this->VisaDataResource = new VisaDataResource();
    }



    public function index()
    {
        Session::forget('search');
        Session::forget('search_name');
        $rows=  $this->VisaDataResource->getAll();
        return view('dashboard.visa.index',compact('rows'));
    }


    public function search(Request $request)
    {

        $rows = $this->VisaDataResource->searchByIdCard($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);

        return view('dashboard.visa.index',compact('rows'));

    }





}
