<div class="row gutters">
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="ar_name">   إسم المستخدم</label>
            <input value="{{ old('ar_name') }}" type="text" name="ar_name" class="form-control p-0 pt-1 pr-2" id="ar_name" placeholder="حالة السيارة ( باللغة العربية) ">
        </div>
    </div>

    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="en_name">رقم هاتف المستخدم </label>
            <input value="{{ old('en_name') }}" type="text" name="en_name" class="form-control" id="en_name" placeholder="حالة السيارة ( باللغة الإنجليزية ) ">
        </div>
    </div>

</div>
@if($errors->any())

    <div class="row gutters " id="message">

        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('ar_name'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('ar_name') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('en_name'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('en_name') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif




