<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Models\Order;
use App\Models\Garage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DASHBOARD\Traits\OrderStatusTrait;

use App\Http\Controllers\DASHBOARD\DataResources\OrderDataResource;
class OrderController extends Controller
{
    use OrderStatusTrait;
    public $OrderDataResource;
    public function __construct()
    {
        $this->OrderDataResource = new OrderDataResource();
    }
    public function message()
    {
        return [
            'clients_id.required' =>'الهوية مطلوبة',
            'car_id.required' => 'يجب إختيار سيارة',
            'receive_place.required'=>' يجب إختيار مكان الإستلام',
            'deliver_place.required'=>'يجب إختيار مكان التسليم',
            'receive_time.required'=>'يجب إختيار وقت الإستلام',
            'deliver_time.required'=>'يجب إختيار وقت التسليم',
            'killometers_consumed.required' => 'مطلوب عدد الكيلومترات  ',
            'support.required'=>'يجب كتابة جهة الدعم الفني  ',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=  $this->OrderDataResource->getAll();
        $status=$this->orderStatus();
        return view('dashboard.order.index',compact('rows','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $rows = $this->OrderDataResource->searchByName($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        $status=$this->orderStatus();
        return view('dashboard.order.index',compact('rows','status'));

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = $this->OrderDataResource->getOne($id);
        $status=$this->orderStatus();
        return view('dashboard.order.show',compact('row','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $row = $this->OrderDataResource->getOne($id);
        $status=$this->orderStatus();
        return view('dashboard.order.edit',compact('status','row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update($id ,Request $request)
    {

        $status=$this->orderStatus();

        $request->validate([
            'client_id'=> 'required',
            'car_id' => 'required',
            'receive_place' => 'required',
            'deliver_place' => 'required',
            'receive_time' => 'required',
            'deliver_time'=> 'required',
            'killometers_consumed' => 'required',
            'support' => 'required',
        ],$this->message());


        $row = $this->OrderDataResource->updateOne($id,
        $request->client_id,
        $request->car_id,
        $request->receive_place,
        $request->deliver_place
        ,$request->receive_time,
        $request->deliver_time,
        $request->killometers_consumed,
        $request->hours_consumed,
        $request->support
        ,$request->total
        );

        $row != null ?  Session::flash('success','تم تعديل  بيانات المستخدم : '.$row->client_id.' بنجاح') : Session::flash('failed','لم يتم التعديل في بيانات المستخدم : '.$request->client_id);

        return redirect()->route('dashboard.orders.edit',$id);

    }

        public function updateStatus($id,Request $request)
        {
            $row = Order::findOrFail($id);
            if($request->has('approve')){
            $row->order_status = 1;
            $row->update();
            return redirect()->route('dashboard.orders.show',$id);
        }else{
            $row->order_status = 2;
            $row->update();
            return redirect()->route('dashboard.orders.show',$id);
        }
        }


}
