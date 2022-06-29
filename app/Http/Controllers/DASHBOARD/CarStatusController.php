<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CarStatus;

class CarStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message()
    {
        return [
            'ar_name.required' =>'حالة السيارةباللغة العربية  مطلوبة',
            'en_name.required' => 'حالة السيارة باللغة الإنجليزية مطلوبة  ',
            'ar_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل',
            'en_name.min'=>'يجب أن تكون عدد الأحرف 3 أحرف على الأقل'
        ];
    }
    public function index()
    {
        //
        $statuses=CarStatus::all();
        return view('dashboard.car_status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.car_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3'
        ],$this->message());

        $row = new CarStatus();
        $row->ar_name=$request->ar_name;
        $row->en_name = $request->en_name;
        $row->save();

        Session::flash('success','تم اضافة حالة السيارة : '.$row->ar_name.' بنجاح');
        return redirect()->route('dashboard.carstatuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $carStatuses = CarStatus::where('id',$id)->first();
        return view('dashboard.car_status.edit',compact('carStatuses'));
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


        $row = CarStatus::findOrFail($id);
        if($row->ar_name != $request->ar_name || $row->en_name != $request->en_name ){
            $row->ar_name = $request->ar_name;
            $row->en_name = $request->en_name;
            $row->update();
             Session::flash('success','تم تعديل  بيانات حالة السيارة : '.$row->ar_name.' بنجاح');
            return redirect()->route('dashboard.carstatuses.index');

        }else{
            Session::flash('failed','لم يتم التعديل في بيانات حالة السيارة : '.$request->ar_name);
            return redirect()->route('dashboard.carstatuses.index');

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
        $row = CarStatus::findOrFail($id);
        $name = $row->ar_name;
        $row->delete();
        Session::flash('success','تم حذف بيانات حالة السيارة : '.$name);
        return redirect()->route('dashboard.carstatuses.index');
    }


    public function deleteAll()
    {
        $status =  CarStatus::whereNotNull('id')->delete();
        return redirect()->route('dashboard.carstatuses.index');
    }
}