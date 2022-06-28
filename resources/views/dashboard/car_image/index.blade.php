@extends('dashboard.layouts.main')
@push('title') صور السيارة : {{ $row->name }}@endpush
@push('header') كل صور السيارة : {{ $row->name }}@endpush
@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- Card start -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Image Rounded
                </div>
            </div>
            <div class="card-body">

                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                        <img src="img/img5.jpg" class="img-fluid rounded" alt="Responsive image">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                        <img src="img/img9.jpg" class="img-fluid rounded" alt="Responsive image">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                        <img src="img/img10.jpg" class="img-fluid rounded" alt="Responsive image">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                        <img src="img/img7.jpg" class="img-fluid rounded" alt="Responsive image">
                    </div>
                </div>

            </div>
        </div>
        <!-- Card end -->
    </div>
</div>

@endsection

@push('js')
    @if(session()->has('success'))
        <script>
                $.toast({
                    heading: 'نجحت العملية',
                    text: "<span>{{ session()->get('success') }}</span>",
                    showHideTransition: 'slide',
                    icon: 'success',
                    textAlign:'right'

                })
        </script>
    @endif
    @if(count($rows) > 0)
        <script>
            $(document).ready(function(){
                $("[id=delete]").slideDown();
            });

        </script>
    @endif
@endpush
