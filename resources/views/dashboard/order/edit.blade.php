@extends('dashboard.layouts.main')
@push('title')تعديل بيانات {{ $row->Client->fn_name }} - تأجير سيارة {{ $row->Car->code }} @endpush
@push('header')   تعديل بيانات {{ $row->Client->fn_name }} - تأجير سيارة {{ $row->Car->code }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.orders.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">تعديل بيانات {{ $row->Client->fn_name }} - تأجير سيارة {{ $row->Car->code }}</div>
            </div>
            <form class="card-body" action="{{ URL::route('dashboard.orders.update',$row->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('dashboard.order.form')


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
        $('#client_id').val("{{ $row->client_id}}");
        $('#client_name').val("{{ $row->Client->fn_name}}");
        $('#car_code').val("{{ $row->Car->code}}");
        $('#car_id').val("{{ $row->car_id }}");
        $('#receive_place').val("{{ $row->receive_place}}");
        $('#deliver_place').val("{{ $row->deliver_place}}");

        $('#receive_time').val("{{ $row->receive_time }}");
        $('#deliver_time').val("{{ $row->deliver_time}}");
        $('#killometers_consumed').val("{{ $row->killometers_consumed}}");
        $('#hours_consumed').val("{{ $row->hours_consumed }}");
        if ($("#extra_driver_price").hasClass("checked")) {
            $("#extra_driver_price").val("{{ $row->Car->extra_driver_price}}").prop('disabled', true);
        }else{
            $('#extra_driver_price').val("0").prop('disabled', true);
        }
        if ($("#shield_price").hasClass("checked")) {
            $("#shield_price").val("{{ $row->Car->shield_price}}").prop('disabled', true);
        }else{
            $('#shield_price').val("0").prop('disabled', true);
        }
        if ($("#baby_seat_price").hasClass("checked")) {
            $("#baby_seat_price").val("{{ $row->Car->baby_seat_price}}").prop('disabled', true);
        }else{
            $('#baby_seat_price').val("0").prop('disabled', true);
        }
        if ($("#open_kilometers_price").hasClass("checked")) {
            $("#open_kilometers_price").val("{{ $row->Car->open_kilometers_price}}").prop('disabled', true);
        }else{
            $('#open_kilometers_price').val("0").prop('disabled', true);
        }
        $('#support').val("{{ $row->support}}");
        $('#total').val("{{ $row->total }}");
        $('#reason_of_rejection').val("{{ $row->reason_of_rejection }}");
        $('#order_status').val("{{$row->order_status}}");
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
