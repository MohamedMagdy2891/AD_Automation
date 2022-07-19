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
        $rows =  $this->carDeviceDataResource->getAll()[0];
        $accessToken = $this->carDeviceDataResource->getAll()[1];
        return view('dashboard.car_device.index',compact('rows','accessToken'));
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
        Session::flash('success', 'تم اضافة جهاز التتبع الى السيارة  ');
        return redirect()->route('dashboard.device.index');

    }
    public function show($name,$vin)
    {
        $row =  $this->carDeviceDataResource->getOneCarDeviceCommand($vin);
        return view('dashboard.car_device.show',compact(['row','name']));
    }

    public function update(Request $request,$vin,$commandID)
    {
        $row=$this->carDeviceDataResource->updateOne($vin,$commandID);
        $name =  $request->name;
        $row != null ? Session::flash('success', 'تم تعديل بيانات جهاز التتبع سيارة '):Session::flash('failed', 'لم يتم تعديل بيانات جهاز التتبع لعدم التغيير فى البيانات');
        return redirect()->route('dashboard.device.show',compact(['vin','name']));

    }

}
