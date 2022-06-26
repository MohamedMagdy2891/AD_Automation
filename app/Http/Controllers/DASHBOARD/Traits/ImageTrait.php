<?php

namespace App\Http\Controllers\DASHBOARD\Traits;

use Illuminate\Database\Eloquent\Model;

Trait ImageTrait{

    public function Image(Model $model,$folder,$image){

        $filename = time().'-'. $image->getClientOriginalName();
        $image->move($folder.'/' , $filename);
        $model->image = $folder.'/'.$filename;
        return $folder.'/'.$filename;

    }

}
