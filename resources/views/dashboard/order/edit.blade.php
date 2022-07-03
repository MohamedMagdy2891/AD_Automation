@extends('dashboard.layouts.main')
@push('title') تعديل بيانات {{ $row->name }}@endpush
@push('header') تعديل بيانات {{ $row->name }}@endpush
@section('content')

<div class="row gutters">
    <div class="col-md-12 text-right mb-2">
        <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.user.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-center text-light pb-1">تعديل بيانات {{ $row->name }}</div>
            </div>
            <form class="card-body" action="{{ URL::route('dashboard.user.update',$row->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('dashboard.user.form2')


                <div class="row gutters">
                    <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="image"> صورة المستخدم</label>
                            <input type="file" accept=".jpg,.jpeg,.png"  class="form-control p-0 pt-1 pr-2" id="image" name="image">

                        </div>
                    </div>

                </div>
                @if($row->image != null)

                    <div class="row gutters">
                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <img id="image" style="height:200px" class="img-fluid rounded" alt="Responsive image" src="{{ URL::asset($row->image) }}">
                            </div>
                        </div>

                    </div>
                @endif

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
        $('#name').val("{{ $row->name }}");
        $('#password').val("{{ $row->password }}");
        $('#phone').val("{{ $row->phone }}");
        $('#email').val("{{ $row->email }}");
        $('#type').val("{{ $row->type }}");
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
