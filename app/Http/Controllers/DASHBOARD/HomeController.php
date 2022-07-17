<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DASHBOARD\Traits\ImageTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    use ImageTrait;
    public function index()
    {
        return view('dashboard.index');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function updateProfile(Request $request)
    {
        $message = [
            'name.required' => 'اسم المستخدم مطلوب',
            'phone.required' => 'رقم الجوال مطلوب'
        ];
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ],$message);
        if(Auth::user()->name != $request->name || Auth::user()->phone != $request->phone || $request->image != null){
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            if($request->image != null){
                if($user->image != null){
                    unlink($user->image);
                }
                $user->image = $this->Image($user,'Users',$request->image);

            }
            $user->update();
            Session::flash('success','تم تعديل  بياناتك  بنجاح');

        }else{
            Session::flash('failed','لم يتم تعديل بياناتك لعدم التغيير فى البيانات ');
        }
        return redirect()->route('dashboard.profile');
    }


    public function changePassword()
    {
        return view('dashboard.changePassword');
    }

    public function updateChangePassword(Request $request)
    {
        $message = [
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب ان تحتوى على 8 أحرف أو أرقام على الاقل',
            'password.max' => 'كلمة المرور يجب ان لا تتعدى 20 حرفا او رقما',
            'password_confirmation.required_with' => 'تاكيد كلمة المرور مطلوبة',
            'password_confirmation.same' => 'يجب تطابق كلمتى المرور',
        ];

        if($request->password != null && $request->password_confirmation != null){
            $request->validate([
                'password' => 'required|min:8|max:20',
                'password_confirmation' => 'required|required_with:password|same:password'
            ],$message);
        }else{
            Session::flash('failed','لم يتم تعديل بياناتك لعدم التغيير فى البيانات ');
        }

        if($request->password != null){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->update();
            Session::flash('success','تم تعديل  بياناتك  بنجاح');

        }else{
            Session::flash('failed','لم يتم تعديل بياناتك لعدم التغيير فى البيانات ');
        }
        return redirect()->route('dashboard.changePassword');
    }

    public function logout(Request $request)
    {
        Auth::logout();


        return redirect('/login');
    }



}
