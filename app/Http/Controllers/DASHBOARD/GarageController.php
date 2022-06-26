<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\GarageDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GarageController extends Controller
{
    public $garageDataResource;
    public function __construct()
    {
        $this->garageDataResource = new GarageDataResource();
    }

    public function Message(){
        return [
            'ar_garage.required' => 'اسم الجراج باللغة العربية مطلوب',
            'ar_garage.min' => 'اسم الجراج باللغة العربية يجب ان يجتوى على أكثر من 3 أحرف',
            'en_garage.required' => 'اسم الجراج باللغة الانجليزية مطلوب',
            'en_garage.min' => 'اسم الجراج باللغة الانجليزية يجب ان يجتوى على أكثر من 3 أحرف',
            'ar_address.required' => 'عنوان الجراج باللغة العربية مطلوب',
            'ar_address.min' => 'عنوان الجراج باللغة العربية يجب ان يجتوى على أكثر من 3 أحرف',
            'en_address.required' => 'عنوان الجراج باللغة الانجليزية مطلوب',
            'en_address.min' => 'عنوان الجراج باللغة الانجليزية يجب ان يجتوى على أكثر من 3 أحرف',
            'region_id.required' => 'يجب اختيار المنطقة',
            'lat.required' => 'خط العرض مطلوب',
            'lang.required' => 'خط الطول مطلوب',
        ];
    }
    public function index()
    {
        Session::forget('search');
        Session::forget('search_name');
        $rows =  $this->garageDataResource->getAll();
        return view('dashboard.garage.index',compact('rows'));
    }
    public function create()
    {
        $rows = $this->garageDataResource->getAllRegions();
        return view('dashboard.garage.create',compact('rows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_garage' => 'required|min:3',
            'en_garage' => 'required|min:3',
            'ar_address' => 'required|min:3',
            'en_address' => 'required|min:3',
            'region_id' => 'required',
            'lat' => 'required',
            'lang' => 'required',

        ],$this->Message());

        $row =  $this->garageDataResource->createOne($request->ar_garage,$request->en_garage,$request->ar_address,$request->en_address,
        $request->region_id,$request->lat,$request->lang);
        Session::flash('success', 'تم اضافة '.$row->ar_garage);
        return redirect()->route('dashboard.garage.index');

    }
    public function show($id)
    {
        $rows = $this->garageDataResource->getAllRegions();
        $row =  $this->garageDataResource->getOne($id);
        return view('dashboard.garage.show',compact('row','rows'));
    }
    public function edit($id)
    {
        $row =  $this->garageDataResource->getOne($id);
        $rows = $this->garageDataResource->getAllRegions();
        return view('dashboard.garage.edit',compact('row','rows'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'ar_garage' => 'required|min:3',
            'en_garage' => 'required|min:3',
            'ar_address' => 'required|min:3',
            'en_address' => 'required|min:3',
            'region_id' => 'required',
            'lat' => 'required',
            'lang' => 'required',

        ],$this->Message());

        $row =  $this->garageDataResource->updateOne($id,$request->ar_garage,$request->en_garage,$request->ar_address,$request->en_address,
        $request->region_id,$request->lat,$request->lang);
        $row != null ? Session::flash('success', 'تم تعديل بيانات حراج '.$row->ar_garage):Session::flash('failed', 'لم يتم تعديل بيانات '.$request->ar_garage.' لعدم التغيير فى البيانات');


        return redirect()->route('dashboard.garage.edit',$id);

    }
    public function destroy($id)
    {
        $row =  $this->garageDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات '.$row);
        return redirect()->route('dashboard.garage.index');
    }
    public function deleteAll()
    {
        $row =  $this->garageDataResource->deleteAllData();
        Session::flash('success','تم حذف بيانات كل الحراجات');
        return redirect()->route('dashboard.garage.index');
    }

    public function search(Request $request)
    {
        $rows = $this->garageDataResource->garageSearch($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        return view('dashboard.garage.index',compact('rows'));
    }
}
