@extends('dashboard.layouts.main')
{{-- @push('title') عرض بيانات جهاز تتبع سيارة {{ $row->vin }}@endpush --}}
{{-- @push('header') عرض بيانات جهاز تتبع سيارة {{ $row->getCar->ar_name }}@endpush --}}
@section('content')
@php
$lock=true;
$unlock=false;
$block=false;
$unblock=false;
@endphp
<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.device.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
            </div>
            @if ( $row['status'])
            <form class="card-body">
                @csrf
                @method('POST')
                @include('dashboard.car_device.form')
            </form>
            <div class="row gutters">
                <form class="card-body" action="{{ URL::route('dashboard.device.updateType',[$row['data']['vin'],$row['data']['commandId'] ]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('dashboard.car_device.form2')
                </form>
                <form class="card-body" action="{{ URL::route('dashboard.device.updateType',[$row['data']['vin'],$row['data']['commandId'] ]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('dashboard.car_device.form3')
                </form>
        </div>
            @else
            <div class="row gutters " id="message">
                لا يوجد بيانات لهذا الجهاز
            </div>
            @endif
        </div>
    </div>

</div>
@endsection
@if( $row['status'])

@push('js')
 <script>
    $(document).ready(function(){

        $('#vin').val("{{ $row['data']['vin'] }}").prop('disabled', true);
        $('#type').val("{{ $row['data']['type'] }}").prop('disabled', true);
        $('#state').val("{{ $row['data']['state'] }}").prop('disabled', true);

    })

 </script>
 @endpush
@endif

