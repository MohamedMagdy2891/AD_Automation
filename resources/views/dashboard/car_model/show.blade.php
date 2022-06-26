@extends('dashboard.layouts.main')
@push('title') عرض بيانات {{ $row->ar_name }}@endpush
@push('header') عرض بيانات {{ $row->ar_name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.car-model.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
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

                @include('dashboard.car_model.form')
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <img class="rounded mx-auto d-block" width="150"  src="{{ URL::asset($row->image) }}" alt="{{ $row->ar_name }}">
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
        $('#ar_name').val("{{ $row->ar_name }}").prop('disabled', true);
        $('#en_name').val("{{ $row->en_name }}").prop('disabled', true);
        $('#image').prop('disabled', true);
    });

 </script>

@endpush
