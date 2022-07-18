<div class="row gutters">

    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="vin">vin لجهاز تتبع السيارة</label>
            <input type="text" value="{{ old('vin') }}" name="vin" class="form-control" id="vin" placeholder=" vin لجهاز تتبع السيارة">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="type">type لجهاز تتبع السيارة</label>
            <input type="text" value="{{ old('type') }}" name="block" class="form-control" id="type" placeholder=" type لجهاز تتبع السيارة">
        </div>
    </div>

    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="state">state لجهاز تتبع السيارة</label>
            <input type="text" value="{{ old('state') }}" name="lock" class="form-control" id="state" placeholder=" state لجهاز تتبع السيارة">
        </div>
    </div>
</div>
@if($errors->any())
    <div class="row gutters " id="message">
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('vin'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('vin') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('type'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('type') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('state'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('state') }}</p>
                </div>
            @endif
        </div>


    </div>
@endif
