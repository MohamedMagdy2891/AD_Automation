<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\UserDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\DASHBOARD\Traits\UsersRulesTrait;


class UserController extends Controller
{
    use UsersRulesTrait;

    public $userDataResource;
    public function __construct()
    {
        $this->userDataResource = new UserDataResource();
    }

    public function message()
    {
        return [
            'name.required' => 'اسم المستخدم مطلوب   ',
            'name.min' => 'إسم المستخدم يجب أن يكون ثلاث حروف على الأقل ',
            'phone.required' => 'رقم هاتف المستخدم مطلوب ',
            'phone.min' =>'رقم الهاتف يجب أن يكون 10 أرقام على الأقل',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح ',
            'type.required' => 'يجب إختيار نوع المستخدم',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب ان تحتوى على 8 أحرف أو أرقام على الاقل',
            'password.max' => 'كلمة المرور يجب ان لا تتعدى 20 حرفا او رقما',
            'password_confirmation.required_with' => 'تاكيد كلمة المرور مطلوبة',
            'password_confirmation.same' => 'يجب تطابق كلمتى المرور',

        ];
    }

    public function index()
    {

        $rows =  $this->userDataResource->getAll();
        Session::forget('search');
        Session::forget('search_name');
        $roles =$this->usersRules();
        return view('dashboard.user.index',compact('rows','roles'));
    }


    public function create()
    {
        $roles =$this->usersRules();
        return view('dashboard.user.create',compact('roles'));
    }




    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'type' => 'required|numeric',
            'password' => 'required|min:8|max:20',
            'password_confirmation' => 'required_with:password|same:password',
        ],$this->message());

        $row = $this->userDataResource->createOne($request->name,$request->email,$request->password,$request->phone,$request->type,$request->image);
        Session::flash('success','تم اضافة المستخدم : '.$row->name.' بنجاح');
        return redirect()->route('dashboard.user.index');
    }


    public function show($id)
    {
        $row = $this->userDataResource->getOne($id);
        $roles=$this->usersRules();
        return view('dashboard.user.show',compact('row','roles'));
    }


    public function edit($id)
    {
        $roles=$this->usersRules();
        $row = $this->userDataResource->getOne($id);
        return view('dashboard.user.edit',compact('roles','row'));
    }



    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'type' => 'required|numeric',
        ],$this->message());

        $row = $this->userDataResource->updateOne($id,$request->name,$request->email,$request->phone,$request->type,$request->image);

        $row != null ?  Session::flash('success','تم تعديل  بيانات المستخدم : '.$row->name.' بنجاح') : Session::flash('failed','لم يتم التعديل في بيانات المستخدم : '.$request->name);
        return redirect()->route('dashboard.user.edit',$id);

    }



    public function destroy($id)
    {
        $row =  $this->userDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات المستخدم : '.$row);
        return redirect()->route('dashboard.user.index');
    }

    public function search(Request $request)
    {

        $rows = $this->userDataResource->searchByName($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        $roles =$this->usersRules();
        return view('dashboard.user.index',compact('rows','roles'));
    }
    public function deleteAll()
    {
        $rows =  $this->userDataResource->deleteAllData();
        Session::flash('success','تم حذف كل بيانات المستخدمين ');
        return redirect()->route('dashboard.user.index');
    }
}
