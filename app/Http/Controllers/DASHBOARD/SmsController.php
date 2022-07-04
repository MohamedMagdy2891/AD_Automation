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

    public function message()
    {
        $rows =  $this->smsDataResource->getAllMessages();
        return view('dashboard.sms_message.index',compact('rows'));
    }

    public function create()
    {
        return view('dashboard.sms_message.create');
    }

    public function store(Request $request)
    {
        $message = [
            'phone.required' => 'رقم الجوال مطلوب',
            'phone.numeric' => 'رقم الجوال يجب ان يحتوى على أرقام فقط',
            'message.required' => 'يجب كتابة الرسالة'
        ];
        $request->validate([
            'phone' => 'required|numeric',
            'message' => 'required'
        ],$message);

        $row = $this->smsDataResource->sendOneMessage($request->phone,$request->message);
        $row != null ? Session::flash('success', 'تم الرسال الرسالة بنجاح ') : Session::flash('success', 'فشل ارسال الرسالة حاول مجددا ');
        return redirect()->route('dashboard.sms.message.index');


    }



}
