<div class="row gutters">
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="client_id">   إسم المتأجر</label>
            <input value="{{ old('client_id') }}" type="hidden" name="client_id" class="form-control p-0 pt-1 pr-2" id="client_id" >
            <input value="{{ old('client_id') }}" type="text" name="client_name" class="form-control p-0 pt-1 pr-2" id="client_name" placeholder="اسم المستخدم  ">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="car_id">  كود السيارة  </label>
            <input value="{{ old('car_id') }}" type="hidden" name="car_id" class="form-control p-0 pt-1 pr-2" id="car_id" placeholder="كود السيارة ">
            <input value="{{ old('car_id') }}" type="text" name="car_code" class="form-control p-0 pt-1 pr-2" id="car_code" placeholder="كود السيارة ">

        </div>
    </div>

    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="receive_place">مكان الإستلام </label>
            <input value="{{ old('receive_place') }}" type="text" name="receive_place" class="form-control p-0 pt-1 pr-2" id="receive_place" placeholder="مكان الإستلام ">
        </div>
    </div>

    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="deliver_place">   مكان التسليم </label>
            <input value="{{ old('deliver_place') }}" type="text" name="deliver_place" class="form-control p-0 pt-1 pr-2" id="deliver_place" placeholder=" مكان التسليم">
        </div>
    </div>
</div>
@if($errors->any())

    <div class="row gutters " id="message">

        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('client_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('client_id') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('car_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('car_id') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('receive_place'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('receive_place') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('deliver_place'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('deliver_place') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="row gutters">

    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="receive_time"> وقت الإستلام</label>
            <input  type="text"value="{{ old('receive_time') }}" name="receive_time" class="form-control p-0 pt-1 pr-2" id="receive_time" placeholder=" وقت الإستلام">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="deliver_time"> وقت التسليم </label>
            <input type="text" value="{{ old('deliver_time') }}"name="deliver_time" class="form-control p-0 pt-1 pr-2" id="deliver_time" placeholder=" وقت التسليم ">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="killometers_consumed">عدد الكيلومترات المستعملة </label>
            <input  type="text" value="{{ old('killometers_consumed') }}"name="killometers_consumed" class="form-control p-0 pt-1 pr-2" id="killometers_consumed" placeholder=" عدد الكيلومترات المستهلكة">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="hours_consumed">عدد الساعات المستخدمة  </label>
            <input type="text" value="{{ old('hours_consumed') }}"name="hours_consumed" class="form-control p-0 pt-1 pr-2" id="hours_consumed" placeholder="  عدد الساعات المستخدمة">
        </div>
    </div>
</div>
@if($errors->any())

    <div class="row gutters " id="message1">

        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('receive_time'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('receive_time') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('deliver_time'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('deliver_time') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('killometers_consumed'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('killometers_consumed') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('hours_consumed'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('hours_consumed') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
<hr style="color:#543a79">

<div class="row gutters">
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="extra_driver_price"> سعر خدمة إضافة  سائق </label>
            <input  value="{{ old('extra_driver_price')}}"type="text" name="extra_driver_price" class="form-control p-0 pt-1 pr-2 @if($row->extra_driver_checked)checked @endif" id="extra_driver_price" placeholder=" سعر خدمة سائق إضافي">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="shield_price">  سعر الدرع الإضافي   </label>
            <input value="{{ old('shield_price') }}" type="text" name="shield_price" class="form-control p-0 pt-1 pr-2 @if($row->shield_checked)checked @endif" id="shield_price" placeholder="سعر الدرع الإضافي  ">
        </div>
    </div>

    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="baby_seat_price">  سعر مقعد الأطفال </label>
            <input value="{{ old('baby_seat_price') }}" type="text" name="baby_seat_price" class="form-control p-0 pt-1 pr-2 @if($row->baby_seat_checked)checked @endif" id="baby_seat_price" placeholder=" سعر مقعد الأطفال ">
        </div>
    </div>

    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="open_kilometers_price"> open kilometers price </label>
            <input value="{{ old('open_kilometers_price') }}" type="text" name="open_kilometers_price" class="form-control p-0 pt-1 pr-2 @if($row->open_kilometers_checked)checked @endif" id="open_kilometers_price" placeholder=" open kilometers ">
        </div>
    </div>
</div>
@if($errors->any())

    <div class="row gutters " id="message2">

        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('extra_driver_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('extra_driver_price') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('shield_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('shield_price') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('baby_seat_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('baby_seat_price') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('open_kilometers_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('open_kilometers_price') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="row gutters">



    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="order_status"> حالة الطلب</label>
            <select class="form-control" id="order_status" name="order_status">
                @foreach( $status as $s )
                <option value="{{$s}}" @if($s == $row->order_status) selected @endif >{{$s}}</option>
                @endforeach
            </select>
            {{-- <input value="{{ old('order_status') }}" type="text" name="order_status" class="form-control p-0 pt-1 pr-2" id="order_status" placeholder="حالة الطلب "> --}}
           @if($row->order_status=="Rejected")
           <input value="{{ old('reason_of_rejection') }}" type="text" name="reason_of_rejection" class="form-control p-0 pt-1 pr-2" id="reason_of_rejection" placeholder=" سبب رفض الطلب ">
           @endif
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="support">  جهة الدعم الفني</label>
            <input value="{{ old('support') }}" type="text" name="support" class="form-control p-0 pt-1 pr-2" id="support" placeholder="جهة الدعم الفني  ">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="total">  إجمالي المبلغ</label>
            <input value="{{ old('total') }}" type="text" name="total" class="form-control p-0 pt-1 pr-2" id="total" placeholder=" إجمالي المبلغ ">
        </div>
    </div>

</div>
@if($errors->any())

    <div class="row gutters " id="message3">

        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('order_status'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('order_status') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('support'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('support') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('total'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('total') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif




