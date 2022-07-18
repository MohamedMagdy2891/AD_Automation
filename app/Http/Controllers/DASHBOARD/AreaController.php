<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\AreaDataResource;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AreaController extends Controller
{
    public $areaDataResource;
    public function __construct()
    {

        $this->areaDataResource = new AreaDataResource();
    }

    public function Message(){

        return [
            'ar_area.required' => 'اسم الموقع باللغة العربية مطلوب',
            'ar_area.min' => 'اسم الموقع باللغة العربية يجب ان يجتوى على أكثر من 3 أحرف',
            'en_area.required' => 'اسم الموقع باللغة الانجليزية مطلوب',
            'en_area.min' => 'اسم الموقع باللغة الانجليزية يجب ان يجتوى على أكثر من 3 أحرف',
            'region_id.required' => 'يجب اختيار المنطقة',
            'lat.required' => 'خط العرض مطلوب',
            'lang.required' => 'خط الطول مطلوب',
        ];
    }
    public function index()
    {
        Session::forget('search');
        Session::forget('search_name');
        $rows =  $this->areaDataResource->getAll();
        return view('dashboard.area.index',compact('rows'));
    }
    public function create()
    {
        $rows = $this->areaDataResource->getAllRegions();
        return view('dashboard.area.create',compact('rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_area' => 'required|min:3',
            'en_area' => 'required|min:3',
            'region_id' => 'required',
            'lat' => 'required',
            'lang' => 'required',

        ],$this->Message());

        $row =  $this->areaDataResource->createOne($request->ar_area,$request->en_area,$request->region_id,$request->lat,$request->lang);
        Session::flash('success', 'تم اضافة موقع '.$row->ar_area);
        return redirect()->route('dashboard.area.index');

    }
    public function show($id)
    {
        $rows = $this->areaDataResource->getAllRegions();
        $row =  $this->areaDataResource->getOne($id);
        return view('dashboard.area.show',compact('row','rows'));
    }
    public function edit($id)
    {
        $row =  $this->areaDataResource->getOne($id);
        $rows = $this->areaDataResource->getAllRegions();
        return view('dashboard.area.edit',compact('row','rows'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'ar_area' => 'required|min:3',
            'en_area' => 'required|min:3',
            'region_id' => 'required',
            'lat' => 'required',
            'lang' => 'required',

        ],$this->Message());

        $row =  $this->areaDataResource->updateOne($id,$request->ar_area,$request->en_area,$request->region_id,$request->lat,$request->lang);
        $row != null ? Session::flash('success', 'تم تعديل بيانات موقع '.$row->ar_area):Session::flash('failed', 'لم يتم تعديل بيانات '.$request->ar_area.' لعدم التغيير فى البيانات');


        return redirect()->route('dashboard.area.edit',$id);

    }
    public function destroy($id)
    {
        $row =  $this->areaDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات موقع '.$row);
        return redirect()->route('dashboard.area.index');
    }
    public function deleteAll()
    {
        $row =  $this->areaDataResource->deleteAllData();
        Session::flash('success','تم حذف بيانات كل المواقع');
        return redirect()->route('dashboard.area.index');
    }

    public function search(Request $request)
    {
        $rows = $this->areaDataResource->areaSearch($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        return view('dashboard.area.index',compact('rows'));
    }
}
