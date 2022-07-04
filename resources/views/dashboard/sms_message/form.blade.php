<div class="row gutters">
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="phone">رقم الجوال</label>
            <input value="{{ old('phone') }}" type="text" name="phone" class="form-control" id="phone" placeholder="ادخل رقم الجوال">
        </div>
    </div>
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="message">الرسالة</label>
            <input value="{{ old('message') }}" type="text" name="message" class="form-control" id="message" placeholder="ادخل الرسالة">
        </div>
    </div>
</div>
@if($errors->any())
    <div class="row gutters " id="message1">
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('phone'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('phone') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('message'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('message') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif
