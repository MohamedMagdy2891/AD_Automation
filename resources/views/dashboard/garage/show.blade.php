@extends('dashboard.layouts.main')
@push('title') عرض بيانات {{ $row->ar_garage }}@endpush
@push('header') عرض بيانات {{ $row->ar_garage }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.garage.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">عرض بيانات {{ $row->ar_garage }}</div>
            </div>
            <form class="card-body">
                @csrf
                @method('POST')

                @include('dashboard.garage.form');



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
        $('#ar_garage').val("{{ $row->ar_garage }}").prop('disabled', true);
        $('#en_garage').val("{{ $row->en_garage }}").prop('disabled', true);
        $('#ar_address').val("{{ $row->ar_address }}").prop('disabled', true);
        $('#en_address').val("{{ $row->en_address }}").prop('disabled', true);
        $('#region_id').val("{{ $row->region_id }}").prop('disabled', true);
        $('#lang').val("{{ $row->lang }}").prop('disabled', true);
        $('#lat').val("{{ $row->lat }}").prop('disabled', true);
    });

 </script>

@endpush
