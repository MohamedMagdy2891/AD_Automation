@extends('dashboard.layouts.main')
@push('title') عرض بيانات {{ $row->ar_name }}@endpush
@push('header') عرض بيانات {{ $row->ar_name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.car.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">عرض بيانات {{ $row->ar_name }}</div>
            </div>
            <form class="card-body">
                @csrf
                @method('POST')

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

            </form>
        </div>
    </div>

</div>
@endsection
@push('js')
 <script>
    $(document).ready(function(){
        $('#message').delay(3000).fadeOut('slow');
        $('#code').val("{{ $row->code }}").prop('disabled', true);
        $('#ar_name').val("{{ $row->ar_name }}").prop('disabled', true);
        $('#en_name').val("{{ $row->en_name }}").prop('disabled', true);
        $('#color').val("{{ $row->color }}").prop('disabled', true);
        $('#status_id').val("{{ $row->status_id }}").prop('disabled', true);
        $('#model_id').val("{{ $row->model_id }}").prop('disabled', true);
        $('#car_model_year').val("{{ $row->car_model_year }}").prop('disabled', true);
        $('#category_id').val("{{ $row->category_id }}").prop('disabled', true);
        $('#garage_id').val("{{ $row->garage_id }}").prop('disabled', true);
        $('#car_type').val("{{ $row->car_type }}").prop('disabled', true);
        $('#no_doors').val("{{ $row->no_doors }}").prop('disabled', true);
        $('#no_bags').val("{{ $row->no_bags }}").prop('disabled', true);

        $('#price_per_hour').val("{{ $row->price_per_hour }}").prop('disabled', true);
        $('#discount_per_hour').val("{{ $row->discount_per_hour }}").prop('disabled', true);
        $('#price_per_half_day').val("{{ $row->price_per_half_day }}").prop('disabled', true);
        $('#discount_per_half_day').val("{{ $row->discount_per_half_day }}").prop('disabled', true);
        $('#price_per_day').val("{{ $row->price_per_day }}").prop('disabled', true);
        $('#discount_per_day').val("{{ $row->discount_per_day }}").prop('disabled', true);



        $('#insurance').prop('disabled', true)
        $('#extra_driver').prop('disabled', true);
        $('#shield').prop('disabled', true);
        $('#baby_seat').prop('disabled', true);
        $('#open_kilometers').prop('disabled', true);

        $('#insurance_price').val("{{ $row->insurance_price }}").prop('disabled', true)
        $('#extra_driver_price').val("{{ $row->extra_driver_price }}").prop('disabled', true);
        $('#shield_price').val("{{ $row->shield_price }}").prop('disabled', true);
        $('#baby_seat_price').val("{{ $row->baby_seat_price }}").prop('disabled', true);
        $('#open_kilometers_price').val("{{ $row->open_kilometers_price }}").prop('disabled', true);


    });

 </script>
@if($row->insurance == 1)
    <script>
        $(document).ready(function(){
            $('#insurance').attr("checked","checked").prop('disabled', true)
        });
    </script>
@endif
@if($row->extra_driver == 1)
    <script>
        $(document).ready(function(){
            $('#extra_driver').attr("checked","checked").prop('disabled', true)
        });
    </script>
@endif
@if($row->shield == 1)
    <script>
        $(document).ready(function(){
            $('#shield').attr("checked","checked").prop('disabled', true)
        });
    </script>
@endif
@if($row->baby_seat == 1)
    <script>
        $(document).ready(function(){
            $('#baby_seat').attr("checked","checked").prop('disabled', true)
        });
    </script>
@endif
@if($row->open_kilometers == 1)
    <script>
        $(document).ready(function(){
            $('#open_kilometers').attr("checked","checked").prop('disabled', true)
        });
    </script>
@endif


@endpush
