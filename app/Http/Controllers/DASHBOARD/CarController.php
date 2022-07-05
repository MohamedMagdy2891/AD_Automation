<?php

namespace App\Http\Controllers\DASHBOARD;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DASHBOARD\DataResources\CarDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DASHBOARD\Traits\ColorsTrait;
use App\Http\Controllers\DASHBOARD\Traits\CategoriesTrait;
use App\Http\Controllers\DASHBOARD\Traits\StatusTrait;
use App\Http\Controllers\DASHBOARD\Traits\TransmissionsTrait;
use App\Models\CarModel;
use App\Models\Garage;

class CarController extends Controller
{
    use ColorsTrait,TransmissionsTrait;

    public $carDataResource;
    public function __construct()
    {
        $this->carDataResource = new CarDataResource();
    }
    public function message()
    {
        return [
            'ar_name.required' => 'اسم السيارة باللغة العربية مطلوب',
            'ar_name.min' => 'اسم السيارة باللغة العربية يجب ان يحتوى على أكثر من 3 أحرف',
            'en_name.required' => 'اسم السيارة باللغة الانجليزية مطلوب',
            'en_name.min' => 'اسم السيارة باللغة الانجليزية يجب ان يحتوى على أكثر من 3 أحرف',
            'code.required' => 'كود السيارة مطلوب',
            'planet_number_1.required' => 'حروف لوحة السيارة مطلوبة',
            'planet_number_2.required' => 'أرقام لوحة السيارة مطلوبةس',
            'color.required' => 'لون السيارة مطلوب',
            'color.required' => 'حالة السيارة مطلوب',
            'status_id.required' => 'حالة السيارة مطلوب',
            'model_id.required' => 'ماركة السيارة مطلوبة',
            'garage_id.required' =>'حراج السيارة مطلوب',
            'category_id.required' => 'قسم السيارة مطلوب',
            'car_model_year.required' => 'موديل السيارة مطلوب',
            'car_model_year.numeric' => 'موديل السيارة يجب ان يحتوى على أرقام فقط',
            'car_model_year.digits' => 'موديل السيارة يجب ان يحتوى على 4 أرقام فقط',
            'no_doors.required' => 'عدد أبواب السيارة مطلوب',
            'no_doors.numeric' => 'عدد أبواب السيارة يجب ان يحتوى على أرقام فقط',
            'no_bags.required' => 'عدد شنط السيارة مطلوب',
            'no_bags.numeric' => 'عدد شنط السيارة يجب ان يحتوى على أرقام فقط',
            'car_type.required' => 'ناقل الحركة مطلوب',
            'price_per_hour.required' => 'سعر الساعة مطلوب',
            'price_per_hour.numeric' => 'سعر الساعة يجب ان يحتوى على أرقام فقط',
            'discount_per_hour.required' => 'خصم الساعة مطلوب',
            'discount_per_hour.numeric' => 'خصم الساعة يجب ان يحتوى على أرقام فقط',
            'price_per_half_day.required' => 'سعر نصف اليوم مطلوب',
            'price_per_half_day.numeric' => 'سعر نصف اليوم يجب ان يحتوى على أرقام فقط',
            'discount_per_half_day.required' => 'خصم نصف اليوم مطلوب',
            'discount_per_half_day.numeric' => 'خصم نصف اليوم يجب ان يحتوى على أرقام فقط',
            'price_per_day.required' =>'سعر اليوم مطلوب',
            'price_per_day.numeric' =>'سعر اليوم يجب ان يحتوى على أرقام فقط',
            'discount_per_day.required' => 'خصم سعر اليوم مطلوب',
            'discount_per_day.numeric' => 'خصم سعر اليوم يجب ان يحتوى على أرقام فقط',

        ];
    }
    public function index()
    {

        $transmissions =  $this->getTransmissions();
        Session::forget('search');
        Session::forget('search_name');
        $rows = $this->carDataResource->getAll();
        return view('dashboard.car.index',compact('rows','transmissions'));
    }
    public function create()
    {
        $colors =  $this->getColors();
        $transmissions =  $this->getTransmissions();
        $categories =  $this->carDataResource->getAllCategories();
        $statuss =  $this->carDataResource->getAllStatus();
        $carModels = CarModel::get()->all();
        $garages = Garage::get()->all();
        return view('dashboard.car.create',compact('colors','carModels','categories','garages','transmissions','statuss'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3',
            'code' => 'required',
            'planet_number_1' => 'required',
            'planet_number_2' => 'required',
            'color' => 'required',
            'status_id' => 'required',
            'model_id' => 'required',
            'garage_id' =>'required',
            'category_id' => 'required',
            'car_model_year' => 'required|numeric|digits:4',
            'no_doors' => 'required|numeric',
            'no_bags' => 'required|numeric',
            'car_type' => 'required',
            'price_per_hour' => 'numeric',
            'discount_per_hour' => 'numeric',
            'price_per_half_day' => 'numeric',
            'discount_half_day' => 'numeric',
            'price_per_day' =>'numeric',
            'discount_per_day' => 'numeric',
        ],$this->message());


        $planet_number = $request->planet_number_2.' '.$request->planet_number_1;

        $discount_price_per_hour  = $request->price_per_hour - ($request->price_per_hour * ($request->discount_per_hour/100));
        $discount_price_per_half_day  = $request->price_per_half_day - ($request->price_per_half_day * ($request->discount_per_half_day/100));
        $discount_price_per_day  = $request->price_per_day - ($request->price_per_day * ($request->discount_per_day/100));


        $request->has('insurance') ? $insurance = true : $insurance = false;
        $request->has('extra_driver') ? $extra_driver = true : $extra_driver = false;
        $request->has('shield') ? $shield = true : $shield = false;
        $request->has('baby_seat') ? $baby_seat = true : $baby_seat = false;
        $request->has('open_kilometers') ? $open_kilometers = true : $open_kilometers = false;

        $request->insurance_price != null ? $insurance_price = $request->insurance_price : $insurance_price = 0.00;
        $request->extra_driver_price != null ? $extra_driver_price = $request->extra_driver_price : $extra_driver_price = 0.00;
        $request->shield_price != null ? $shield_price = $request->shield_price : $shield_price = 0.00;
        $request->baby_seat_price != null ? $baby_seat_price = $request->baby_seat_price : $baby_seat_price = 0.00;
        $request->open_kilometers_price != null ? $open_kilometers_price = $request->open_kilometers_price : $open_kilometers_price = 0.00;

        $row = $this->carDataResource->createOne($request->ar_name,$request->en_name,$request->code,$planet_number,$request->color,$request->status_id,
        $request->model_id,$request->garage_id,$request->category_id,$request->car_model_year,$request->no_doors,$request->no_bags,$request->car_type,
        $request->price_per_hour,$request->discount_per_hour,$discount_price_per_hour,
        $request->price_per_half_day,$request->discount_per_half_day,$discount_price_per_half_day,
        $request->price_per_day,$request->discount_per_day,$discount_price_per_day,
        $insurance,$insurance_price,
        $extra_driver,$extra_driver_price,
        $shield,$shield_price,
        $baby_seat,$baby_seat_price,
        $open_kilometers,$open_kilometers_price);


        Session::flash('success','تم اضافة السيارة : '.$row->ar_name.' بنجاح');
        return redirect()->route('dashboard.car.index');

    }


