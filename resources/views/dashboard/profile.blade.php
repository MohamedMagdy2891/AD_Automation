@extends('dashboard.layouts.main')
@push('title') تعديل بياناتك الشخصية@endpush
@push('header') تعديل بياناتك الشخصية@endpush
@section('content')

<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">تعديل بياناتك الشخصية</div>
            </div>
            <form class="card-body" action="{{ URL::route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                        <div class="form-group">
                            <label for="name">اسم المستخدم</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="اسم المستخدم">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                        <div class="form-group">
                            <label for="phone">رقم الجوال</label>
                            <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="phone" placeholder="رقم الجوال">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                        <div class="form-group">
                            <label for="image">الصورة الشخصية</label>
                            <input accept="image/.png,.jpg.jpeg,.JPG,.PNG,.JPEG" type="file" name="image" class="form-control p-0 pt-1 pr-2" id="image" >
                        </div>
                    </div>

                </div>
                @if($errors->any())
                    <div class="row gutters " id="message">
                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                            @if($errors->has('name'))
                                <div class="form-group bg-danger text-center pb-2 pt-2">
                                    <p class="text-bold text-light">{{ $errors->first('name') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                            @if($errors->has('phone'))
                                <div class="form-group bg-danger text-center pb-2 pt-2">
                                    <p class="text-bold text-light">{{ $errors->first('phone') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif






                <div class="row gutters">
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12"></div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2 w-100">تعديل</button>
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
        $('#message1').delay(3000).fadeOut('slow');
        $('#message2').delay(3000).fadeOut('slow');
        $('#name').val("{{ Auth::user()->name }}");
        $('#phone').val("{{ Auth::user()->phone }}");
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
