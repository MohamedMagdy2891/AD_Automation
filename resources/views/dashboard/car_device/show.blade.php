@extends('dashboard.layouts.main')
{{-- @push('title') عرض بيانات جهاز تتبع سيارة {{ $row->vin }}@endpush --}}
{{-- @push('header') عرض بيانات جهاز تتبع سيارة {{ $row->getCar->ar_name }}@endpush --}}
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.device.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                {{-- <div class="card-title text-center text-light pb-1">عرض بيانات جهاز تتبع سيارة {{ $row->getCar->ar_name }}</div> --}}
            </div>
            <form class="card-body">
                @csrf
                @method('POST')

                @if ( $row['status'])
                @include('dashboard.car_device.form')
                @else
                <div class="row gutters " id="message">
                    لا يوجد بيانات لهذا الجهاز


                </div>

                @endif



            </form>
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

