<div class="row gutters">
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="iemi">iemi لجهاز تتبع السيارة</label>
            <input type="text" value="{{ old('serial_no') }}" name="iemi" class="form-control" id="iemi" placeholder="ادخل iemi لجهاز تتبع السيارة">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="vin">vin لجهاز تتبع السيارة</label>
            <input type="text" value="{{ old('vin') }}" name="vin" class="form-control" id="vin" placeholder="ادخل vin لجهاز تتبع السيارة">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
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
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('iemi'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('iemi') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('vin'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('vin') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('car_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('car_id') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
