@extends('dashboard.layouts.main')
@push('title')   طلب   {{ $row->Client->full_name  }} تأجير سيارة -  {{$row->Car->code }} @endpush
@push('header')     طلب   {{ $row->Client->full_name  }} تأجير سيارة -  {{$row->Car->code }}@endpush
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
                <div class="card-title text-center text-light pb-1"> عرض بيانات {{ $row->Client->full_name }} - تأجير سيارة {{ $row->Car->code }}</div>
            </div>


            <form class="card-body"method="post" action="{{ URL::route('dashboard.orders.updateStatus',$row->id) }}"enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('dashboard.order.form')
                <div class="row gutters">
                    <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="image">  صورة السيارة في الطلب </label>
                            <img id="image" style="height:200px" class="img-fluid rounded" alt="{{ URL::asset($row->Car->ar_name) }} " src="{{ URL::asset($row->Car->ar_name) }}">
                        </div>
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
        $('#message1').delay(3000).fadeOut('slow');
        $('#message2').delay(3000).fadeOut('slow');
        $('#client_name').val("{{ $row->Client->full_name }}").prop('disabled', true);
        $('#car_code').val("{{ $row->Car->code }}").prop('disabled', true);
        $('#receive_place_name').val("{{ $row->Garage1->ar_garage }}").prop('disabled', true);
        $('#deliver_place_name').val("{{ $row->Garage2->ar_garage }}").prop('disabled', true);
        $('#receive_place').val("{{ $row->receive_place }}").prop('disabled', true);
        $('#deliver_place').val("{{ $row->deliver_place }}").prop('disabled', true);
        $('#reason_of_rejection').val("{{ $row->reason_of_rejection }}").prop('disabled', true);
        $('#receive_time').val("{{ $row->receive_time }}").prop('disabled', true);
        $('#deliver_time').val("{{ $row->deliver_time}}").prop('disabled', true);
        $('#killometers_consumed').val("{{ $row->killometers_consumed}}").prop('disabled', true);
        $('#hours_consumed').val("{{ $row->hours_consumed }}").prop('disabled', true);
        $("#extra_driver_price").hasClass("checked")? $("#extra_driver_price").val("{{ $row->Car->extra_driver_price}}").prop('disabled', true) : $('#extra_driver_price').val("0").prop('disabled', true);
        $("#shield_price").hasClass("checked")? $("#shield_price").val("{{ $row->Car->shield_price}}").prop('disabled', true) : $('#shield_price').val("0").prop('disabled', true);
        $("#baby_seat_price").hasClass("checked")? $("#baby_seat_price").val("{{ $row->Car->baby_seat_price}}").prop('disabled', true) : $('#baby_seat_price').val("0").prop('disabled', true);
        $("#open_kilometers_price").hasClass("checked")? $("#open_kilometers_price").val("{{ $row->Car->open_kilometers_price}}").prop('disabled', true) : $('#open_kilometers_price').val("0").prop('disabled', true);
        $('#order_status').val("{{$row->order_status}}").prop('disabled', true);
        $('#device').val("{{ $row->device }}").prop('disabled', true);
        $('#total').val("{{$row->total}}").prop('disabled', true);
    });
    function orderStatusCheck(that){
    if (that.value == "Rejected") {
                document.getElementById("reason_of_rejection").style.display = "block";
            } else {
                document.getElementById("reason_of_rejection").style.display = "none";
            }
}
 </script>



@endpush
