<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\CarStatusDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CarStatus;

class CarStatusController extends Controller
{

    public $carStatusDataResource;
    public function __construct()
    {
        $this->carStatusDataResource = new CarStatusDataResource();
    }


    public function message()
    {
        return [
            'ar_name.required' =>'حالة السيارة باللغة العربية  مطلوبة',
            'en_name.required' => 'حالة السيارة باللغة الإنجليزية مطلوبة  ',
            'ar_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل',
            'en_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل'
        ];
    }
    public function index()
    {

        $rows=  $this->carStatusDataResource->getAll();
        return view('dashboard.car_status.index',compact('rows'));
    }


    public function create()
    {

        return view('dashboard.car_status.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3'
        ],$this->message());


        $row = $this->carStatusDataResource->createOne($request->ar_name,$request->en_name);

        Session::flash('success','تم اضافة حالة السيارة : '.$row->ar_name.' بنجاح');
        return redirect()->route('dashboard.carstatuses.index');
    }


    public function edit($id)
    {
        $row = $this->carStatusDataResource->getOne($id);
        return view('dashboard.car_status.edit',compact('row'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3',

        ],$this->message());


        $row =  $this->carStatusDataResource->updateOne($id,$request->ar_name,$request->en_name);
        $row != null ? Session::flash('success', 'تم تعديل بيانات حالة سيارة '.$row->ar_name):Session::flash('failed', 'لم يتم تعديل بيانات حالة السيارة لعدم التغيير فى البيانات');


        return redirect()->route('dashboard.carstatuses.edit',$id);
    }


    public function destroy($id)
    {
        $row =  $this->carStatusDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات بيانات حالة سيارة '.$row);
        return redirect()->route('dashboard.carstatuses.index');
    }


    public function deleteAll()
    {
        $row =  $this->carStatusDataResource->deleteAllData();
        Session::flash('success','تم حذف بيانات كل بيانات حالات السيارات');
        return redirect()->route('dashboard.carstatuses.index');
    }
}
