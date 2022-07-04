@extends('dashboard.layouts.main')
@push('title')   طلب   {{ $row->Client->fn_name  }} تأجير سيارة -  {{$row->Car->code }} @endpush
@push('header')     طلب   {{ $row->Client->fn_name  }} تأجير سيارة -  {{$row->Car->code }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.orders.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1"> عرض بيانات {{ $row->Client->fn_name }} - تأجير سيارة {{ $row->Car->code }}</div>
            </div>

            <div class="row gutters">
                <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="image">  صورة السيارة في الطلب </label>
                        <img id="image" style="height:200px" class="img-fluid rounded" alt="{{ URL::asset($row->Car->ar_name) }} " src="{{ URL::asset($row->Car->ar_name) }}">
                    </div>
                </div>

            </div>
            <form class="card-body"method="post" action="{{ URL::route('dashboard.orders.updateStatus',$row->id) }}"enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('dashboard.order.form')


                    @if ($row->order_status == 'Pending')

                    <div class="row gutters">
                        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3"></div>
                        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
                            <div class="form-group">
                                <button type="submit" name="approve"class="btn btn-success mb-2 w-100">قبول الطلب</button>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3">
                                <div class="form-group">
                                <button type="submit" name="decline"class="btn btn-danger mb-2 w-100">رفض الطلب</button>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lglg-3 col-md-3 col-sm-3 col-3"></div>
                    </div>
                    @endif
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
        $('#client_id').val("{{ $row->Client->fn_name }}").prop('disabled', true);
        $('#car_id').val("{{ $row->Car->code }}").prop('disabled', true);
        $('#receive_place').val("{{ $row->receive_place }}").prop('disabled', true);
        $('#deliver_place').val("{{ $row->deliver_place }}").prop('disabled', true);

        $('#receive_time').val("{{ $row->receive_time }}").prop('disabled', true);
        $('#deliver_time').val("{{ $row->deliver_time}}").prop('disabled', true);
        $('#killometers_consumed').val("{{ $row->killometers_consumed}}").prop('disabled', true);
        $('#hours_consumed').val("{{ $row->hours_consumed }}").prop('disabled', true);
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
        $('#order_status').val("{{$row->order_status}}").prop('disabled', true);
        $('#support').val("{{ $row->support }}").prop('disabled', true);
        $('#total').val("{{$row->total}}").prop('disabled', true);
    });

 </script>



@endpush
