<div class="row gutters">
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="serial_no">رقم سيريال جهاز تتبع السيارة</label>
            <input type="text" value="{{ old('serial_no') }}" name="serial_no" class="form-control" id="serial_no" placeholder="ادخل رقم سيريال جهاز تتبع السيارة">
        </div>
    </div>
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="car_id">السيارات</label>
            <select class="form-control p-0 pt-1 pr-2" name="car_id" id="car_id">
                <option disabled selected>اختر السيارة</option>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->code }} - {{ $car->ar_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@if($errors->any())
    <div class="row gutters " id="message">
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('serial_no'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('serial_no') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('car_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('car_id') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
