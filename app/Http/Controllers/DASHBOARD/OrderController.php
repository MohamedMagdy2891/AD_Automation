<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Models\Order;
use App\Models\Garage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\DASHBOARD\DataResources\OrderDataResource;
class OrderController extends Controller
{
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
            'deliver_time.required'=>'يجب إختيار وقت التسليم'
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
        $garages=Garage::all();
        return view('dashboard.order.index',compact('rows'));
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
        return view('dashboard.order.index',compact('rows'));

    }
    public function create()
    {
        //
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
        return view('dashboard.order.show',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
