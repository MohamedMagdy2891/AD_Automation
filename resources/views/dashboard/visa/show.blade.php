@extends('dashboard.layouts.main')
@push('title') عرض بيانات بطاقة إئتمان المستخدم {{ $row->Client->full_name }}@endpush
@push('header') عرض بيانات بطاقةإئتمان المستخدم {{ $row->Client->full_name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.visas.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">عرض بيانات  بطاقة المستخدم  {{ $row->Client->full_name }}</div>
            </div>
            <form class="card-body"enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('dashboard.visa.form')

            </form>
        </div>
    </div>

</div>
@endsection
@push('js')
 <script>
    $(document).ready(function(){
        $('#message').delay(3000).fadeOut('slow');
        $('#client_name').val("{{ $row->Client->full_name }}").prop('disabled', true);
        $('#credit_card_number').val("{{ $row->credit_card_number }}").prop('disabled', true);
        $('#credit_card_type').val("{{ $row->credit_card_type }}").prop('disabled', true);
        $('#result').val("{{ $row->result }}").prop('disabled', true);
        $('#exp_date_month').val("{{ $row->exp_date_month }}").prop('disabled', true);
        $('#exp_date_year').val("{{ $row->exp_date_year }}").prop('disabled', true);
        $('#csv_number').val("{{ $row->csv_number }}").prop('disabled', true);
    });

 </script>



@endpush
