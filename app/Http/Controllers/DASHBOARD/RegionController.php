<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\RegionDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegionController extends Controller
{
    public $regionDataResource;
    public function __construct()
    {
        $this->regionDataResource = new RegionDataResource();
    }

    public function Message(){
        return [
            'ar_name.required' => 'اسم المطنقة باللغة العربية مطلوب',
            'ar_name.min' => 'اسم المنطقة باللغة العربية يجب ان يجتوى على أكثر من 3 أحرف',
            'en_name.required' => 'اسم المطنقة باللغة الانجليزية مطلوب',
            'en_name.min' => 'اسم المنطقة باللغة الانجليزية يجب ان يجتوى على أكثر من 3 أحرف',
        ];
    }
    public function index()
    {
        $rows =  $this->regionDataResource->getAll();
        return view('dashboard.region.index',compact('rows'));
    }
    public function create()
    {
        return view('dashboard.region.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3'
        ],$this->Message());

        $row =  $this->regionDataResource->createOne($request->ar_name,$request->en_name);
        Session::flash('success', 'تم اضافة '.$row->ar_name);
        return redirect()->route('dashboard.region.index');

    }
    public function show($id)
    {
        $row =  $this->regionDataResource->getOne($id);
        return view('dashboard.region.show',compact('row'));
    }
    public function edit($id)
    {
        $row =  $this->regionDataResource->getOne($id);
        return view('dashboard.region.edit',compact('row'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3'
        ],$this->Message());

        $row =  $this->regionDataResource->updateOne($id,$request->ar_name,$request->en_name);

        $row != null ? Session::flash('success', 'تم تعديل بيانات '.$row->ar_name):Session::flash('failed', 'لم يتم تعديل بيانات  '.$request->ar_name.' لعدم التغيير فى البيانات');


        return redirect()->route('dashboard.region.edit',$id);

    }
    public function destroy($id)
    {
        $row =  $this->regionDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات '.$row);
        return redirect()->route('dashboard.region.index');
    }
    public function deleteAll()
    {
        $row =  $this->regionDataResource->deleteAllData();
        Session::flash('success','تم حذف بيانات كل المناطق');
        return redirect()->route('dashboard.region.index');
    }


}
