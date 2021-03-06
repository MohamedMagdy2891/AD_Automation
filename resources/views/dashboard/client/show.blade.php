@extends('dashboard.layouts.main')
@push('title') عرض بيانات العميل {{ $row->full_name }}@endpush
@push('header') عرض بيانات العميل {{ $row->full_name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.client.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">عرض بيانات العميل {{ $row->full_name }}</div>
            </div>
            <form class="card-body">
                @csrf
                @method('POST')

                @include('dashboard.client.form')



            </form>
        </div>
    </div>

</div>
@endsection
@push('js')
 <script>
    $(document).ready(function(){
        $('#message').delay(3000).fadeOut('slow');
        $('#full_name').val("{{ $row->full_name }}").prop('disabled', true);
        $('#phone').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#verification_status').prop('disabled', true);
        $('#license_id').prop('disabled', true);


    });

 </script>

@endpush
