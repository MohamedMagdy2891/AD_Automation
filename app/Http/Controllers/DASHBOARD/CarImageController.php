<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\DASHBOARD\DataResources\CarImageDataResource;
use Illuminate\Support\Facades\Session;

class CarImageController extends Controller
{

    public $carImageDataResource;
    public function __construct()
    {
        $this->carImageDataResource = new CarImageDataResource();
    }

    public function message()
    {
        return [
            'image.required' => 'يجب ارفاق ماركة السيارة',
            'image.mimes' => 'صورة السيارة يجب ان تكون بصيغة png , jpg , jpeg فقط',
        ];
    }

    public function index($id)
    {
        $car = $this->carImageDataResource->findCar($id);
        $rows = $this->carImageDataResource->getAll();
        return view('dashboard.car_image.index',compact('rows','car'));
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg'
        ],$this->message());

        $row = $this->carImageDataResource->createOne($id,$request->image);
        Session::flash('success','تم اضافة صورة السيارة بنجاح');
        return redirect()->route('dashboard.car.image',$row);
    }
    public function destroy($id)
    {
        $row =  $this->carImageDataResource->deleteOne($id);
        Session::flash('success','تم حذف صورة السيارة بنجاح');
        return redirect()->route('dashboard.car.image',$row);
    }
}
