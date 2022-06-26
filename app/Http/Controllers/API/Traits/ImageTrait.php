<?php

namespace App\Http\Controllers\API\Traits;

use Illuminate\Database\Eloquent\Model;

Trait ImageTrait{

    public function Image(Model $model,$folder,$photo){

        $filename = time().'-'. $photo->getClientOriginalName();
        $photo->move($folder.'/' , $filename);
        $model->photo = $folder.'/'.$filename;
        return $folder.'/'.$filename;

    }

}
