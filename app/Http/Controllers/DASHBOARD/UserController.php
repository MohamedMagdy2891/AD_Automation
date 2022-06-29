<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\DASHBOARD\Traits\UsersRulesTrait;
use App\Http\Controllers\DASHBOARD\Traits\ImageTrait;

;

class UserController extends Controller
{
    use UsersRulesTrait, ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users =  User::all();
        Session::forget('search');
        Session::forget('search_name');
        $roles =$this->usersRules();
        // $rows = $this->carDataResource->getAll();
        return view('dashboard.user.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles =$this->usersRules();
        return view('dashboard.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        ];
    }
    public function createOne($name,$password,$phone,$email,$type,$image)
    {

        $folder= 'assets/users-images';
        $row = new User();
        $row->password=$password;
        $row->name = $name;
        $row->phone = $phone;
        $row->email = $email;
        $row->type = $type;
        $row->image=$this->Image($row,$folder,$image);

        $row->password=$password;
        $row->save();
        return $row;
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email',
            'image' => 'required|mimes:jpg,jpeg,png',
            'type' => 'required|numeric',
        ],$this->message());
        $password = Hash::make($request->password);

        $row = $this->createOne($request->name,$password,$request->phone,$request->email,$request->type,$request->image);
        Session::flash('success','تم اضافة المستخدم : '.$row->name.' بنجاح');
        return redirect()->route('dashboard.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $users = User::where('id',$id)->first();
        $roles=$this->usersRules();
        return view('dashboard.user.show',compact('users','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=$this->usersRules();
        $users = User::where('id',$id)->first();
        return view('dashboard.user.edit',compact('roles','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOne($id,$name,$password,$phone,$email,$type)
    {
        $row = User::findOrFail($id);
        if($row->name != $name || $row->phone != $phone || $row->email != $email|| $row->type != $type||$row->password != $password ){
            $row->name = $name;
            $row->phone = $phone;
            $row->password = $password;
            $row->email = $email;
            $row->type = $type;
            $row->update();
            return $row;
        }else{
            return null;
        }
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'type' => 'required'
        ],$this->message());
        $password = Hash::make($request->password);
        $row = $this->updateOne($id,$request->name,$password,$request->phone,$request->email,$request->type);

        $row != null ?  Session::flash('success','تم تعديل  بيانات المستخدم : '.$row->name.' بنجاح') : Session::flash('failed','لم يتم التعديل في بيانات المستخدم : '.$request->name);
        return redirect()->route('dashboard.user.edit',$id);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteOne($id)
    {
        $row = User::findOrFail($id);
        $name = $row->name;
        $row->delete();
        return $name;
    }
    public function destroy($id)
    {
        $row =  $this->deleteOne($id);
        Session::flash('success','تم حذف بيانات المستخدم : '.$row);
        return redirect()->route('dashboard.user.index');
    }
    public function UserSearch($code)
    {
        $rows = User::query()->where('name','LIKE','%'.$code.'%')->paginate(15);
        return $rows;
    }
    public function search(Request $request)
    {

        $users = $this->UserSearch($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        return view('dashboard.user.index',compact('users'));
    }
    public function deleteAll()
    {
        $users =  User::whereNotNull('id')->delete();
        return redirect()->route('dashboard.user.index');
    }
}
