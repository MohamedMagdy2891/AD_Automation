<?php

namespace App\Http\Controllers\DASHBOARD\DataResources;


use App\Models\Visa;


class VisaDataResource{


    public function getAll()
    {
        $rows = Visa::latest()->paginate(15);
        return $rows;
    }

    public function getOne($id)
    {
        $row = Visa::findOrFail($id);
        return $row;
    }


    public function deleteOne($id)
    {
        $row = Visa::findOrFail($id);
        $number = $row->credit_card_number;
        $row->delete();
        return $number;
    }

    public function searchByIdCard($idCard)
    {
        $rows = Visa::query()
        ->join('clients', 'clients.id', '=', 'visas.client_id')
        ->where('clients.idCardNumber','LIKE','%'.$idCard.'%')->paginate(15);
        return $rows;
    }

}
