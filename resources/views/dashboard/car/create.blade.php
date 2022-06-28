@extends('dashboard.layouts.main')
@push('title') اضافة سيارة@endpush
@push('header') اضافة سيارة@endpush
@section('content')

<div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">اضافة سيارة جديد</div>
            </div>
            <form class="card-body" action="{{ URL::route('dashboard.car.store') }}" method="POST">
                @csrf
                @method('POST')

                @include('dashboard.car.form')

                <div class="row gutters">
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12"></div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2 w-100">اضافة</button>
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
        $('#message3').delay(3000).fadeOut('slow');
        $('#message5').delay(3000).fadeOut('slow');
    });
    $('#insurance').change(function(){
        if ($(this).is(':checked')) {
            $('#insurance_price').prop('disabled',false);
        }else{
            $('#insurance_price').prop('disabled',true);
        }
    });
    $('#extra_driver').change(function(){
        if ($(this).is(':checked')) {
            $('#extra_driver_price').prop('disabled',false);
        }else{
            $('#extra_driver_price').prop('disabled',true);
        }
    });
    $('#shield').change(function(){
        if ($(this).is(':checked')) {
            $('#shield_price').prop('disabled',false);
        }else{
            $('#shield_price').prop('disabled',true);
        }
    });
    $('#baby_seat').change(function(){
        if ($(this).is(':checked')) {
            $('#baby_seat_price').prop('disabled',false);
        }else{
            $('#baby_seat_price').prop('disabled',true);
        }
    });
    $('#open_kilometers').change(function(){
        if ($(this).is(':checked')) {
            $('#open_kilometers_price').prop('disabled',false);
        }else{
            $('#open_kilometers_price').prop('disabled',true);
        }
    });

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
@endpush