    public function show($id)
    {
        $colors =  $this->getColors();
        $transmissions =  $this->getTransmissions();
        $categories =  $this->carDataResource->getAllCategories();
        $statuss =  $this->carDataResource->getAllStatus();
        $carModels = CarModel::get()->all();
        $garages = Garage::get()->all();
        $row = $this->carDataResource->getOne($id);
        return view('dashboard.car.show',compact('row','colors','carModels','categories','garages','transmissions','statuss'));
    }

    public function edit($id)
    {
        $colors =  $this->getColors();
        $transmissions =  $this->getTransmissions();
        $categories =  $this->carDataResource->getAllCategories();
        $statuss =  $this->carDataResource->getAllStatus();
        $carModels = CarModel::get()->all();
        $garages = Garage::get()->all();
        $row = $this->carDataResource->getOne($id);
        return view('dashboard.car.edit',compact('row','colors','carModels','categories','garages','transmissions','statuss'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3',
            'code' => 'required',
            'planet_number_1' => 'required',
            'planet_number_2' => 'required',
            'color' => 'required',
            'status_id' => 'required',
            'model_id' => 'required',
            'garage_id' =>'required',
            'category_id' => 'required',
            'car_model_year' => 'required|numeric|digits:4',
            'no_doors' => 'required|numeric',
            'no_bags' => 'required|numeric',
            'car_type' => 'required',
            'price_per_hour' => 'numeric',
            'discount_per_hour' => 'numeric',
            'price_per_half_day' => 'numeric',
            'discount_half_day' => 'numeric',
            'price_per_day' =>'numeric',
            'discount_per_day' => 'numeric',
        ],$this->message());


        $planet_number = $request->planet_number_2.' '.$request->planet_number_1;

        $discount_price_per_hour  = $request->price_per_hour - ($request->price_per_hour * ($request->discount_per_hour/100));
        $discount_price_per_half_day  = $request->price_per_half_day - ($request->price_per_half_day * ($request->discount_per_half_day/100));
        $discount_price_per_day  = $request->price_per_day - ($request->price_per_day * ($request->discount_per_day/100));


        $request->has('insurance') ? $insurance = true : $insurance = false;
        $request->has('extra_driver') ? $extra_driver = true : $extra_driver = false;
        $request->has('shield') ? $shield = true : $shield = false;
        $request->has('baby_seat') ? $baby_seat = true : $baby_seat = false;
        $request->has('open_kilometers') ? $open_kilometers = true : $open_kilometers = false;

        $request->insurance_price != null ? $insurance_price = $request->insurance_price : $insurance_price = 0.00;
        $request->extra_driver_price != null ? $extra_driver_price = $request->extra_driver_price : $extra_driver_price = 0.00;
        $request->shield_price != null ? $shield_price = $request->shield_price : $shield_price = 0.00;
        $request->baby_seat_price != null ? $baby_seat_price = $request->baby_seat_price : $baby_seat_price = 0.00;
        $request->open_kilometers_price != null ? $open_kilometers_price = $request->open_kilometers_price : $open_kilometers_price = 0.00;


        $row = $this->carDataResource->updateOne($id,$request->ar_name,$request->en_name,$request->code,$planet_number,$request->color,$request->status_id,
        $request->model_id,$request->garage_id,$request->category_id,$request->car_model_year,$request->no_doors,$request->no_bags,$request->car_type,
        $request->price_per_hour,$request->discount_per_hour,$discount_price_per_hour,
        $request->price_per_half_day,$request->discount_per_half_day,$discount_price_per_half_day,
        $request->price_per_day,$request->discount_per_day,$discount_price_per_day,
        $insurance,$insurance_price,
        $extra_driver,$extra_driver_price,
        $shield,$shield_price,
        $baby_seat,$baby_seat_price,
        $open_kilometers,$open_kilometers_price);

        $row != null ?  Session::flash('success','تم تعديل ماركة السيارة : '.$row->ar_name.' بنجاح') : Session::flash('failed','لم يتم التعديل في السيارة : '.$request->ar_name.' لعدوم التغيير فى البيانات');
        return redirect()->route('dashboard.car.edit',$id);

    }

    public function destroy($id)
    {
        $row =  $this->carDataResource->deleteOne($id);
        Session::flash('success','تم حذف بيانات السيارة : '.$row);
        return redirect()->route('dashboard.car.index');
    }

    public function deleteAll()
    {
        $row =  $this->carDataResource->deleteAllData();
        Session::flash('success','تم حذف بيانات كل السيارات');
        return redirect()->route('dashboard.car.index');
    }

    public function search(Request $request)
    {

        $colors =  $this->getColors();
        $categories =  $this->getCategories();
        $transmissions =  $this->getTransmissions();
        $statuss =  $this->getStatus();
        $carModels = CarModel::get()->all();
        $garages = Garage::get()->all();

        $rows = $this->carDataResource->CarSearch($request->search);
        Session::flash('search','search');
        Session::flash('search_name',$request->search);
        return view('dashboard.car.index',compact('rows','colors','carModels','categories','garages','transmissions','statuss'));
    }
}
