<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Session;
class PaymentHistoryController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows= PaymentHistory::all();
        return view('dashboard.payment_history.index',compact('rows'));
    }
    public function searchByIdCard($idCard)
    {
        $rows = PaymentHistory::query()
        ->join('orders', 'orders.id', '=', 'payment_histories.order_id')
        ->join('clients', 'clients.id', '=', 'orders.client_id')
        ->where('clients.idCardNumber','LIKE','%'.$idCard.'%')->paginate(15);
        return $rows;
    }
    public function search(Request $request)
    {
        $rows = $this->searchByIdCard($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);

        return view('dashboard.payment_history.index',compact('rows'));

    }
}
