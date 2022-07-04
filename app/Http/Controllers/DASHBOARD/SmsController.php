<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\SmsDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SmsController extends Controller
{
    public $smsDataResource;
    public function __construct()
    {
        $this->smsDataResource = new SmsDataResource();
    }

    public function index()
    {
        $rows =  $this->smsDataResource->getAll();
        return view('dashboard.sms.index',compact('rows'));
    }

    public function edit()
    {
        $row =  $this->smsDataResource->getOne();
        return view('dashboard.sms.edit',compact('row'));
    }

    public function update(Request $request)
    {
        $row =  $this->smsDataResource->updateOne($request->gateway);
        $row != null ? Session::flash('success', 'تم تعديل اعدادت الرسائل بنجاح '):Session::flash('failed', 'لم يتم تعديل اعدادات الرسائل لعدم التغيير فى البيانات');

        return redirect()->route('dashboard.sms.edit');
    }



}
