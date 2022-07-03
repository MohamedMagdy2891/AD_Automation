<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;

use App\Http\Controllers\DASHBOARD\Traits\ImageTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDataResource{
    use ImageTrait;



    public function getAll()
    {
        $rows = User::latest()->paginate(15);
        return $rows;
    }

    public function createOne($name,$email,$password,$phone,$type,$image)
    {
        $row = new User();
        $row->name = $name;
        $row->email = $email;
        $row->password = Hash::make($password);
        $row->phone = $phone;
        $row->type = $type;
        if($image != null){
            $row->image = $this->Image($row,'Users',$image);
        }
        $row->save();
        return $row;
    }

    public function getOne($id)
    {
        $row = User::findOrFail($id);
        return $row;
    }

    public function updateOne($id,$name,$email,$phone,$type,$image)
    {
        $row = User::findOrFail($id);
        if($row->name != $name || $row->email != $email || $row->phone != $phone || $row->type != $type  || $image != null ){
            $row->name = $name;
            $row->email = $email;
            $row->phone = $phone;
            $row->type = $type;
            if($image != null){
                if($row->image != null){
                    unlink($row->image);
                }
                $row->image = $this->Image($row,'Users',$image);
            }
            $row->update();
            return $row;
        }else{
            return null;
        }

    }

    public function deleteOne($id)
    {
        $row = User::findOrFail($id);
        $name = $row->name;
        if($row->image != null){
            unlink($row->image);
        }
        $row->delete();
        return $name;
    }

    public function deleteAllData()
    {
        $rows = User::get()->all();
        foreach($rows as $row){
            if($row->image != null){
                unlink($row->image);
            }
            $row->delete();
        }
    }

    public function searchByName($name)
    {
        $rows = User::query()->where('name','LIKE','%'.$name.'%')->paginate(15);
        return $rows;
    }


}
