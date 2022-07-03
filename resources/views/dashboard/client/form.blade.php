<div class="row gutters">
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="full_name">اسم العميل</label>
            <input type="text" value="{{ old('full_name') }}" name="full_name" class="form-control" id="full_name" placeholder="ادخل اسم العميل">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="email">البريد الالكتروني</label>
            <input type="text" value="{{ $row->email }}" name="email" class="form-control" id="email" placeholder="ادخل البريد الالكتروني">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text" value="{{ $row->phone }}" name="phone" class="form-control" id="phone" placeholder="ادخل رقم الهاتف">
        </div>
    </div>
</div>
@if($errors->any())
    <div class="row gutters " id="message">
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('ar_area'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('ar_area') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('en_area'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('en_area') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="row gutters">

    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="verification_status">حالة العميل</label>
            <select class="form-control p-0 pt-1 pr-2" name="verification_status" id="verification_status">
                @if($row->verification_status == 1)
                    <option value="0">غير مفعل</option>
                    <option value="1" selected>مفعل</option>
                @else
                    <option value="0" selected>غير مفعل</option>
                    <option value="1" >مفعل</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="license_id">رقم الهوية</label>
            <input type="text" value="{{ $row->license_id }}" name="license_id" class="form-control" id="license_id" placeholder="ادخل رقم الهوية">
        </div>
    </div>
    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
            <label for="phone">صورة الهوية</label>
            @if($row->photo != null)

                    <div class="row gutters">
                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <img id="image" style="height:300px;width:100%" class="img-fluid rounded" alt="Responsive image" src="{{ URL::asset($row->photo) }}">
                            </div>
                        </div>

                    </div>
                @endif
        </div>
    </div>
</div>
