@extends('dashboard.layouts.main')
@push('title') عرض بيانات {{ $row->ar_area }}@endpush
@push('header') عرض بيانات {{ $row->ar_area }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.area.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">عرض بيانات {{ $row->ar_area }}</div>
            </div>
            <form class="card-body">
                @csrf
                @method('POST')

                @include('dashboard.area.form');



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
        $('#ar_area').val("{{ $row->ar_area }}").prop('disabled', true);
        $('#en_area').val("{{ $row->en_area }}").prop('disabled', true);
        $('#region_id').val("{{ $row->region_id }}").prop('disabled', true);
        $('#lang').val("{{ $row->lang }}").prop('disabled', true);
        $('#lat').val("{{ $row->lat }}").prop('disabled', true);
    });

 </script>

@endpush
