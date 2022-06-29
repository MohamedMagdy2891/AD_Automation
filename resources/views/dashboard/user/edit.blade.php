@extends('dashboard.layouts.main')
@push('title') تعديل بيانات {{ $users->name }}@endpush
@push('header') تعديل بيانات {{ $users->name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.user.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">تعديل بيانات {{ $users->name }}</div>
            </div>
            <form class="card-body" action="{{ URL::route('dashboard.user.update',$users->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('dashboard.user.form')


                <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                    @if($users->image!= null )
                    <img src="{{asset($users->image) }}" alt=" صورة {{ $users->name }}">
                    @endif
                </div>

                <div class="row gutters">
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12"></div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2 w-100">تعديل</button>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12"></div>
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
        $('#name').val("{{ $users->name }}");
        $('#password').val("{{ $users->password }}");
        $('#phone').val("{{ $users->phone }}");
        $('#email').val("{{ $users->email }}");
        $('#type').val("{{ $users->type }}");
    });

 </script>

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
 @if(session()->has('failed'))
    <script>
            $.toast({
                heading: 'فشلت العملية',
                text: "<span>{{ session()->get('failed') }}</span>",
                showHideTransition: 'slide',
                icon: 'error',
                textAlign:'right'

            })
    </script>
 @endif
@endpush
