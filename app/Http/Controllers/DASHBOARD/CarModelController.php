<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\CarModelDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarModelController extends Controller
{
    public $carModelDataResource;
    public function __construct()
    {
        $this->carModelDataResource = new CarModelDataResource();
    }
    public function message()
    {
        return [
            'ar_name.required' => 'اسم موديل السيارة باللغة العربية مطلوب',
            'ar_name.min' => 'اسم موديل السيارة باللغة العربية يجب ان يجتوى على أكثر من 3 أحرف',
            'en_name.required' => 'اسم موديل السيارة باللغة الانجليزية مطلوب',
            'en_name.min' => 'اسم موديل السيارة باللغة الانجليزية يجب ان يجتوى على أكثر من 3 أحرف',
            'image.required' => 'يجب ارفاق صورة موديل السيارة',
            'image.mimes' => 'صورة موديل السيارة يجب ان تكون بصيغة png , jpg , jpeg فقط',
        ];
    }
    public function index()
    {
        Session::forget('search');
        Session::forget('search_name');
        $rows = $this->carModelDataResource->getAll();
        return view('dashboard.car_model.index',compact('rows'));
    }
    public function create()
    {
        return view('dashboard.car_model.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3',
            'image' => 'required|mimes:png,jpg,jpeg',
        ],$this->message());

        $row = $this->carModelDataResource->createOne($request->ar_name,$request->en_name,$request->image);
        Session::flash('success','تم اضافة موديل السيارة : '.$row->ar_name.' بنجاح');
        return redirect()->route('dashboard.car-model.index');

    }


    public function show($id)
    {
        $row = $this->carModelDataResource->getOne($id);
        return view('dashboard.car_model.show',compact('row'));
    }

    public function edit($id)
    {
        $row = $this->carModelDataResource->getOne($id);
        return view('dashboard.car_model.edit',compact('row'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3',
            'image' => 'nullable|mimes:png,jpg,jpeg,JPG,JPEG',
        ],$this->message());
        $row = $this->carModelDataResource->updateOne($id,$request->ar_name,$request->en_name,$request->image);
        $row != null ?  Session::flash('success','تم تعديل موديل السيارة : '.$row->ar_name.' بنجاح') : Session::flash('failed','لم يتم التعديل في موديل السيارة : '.$request->ar_name.' لعدوم التغيير فى البيانات');
        return redirect()->route('dashboard.car-model.edit',$id);

    }

    public function destroy($id)
    {
        $row =  $this->carModelDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات موديل السيارة : '.$row);
        return redirect()->route('dashboard.car-model.index');
    }

    public function deleteAll()
    {
        $row =  $this->carModelDataResource->deleteAllData();
        Session::flash('success','تم حذف بيانات كل موديلات السيارات');
        return redirect()->route('dashboard.car-model.index');
    }

    public function search(Request $request)
    {
        $rows = $this->carModelDataResource->carModelSearch($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        return view('dashboard.car_model.index',compact('rows'));
    }
}
