<div class="row gutters">
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="ar_garage">اسم الحراج ( باللغة العربية )</label>
            <input type="text" value="{{ old('ar_garage') }}" name="ar_garage" class="form-control" id="ar_garage" placeholder="ادخل اسم الحراج باللغة العربية">
        </div>
    </div>
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="en_garage">اسم الحراج ( باللغة الانجليزية )</label>
            <input type="text" value="{{ old('en_garage') }}" name="en_garage" class="form-control" id="en_garage" placeholder="ادخل اسم الحراج باللغة الانجليزية">
        </div>
    </div>
</div>
@if($errors->any())
    <div class="row gutters " id="message">
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('ar_garage'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('ar_garage') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('en_garage'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('en_garage') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="row gutters">
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="area_id">الموقع التابع له الحراج</label>
            <select  name="area_id" class="form-control p-0 pt-1" id="area_id">
                <option disabled selected>اختر الموقع</option>
                @foreach ($rows as $row)
                    @if(old('area_id') == $row->id)
                        <option  value="{{ $row->id }}" selected>{{ $row->ar_area }}</option>
                    @else
                        <option  value="{{ $row->id }}">{{ $row->ar_area }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="lang">خط الطول</label>
            <input type="text" value="{{ old('lang') }}" name="lang" class="form-control" id="lang" placeholder="ادخل خط الطول">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="lat">خط العرض</label>
            <input type="text" value="{{ old('lat') }}" name="lat" class="form-control" id="lat" placeholder="ادخل خط العرض">
        </div>
    </div>
</div>
@if($errors->any())
    <div class="row gutters " id="message2">
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('area_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('area_id') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('lang'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('lang') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
            @if($errors->has('lat'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('lat') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif
