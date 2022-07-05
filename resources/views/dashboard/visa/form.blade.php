
<div class="row gutters">
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="client_id">   إسم صاحب البطاقة الإئتمانية</label>
            <input value="{{ old('client_id') }}" type="hidden" name="client_id" class="form-control p-0 pt-1 pr-2" id="client_id" >
            <input value="{{ old('client_id') }}" type="text" name="client_name" class="form-control p-0 pt-1 pr-2" id="client_name" placeholder="اسم المستخدم  ">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="credit_card_number">  رقم البطاقة   </label>
            <input value="{{ old('credit_card_number') }}" type="text" name="credit_card_number" class="form-control p-0 pt-1 pr-2" id="credit_card_number" placeholder="رقم البطاقة  ">

        </div>
    </div>

    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">        <div class="form-group">
            <label for="credit_card_type"> نوع البطاقة </label>
            <input value="{{ old('credit_card_type') }}" type="text" name="credit_card_type" class="form-control p-0 pt-1 pr-2" id="credit_card_type" placeholder=" نوع البطاقة ">
        </div>
    </div>

</div>
@if($errors->any())

    <div class="row gutters " id="message">

        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('client_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('client_id') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('credit_card_number'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('credit_card_number') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
              @if($errors->has('credit_card_type'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('credit_card_type') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif
<hr style="color:#543a79">
<div class="row gutters">

    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
              <div class="form-group">
            <label for="result">  حالة البطاقة</label>
            <input  type="text"  value="{{ old('result') }}" name="result" class="form-control p-0 pt-1 pr-2" id="result" placeholder=" حالة البطاقة ">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="exp_date_month">   تاريخ انتهاء البطاقة / شهر </label>
            <input type="text"  value="{{ old('exp_date_month') }}"name="exp_date_month" class="form-control p-0 pt-1 pr-2" id="exp_date_month" placeholder="  تاريخ انتهاء البطاقة / شهر    ">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
                <div class="form-group">
            <label for="exp_date_year">تاريخ انتهاء البطاقة / عام   </label>
            <input  type="text" value="{{ old('exp_date_year') }}"name="exp_date_year" class="form-control p-0 pt-1 pr-2" id="exp_date_year" placeholder=" تاريخ انتهاء البطاقة / عام ">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
    <label for="csv_number">رقم CSV    </label>
    <input  type="text" value="{{ old('csv_number') }}"name="csv_number" class="form-control p-0 pt-1 pr-2" id="csv_number" placeholder=" رقم CSV  ">
</div>
</div>

</div>
@if($errors->any())

    <div class="row gutters " id="message1">

        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
             @if($errors->has('result'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('result') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('exp_date_month'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('exp_date_month') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('exp_date_year'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('exp_date_year') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('csv_number'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('csv_number') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif



