<div class="row gutters">
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="name">   إسم المستخدم</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control p-0 pt-1 pr-2" id="name" placeholder="اسم المستخدم  ">
        </div>
    </div>
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="email"> البريد الإلكتروني</label>
            <input value="{{ old('email') }}" type="text" name="email" class="form-control" id="email" placeholder=" البريد الإلكتروني">
        </div>
    </div>

</div>
@if($errors->any())

    <div class="row gutters " id="message">

        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('name'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('name') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('email'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('email') }}</p>
                </div>
            @endif
        </div>

    </div>
@endif
<div class="row gutters">

    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input  type="password" name="password" class="form-control p-0 pt-1 pr-2" id="password" placeholder="كلمة المرور">
        </div>
    </div>
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="password">تاكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control p-0 pt-1 pr-2" id="password" placeholder="تاكيد كلمة المرور">
        </div>
    </div>
</div>
@if($errors->any())

    <div class="row gutters " id="message1">

        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('password'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('password') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('password_confirmation'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('password_confirmation') }}</p>
                </div>
            @endif
        </div>
    </div>
@endif
<div class="row gutters">
    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
        <div class="form-group">
            <label for="phone">رقم هاتف المستخدم </label>
            <input value="{{ old('phone') }}" type="text" name="phone" class="form-control" id="phone" placeholder=" رقم هاتف المستخدم ">
        </div>
    </div>

    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">

        <div class="form-group">
            <label for="type"> دور المستخدم</label>
            <select name="type" class="form-control p-0 pt-1 pr-2" id="type">
                <option selected disabled>دور المستخدم </option>
                @foreach ($roles as $role)
                    <option value="{{ $role['id'] }}">{{ $role['role'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@if($errors->any())

    <div class="row gutters " id="message2">
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('phone'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('phone') }}</p>
                </div>
            @endif
        </div>
        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
            @if($errors->has('type'))
                <div class="form-group bg-danger text-center pb-2 pt-2">
                    <p class="text-bold text-light">{{ $errors->first('type') }}</p>
                </div>
            @endif
        </div>




    </div>
@endif
<div class="row gutters">
    <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
        <div class="form-group">
            <label for="image"> صورة المستخدم</label>
            <input type="file" accept=".jpg,.jpeg,.png"  class="form-control p-0 pt-1 pr-2" id="image" name="image">

        </div>
    </div>

</div>





