@extends('dashboard.layouts.main')
@push('title') تعديل بيانات{{ $row->ar_name }}@endpush
@push('header') تعديل بيانات {{ $row->ar_name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.car.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">تعديل بيانات {{ $row->ar_name }}</div>
            </div>
            <form class="card-body" action="{{ URL::route('dashboard.car.update',$row->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('dashboard.car.form')

                <hr>

                <div class="row text-center text-bold pb-1 text-light">
                    <div class="col-md-4">
                        <p class="pt-2 pb-2" style="background-color:#543a79">سعر الساعة بعد الخصم : {{ $row->discount_price_per_hour }} ريال سعودى</p>
                    </div>
                    <div class="col-md-4">
                        <p class="pt-2 pb-2" style="background-color:#543a79">سعر النصف يوم بعد الخصم : {{ $row->discount_price_per_half_day }} ريال سعودى</p>
                    </div>
                    <div class="col-md-4">
                        <p class="pt-2 pb-2" style="background-color:#543a79">سعر اليوم بعد الخصم : {{ $row->discount_price_per_day }} ريال سعودى</p>
                    </div>
                </div>
                <hr>

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
        $('#message3').delay(3000).fadeOut('slow');
        $('#message4').delay(3000).fadeOut('slow');
        $('#message5').delay(3000).fadeOut('slow');
        $('#code').val("{{ $row->code }}");
        $('#ar_name').val("{{ $row->ar_name }}");
        $('#en_name').val("{{ $row->en_name }}");
        $('#color').val("{{ $row->color }}");
        $('#status_id').val("{{ $row->status_id }}");
        $('#model_id').val("{{ $row->model_id }}");
        $('#car_model_year').val("{{ $row->car_model_year }}");
        $('#category_id').val("{{ $row->category_id }}");
        $('#garage_id').val("{{ $row->garage_id }}");
        $('#car_type').val("{{ $row->car_type }}");
        $('#no_doors').val("{{ $row->no_doors }}");
        $('#no_bags').val("{{ $row->no_bags }}");

        $('#price_per_hour').val("{{ $row->price_per_hour }}");
        $('#discount_per_hour').val("{{ $row->discount_per_hour }}");
        $('#price_per_half_day').val("{{ $row->price_per_half_day }}");
        $('#discount_per_half_day').val("{{ $row->discount_per_half_day }}");
        $('#price_per_day').val("{{ $row->price_per_day }}");
        $('#discount_per_day').val("{{ $row->discount_per_day }}");



        $('#insurance')
        $('#extra_driver');
        $('#shield');
        $('#baby_seat');
        $('#open_kilometers');

        $('#insurance_price').val("{{ $row->insurance_price }}")
        $('#extra_driver_price').val("{{ $row->extra_driver_price }}");
        $('#shield_price').val("{{ $row->shield_price }}");
        $('#baby_seat_price').val("{{ $row->baby_seat_price }}");
        $('#open_kilometers_price').val("{{ $row->open_kilometers_price }}");


    });

 </script>
@if($row->insurance == 1)
    <script>
        $(document).ready(function(){
            $('#insurance').attr("checked","checked");
            $('#insurance_price').attr("disabled",false)
        });
    </script>
@endif
@if($row->extra_driver == 1)
    <script>
        $(document).ready(function(){
            $('#extra_driver').attr("checked","checked")
            $('#extra_driver_price').attr("disabled",false)
        });
    </script>
@endif
@if($row->shield == 1)
    <script>
        $(document).ready(function(){
            $('#shield').attr("checked","checked")
            $('#shield_price').attr("disabled",false)
        });
    </script>
@endif
@if($row->baby_seat == 1)
    <script>
        $(document).ready(function(){
            $('#baby_seat').attr("checked","checked")
            $('#baby_seat_price').attr("disabled",false)
        });
    </script>
@endif
@if($row->open_kilometers == 1)
    <script>
        $(document).ready(function(){
            $('#open_kilometers').attr("checked","checked")
            $('#open_kilometers_price').attr("disabled",false)
        });
    </script>
@endif

<script>
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
