<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\CarDeviceDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarDeviceController extends Controller
{
    public $carDeviceDataResource;
    public function __construct()
    {
        $this->carDeviceDataResource = new CarDeviceDataResource();
    }

    public function Message(){
        return [
            'iemi.required' => 'رقم iemi لجهاز التتبع مطلوب',
            'iemi.unique' => 'رقم iemi لجهاز التتبع مضاف لاحقا ومرتبط بسيارة',
            'vin.required' => 'رقم vin لجهاز التتبع مطلوب',
            'vin.unique' => 'رقم vin لجهاز التتبع مضاف لاحقا ومرتبط بسيارة',
            'car_id.required' => 'يجب اختيار السيارة',

        ];
    }
    public function index()
    {
        Session::forget('search');
        Session::forget('search_name');
        $rows =  $this->carDeviceDataResource->getAll();
        return view('dashboard.car_device.index',compact('rows'));
    }
    public function create()
    {
        $cars = $this->carDeviceDataResource->getAllCars();
        return view('dashboard.car_device.create',compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iemi' => 'required|unique:car_devices,iemi',
            'vin' => 'required|unique:car_devices,vin',
            'car_id' => 'required',

        ],$this->Message());

        $row =  $this->carDeviceDataResource->createOne($request->car_id,$request->iemi,$request->vin);
        Session::flash('success', 'تم اضافة جهاز التتبع الى السيارة : '.$row->getCar->ar_name);
        return redirect()->route('dashboard.device.index');

    }
    public function show($id)
    {
        $cars = $this->carDeviceDataResource->getAllCars();
        $row =  $this->carDeviceDataResource->getOne($id);
        return view('dashboard.car_device.show',compact('row','cars'));
    }
    public function edit($id)
    {
        $row =  $this->carDeviceDataResource->getOne($id);
        $cars = $this->carDeviceDataResource->getAllCars();
        return view('dashboard.car_device.edit',compact('row','cars'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'iemi' => 'required|unique:car_devices,iemi',
            'vin' => 'required|unique:car_devices,vin',
            'car_id' => 'required',

        ],$this->Message());

        $row =  $this->carDeviceDataResource->updateOne($id,$request->car_id,$request->iemi,$request->vin);
        $row != null ? Session::flash('success', 'تم تعديل بيانات جهاز التتبع سيارة '.$row->getCar->ar_name):Session::flash('failed', 'لم يتم تعديل بيانات جهاز التتبع لعدم التغيير فى البيانات');


        return redirect()->route('dashboard.device.edit',$id);

    }
    public function destroy($id)
    {
        $row =  $this->carDeviceDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات بيانات جهاز التتبع سيارة '.$row);
        return redirect()->route('dashboard.device.index');
    }
    public function deleteAll()
    {
        $row =  $this->carDeviceDataResource->deleteAllData();
        Session::flash('success','تم حذف بيانات كل بيانات أجهزة تتبع السيارات');
        return redirect()->route('dashboard.device.index');
    }

    public function search(Request $request)
    {
        $rows = $this->carDeviceDataResource->CarDeviceSearch($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        return view('dashboard.car_device.index',compact('rows'));
    }
}
