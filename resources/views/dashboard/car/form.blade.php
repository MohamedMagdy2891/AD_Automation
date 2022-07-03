<div class="row gutters">
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="code"> كود السيارة</label>
            <input value="{{ old('code') }}" type="text" name="code" class="form-control p-0 pt-1 pr-2" id="code" placeholder="ادخل كود السيارة">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="ar_name">اسم السيارة ( باللغة العربية )</label>
            <input value="{{ old('ar_name') }}" type="text" name="ar_name" class="form-control" id="ar_name" placeholder="ادخل اسم السيارة باللغة العربية">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="en_name">اسم السيارة ( باللغة الانجليزية )</label>
            <input value="{{ old('en_name') }}" type="text" name="en_name" class="form-control" id="en_name" placeholder="ادخل اسم السيارة باللغة الانجليزية">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="color">لون السيارة</label>
            <select name="color" class="form-control p-0 pt-1 pr-2" id="color">
                <option selected disabled>اختر لون السيارة</option>
                @foreach ($colors as $color)
                    <option value="{{ $color['id'] }}">{{ $color['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
@if($errors->any())

    <div class="row gutters " id="message">
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('code'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('code') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('ar_name'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('ar_name') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('en_name'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('en_name') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('color'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('color') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif
<div class="row gutters">
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="model_id"> الماركة</label>
            <select name="model_id" class="form-control p-0 pt-1 pr-2" id="model_id">
                <option selected disabled>اختر ماركة السيارة</option>
                @foreach ($carModels as $carModel)
                    <option value="{{ $carModel->id }}">{{ $carModel->ar_name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="car_model_year">موديل السيارة</label>
            <input  value="{{ old('car_model_year') }}" step="1" type="number" name="car_model_year" class="form-control" id="car_model_year" placeholder="ادخل موديل السيارة">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="category_id"> القسم</label>
            <select name="category_id" class="form-control p-0 pt-1 pr-2" id="category_id">
                <option selected disabled>اختر قسم السيارة</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->ar_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="garage_id">حراج السيارة</label>
            <select name="garage_id" class="form-control p-0 pt-1 pr-2" id="garage_id">
                <option selected disabled>اختر حراج السيارة</option>
                @foreach ($garages as $garage)
                    <option value="{{ $garage->id }}">{{ $garage->ar_garage }} ( {{ $garage->Area->ar_area }} - {{ $garage->Area->Region->ar_name }} )</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
@if($errors->any())

    <div class="row gutters " id="message1">
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('model_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('model_id') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('car_model_year'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('car_model_year') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('category'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('category') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('garage_id'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('garage_id') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif
<div class="row gutters">
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="car_type"> ناقل الحركة</label>
            <select name="car_type" class="form-control p-0 pt-1 pr-2" id="car_type">
                <option selected disabled>اختر ناقل الحركة</option>
                @foreach ($transmissions as $transmission)
                    <option value="{{ $transmission['id'] }}">{{ $transmission['ar_name'] }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="status_id"> حالة العربية</label>
            <select name="status_id" class="form-control p-0 pt-1 pr-2" id="status_id">
                <option selected disabled>اختر حالة العربية</option>
                @foreach ($statuss as $status)
                    <option value="{{ $status->id }}">{{ $status->ar_name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="no_doors">عدد الابواب</label>
            <input value="{{ old('no_doors') == null ? 0 : old('no_doors') }}" step="1"  type="number" name="no_doors" class="form-control" id="no_doors" placeholder="ادخل عدد ابواب السيارة">
        </div>
    </div>
    <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
        <div class="form-group">
            <label for="no_bags">عدد الحقائب</label>
            <input value="{{ old('no_bags') == null ? 0 : old('no_bags') }}" step="1" type="number" name="no_bags" class="form-control" id="no_bags" placeholder="ادخل عدد شنط السيارة">
        </div>
    </div>




</div>
@if($errors->any())

    <div class="row gutters " id="message2">
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('car_type'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('car_type') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('status'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('status') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('no_doors'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('no_doors') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
            @if($errors->has('no_bags'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('no_bags') }}</p>
                </div>
            @endif
        </div>


    </div>
@endif


<hr style="color:#543a79">
<div class="row gutters">
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="price_per_hour">سعر الساعة</label>
            <input  step='0.01' value="{{ old('price_per_hour') == null ? '0.00' : old('price_per_hour') }}"   type="number" name="price_per_hour" class="form-control" id="price_per_hour" placeholder="ادخل سعر الساعة">
        </div>
    </div>
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="discount_per_hour">الخصم ( سعر الساعة )</label>
            <input  value="{{ old('discount_per_hour') == null ? 0 : old('discount_per_hour') }}" type="number"  name="discount_per_hour" class="form-control" id="discount_per_hour" placeholder="ادخل الخصم ( سعر الساعة )">
        </div>
    </div>

    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="price_per_half_day">سعر النصف يوم</label>
            <input  step='0.01' value="{{ old('price_per_half_day') == null ? '0.00' : old('price_per_half_day') }}"   type="number" name="price_per_half_day" class="form-control" id="price_per_half_day" placeholder="ادخل سعر النصف يوم">
        </div>
    </div>
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="discount_per_half_day">الخصم ( سعر النصف يوم )</label>
            <input  value="{{ old('discount_per_half_day') == null ? 0 : old('discount_per_half_day') }}" type="number"  name="discount_per_half_day" class="form-control" id="discount_per_half_day" placeholder="ادخل الخصم ( سعر النصف يوم )">
        </div>
    </div>

    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="price_per_day">سعر اليوم</label>
            <input  step='0.01' value="{{ old('price_per_day') == null ? '0.00' : old('price_per_day') }}"   type="number" name="price_per_day" class="form-control" id="price_per_day" placeholder="ادخل سعر اليوم">
        </div>
    </div>
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="discount_per_day">الخصم ( سعر اليوم )</label>
            <input  value="{{ old('discount_per_day') == null ? 0 : old('discount_per_day') }}" type="number"  name="discount_per_day" class="form-control" id="discount_per_day" placeholder="ادخل الخصم ( سعر اليوم )">
        </div>
    </div>






</div>
@if($errors->any())

    <div class="row gutters " id="message3">
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('price_per_hour'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('price_per_hour') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('discount_per_hour'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('discount_per_hour') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('price_per_half_day'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('price_per_half_day') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('discount_per_half_day'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('discount_per_half_day') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('price_per_day'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('price_per_day') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('discount_per_day'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('discount_per_day') }}</p>
                </div>
            @endif
        </div>


    </div>
@endif

<hr style="color:#543a79">
<div class="row gutters">
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="insurance"><input style="padding:1rem" type="checkbox" name="insurance" id="insurance"> التامين الشامل </label>
            <input  step='0.01' value="{{ old('insurance_price') == null ? '0.00' : old('insurance_price') }}"   type="number" name="insurance_price" class="form-control" id="insurance_price" placeholder="ادخل سعر الساعة" disabled="disabled">
        </div>
    </div>
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="extra_driver"><input style="padding:1rem" type="checkbox" name="extra_driver" id="extra_driver"> سائق اضافى </label>
            <input  step='0.01' value="{{ old('extra_driver_price') == null ? '0.00' : old('extra_driver_price') }}"   type="number" name="extra_driver_price" class="form-control" id="extra_driver_price" placeholder="ادخل سعر الساعة" disabled="disabled">
        </div>
    </div>
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="shield"><input style="padding:1rem" type="checkbox" name="shield" id="shield"> درع ابو ذياب </label>
            <input  step='0.01' value="{{ old('shield_price') == null ? '0.00' : old('shield_price') }}"   type="number" name="shield_price" class="form-control" id="shield_price" placeholder="ادخل سعر الساعة" disabled="disabled">
        </div>
    </div>
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="baby_seat"><input style="padding:1rem" type="checkbox" name="baby_seat" id="baby_seat"> مقعد الاطفال </label>
            <input  step='0.01' value="{{ old('baby_seat_price') == null ? '0.00' : old('baby_seat_price') }}"   type="number" name="baby_seat_price" class="form-control" id="baby_seat_price" placeholder="ادخل سعر الساعة" disabled="disabled">
        </div>
    </div>
    <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-3 col-2">
        <div class="form-group">
            <label for="open_kilometers"><input style="padding:1rem" type="checkbox" name="open_kilometers" id="open_kilometers"> كيلو متر مفتوح </label>
            <input  step='0.01' value="{{ old('open_kilometers_price') == null ? '0.00' : old('open_kilometers_price') }}"   type="number" name="open_kilometers_price" class="form-control" id="open_kilometers_price" placeholder="ادخل سعر الساعة" disabled="disabled">
        </div>
    </div>







</div>
@if($errors->any())

    <div class="row gutters " id="message4">
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('insurance_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('insurance_price') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('extra_driver_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('extra_driver_price') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('shield_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('shield_price') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('baby_seat_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('baby_seat_price') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-2 col-lglg-2 col-md-2 col-sm-2 col-2">
            @if($errors->has('open_kilometers_price'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('open_kilometers_price') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif




