<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DASHBOARD\DataResources\CarCategoryDataResource;
use App\Models\CarCategory;
use Illuminate\Support\Facades\Session;
class CarCategoryController extends Controller
{
    public $CarCategoryDataResource;
    public function __construct()
    {
        $this->CarCategoryDataResource = new CarCategoryDataResource();
    }


    public function message()
    {
        return [
            'ar_name.required' =>'تصنيف السيارة باللغة العربية  مطلوبة',
            'en_name.required' => 'تصنيف السيارة باللغة الإنجليزية مطلوبة  ',
            'ar_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل',
            'en_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل'
        ];
    }
    public function index()
    {
        $rows=  $this->CarCategoryDataResource->getAll();
        return view('dashboard.car_category.index',compact('rows'));
    }


    public function create()
    {

        return view('dashboard.car_category.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3'
        ],$this->message());


        $row = $this->CarCategoryDataResource->createOne($request->ar_name,$request->en_name);

        Session::flash('success','تم اضافة تصنيف السيارة : '.$request->ar_name.' بنجاح');
        return redirect()->route('dashboard.carcategories.index');
    }


    public function edit($id)
    {

        $row = $this->CarCategoryDataResource->getOne($id);
        return view('dashboard.car_category.edit',compact('row'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3',

        ],$this->message());


        $row = CarCategory::findOrFail($id);
        if($row->ar_name != $request->ar_name || $row->en_name != $request->en_name ){
            $row->ar_name = $request->ar_name;
            $row->en_name = $request->en_name;
            $row->update();
             Session::flash('success','تم تعديل  بيانات تصنيف السيارة : '.$row->ar_name.' بنجاح');
            return redirect()->route('dashboard.carcategories.edit',$id);

        }else{
            Session::flash('failed','لم يتم التعديل في بيانات تصنيف السيارة : '.$request->ar_name);
            return redirect()->route('dashboard.carcategories.edit',$id);

        }

    }




    public function destroy($id)
    {
        $row = CarCategory::findOrFail($id);
        $name = $row->ar_name;
        $row->delete();
        Session::flash('success','تم حذف بيانات تصنيف السيارة : '.$name);
        return redirect()->route('dashboard.carcategories.index');
    }


    public function deleteAll()
    {
        $status =  CarCategory::whereNotNull('id')->delete();
        return redirect()->route('dashboard.carcategories.index');
    }
}
