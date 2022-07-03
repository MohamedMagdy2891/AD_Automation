<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\ClientDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public $clientDataResource;
    public function __construct()
    {
        $this->clientDataResource = new ClientDataResource();
    }

    public function index()
    {
        $rows = $this->clientDataResource->getAll();
        return view('dashboard.client.index',compact('rows'));
    }

    public function show($id)
    {
        $row = $this->clientDataResource->getOne($id);
        return view('dashboard.client.show',compact('row'));
    }

    public function edit($id)
    {
        $row = $this->clientDataResource->getOne($id);
        return view('dashboard.client.edit',compact('row'));
    }
    public function message()
    {
        return [
            'full_name.required' => 'اسم العميل مطلوب'
        ];
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'full_name' => 'required'
        ],$this->message());
        $row = $this->clientDataResource->updateOne($id,$request->full_name,$request->verification_status);
        $row != null ? Session::flash('success', 'تم تعديل بيانات العميل '.$row->full_name):Session::flash('failed', 'لم يتم تعديل بيانات العميل لعدم التغيير فى البيانات');

        return redirect()->route('dashboard.client.edit',$id);
    }
}
