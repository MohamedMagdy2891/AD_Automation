@extends('dashboard.layouts.main')
@push('title') عرض بيانات المستخدم {{ $row->name }}@endpush
@push('header') عرض بيانات المستخدم {{ $row->name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.user.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="row">
            </div>
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">عرض بيانات المستخدم {{ $row->name }}</div>
            </div>
            <form class="card-body"enctype="multipart/form-data">
                @csrf
                @method('POST')
                @include('dashboard.user.form2')
                @if($row->image != null)

                    <div class="row gutters">
                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="image"> صورة المستخدم</label>
                                <img id="image" style="height:200px" class="img-fluid rounded" alt="Responsive image" src="{{ URL::asset($row->image) }}">
                            </div>
                        </div>

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
        $('#name').val("{{ $row->name }}").prop('disabled', true);
        $('#type').val("{{ $row->type }}").prop('disabled', true);
        $('#phone').val("{{ $row->phone }}").prop('disabled', true);
        $('#email').val("{{ $row->email }}").prop('disabled', true);
    });

 </script>



@endpush
