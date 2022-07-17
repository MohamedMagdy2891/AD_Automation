@extends('dashboard.layouts.main')
@push('title') تغيير كلمة المرور@endpush
@push('header') تغيير كلمة المرور@endpush
@section('content')

<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">تغيير كلمة المرور</div>
            </div>
            <form class="card-body" action="{{ URL::route('dashboard.changePassword.update') }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="header-profile-actions">
                    <div class="header-user-profile">
                        <div class="header-user">
                            @if(Auth::user()->image != null)
                                <img style="width: 8rem;height:8rem;" src="{{ URL::asset(Auth::user()->image)}}" alt="{{ Auth::user()->name }}" />
                            @else
                                <img style="width: 8rem;height:8rem;" src="{{ URL::asset('assets/img/profile.jpg')}}" alt="{{ Auth::user()->name }}" />
                            @endif
                        </div>
                        <h5>{{ Auth::user()->name }}</h5>
                        <p>{{ Auth::user()->email }}</p>
                        <p>{{ Auth::user()->getRule() }}</p>
                    </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password"  name="password" class="form-control" id="password" placeholder="ادخل كلمة المرور">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label for="password_confirmation">تاكيد كلمة المرور</label>
                            <input type="password"  name="password_confirmation" class="form-control" id="password_confirmation" placeholder="ادخل تاكيد كلمة المرور">
                        </div>
                    </div>

                </div>
                @if($errors->any())
                    <div class="row gutters " id="message">
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
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12"></div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2 w-100">تغيير</button>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12"></div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
@push('js')
 <script>
    $(document).ready(function(){
        $('#message').delay(3000).fadeOut('slow');

    })

 </script>
 @if(session()->has('success'))
    <script>
            $.toast({
                heading: 'نجحت العملية',
                text: "<span>{{ session()->get('success') }}</span>",
                showHideTransition: 'slide',
                icon: 'success',
                textAlign:'right'

            })
    </script>
 @endif
 @if(session()->has('failed'))
    <script>
            $.toast({
                heading: 'فشلت العملية',
                text: "<span>{{ session()->get('failed') }}</span>",
                showHideTransition: 'slide',
                icon: 'error',
                textAlign:'right'

            })
    </script>
 @endif
@endpush
