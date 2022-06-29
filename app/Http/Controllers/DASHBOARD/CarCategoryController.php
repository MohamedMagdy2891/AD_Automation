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
            'ar_name.required' =>'حالة السيارة باللغة العربية  مطلوبة',
            'en_name.required' => 'حالة السيارة باللغة الإنجليزية مطلوبة  ',
            'ar_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل',
            'en_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل'
        ];
    }
    public function index()
    {
        $categories=  $this->CarCategoryDataResource->getAll();
        return view('dashboard.car_category.index',compact('categories'));
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

        $row = new CarCategory();
        $row->ar_name=$request->ar_name;
        $row->en_name = $request->en_name;
        $row->save();

        $row = $this->CarCategoryDataResource->createOne($request->ar_name,$request->en_name);

        Session::flash('success','تم اضافة حالة السيارة : '.$row->ar_name.' بنجاح');
        return redirect()->route('dashboard.carcategory.index');
    }


    public function edit($id)
    {

        $CarCategories = $this->CarCategoryDataResource->getOne($id);
        return view('dashboard.car_status.edit',compact('carCategories'));
    }
  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
             Session::flash('success','تم تعديل  بيانات حالة السيارة : '.$row->ar_name.' بنجاح');
            return redirect()->route('dashboard.carcategory.index');

        }else{
            Session::flash('failed','لم يتم التعديل في بيانات حالة السيارة : '.$request->ar_name);
            return redirect()->route('dashboard.carcategory.index');

        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $row = CarCategory::findOrFail($id);
        $name = $row->ar_name;
        $row->delete();
        Session::flash('success','تم حذف بيانات حالة السيارة : '.$name);
        return redirect()->route('dashboard.carcategory.index');
    }


    public function deleteAll()
    {
        $status =  CarCategory::whereNotNull('id')->delete();
        return redirect()->route('dashboard.carcategory.index');
    }
}
