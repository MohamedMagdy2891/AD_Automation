<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\DASHBOARD\DataResources\VisaDataResource;
use App\Models\Visa;

class VisaController extends Controller
{
    public $VisaDataResource;
    public function __construct()
    {
        $this->VisaDataResource = new VisaDataResource();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=  $this->VisaDataResource->getAll();
        return view('dashboard.visa.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $rows = $this->VisaDataResource->searchByIdCard($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);

        return view('dashboard.visa.index',compact('rows'));

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\visa  $visa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = $this->VisaDataResource->getOne($id);
        return view('dashboard.visa.show',compact('row'));
    }

    public function destroy($id)
    {
        $row =  $this->VisaDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات البطاقة : '.$row);
        return redirect()->route('dashboard.visas.index');
    }


}
