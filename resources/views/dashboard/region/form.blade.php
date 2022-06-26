<div class="row gutters">
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="ar_name">اسم المنطقة ( باللغة العربية )</label>
            <input value="{{ old('ar_name') }}" type="text" name="ar_name" class="form-control" id="ar_name" placeholder="ادخل اسم المنطقة باللغة العربية">
        </div>
    </div>
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="en_name">اسم المنطقة ( باللغة الانجليزية )</label>
            <input value="{{ old('en_name') }}" type="text" name="en_name" class="form-control" id="en_name" placeholder="ادخل اسم المنطقة باللغة الانجليزية">
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
