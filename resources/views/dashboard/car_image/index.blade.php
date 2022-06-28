@extends('dashboard.layouts.main')
@push('title') صور السيارة : {{ $car->ar_name }}@endpush
@push('header') كل صور السيارة : {{ $car->ar_name }}@endpush
@section('content')

<div class="row gutters">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 text-right mb-2" ></div>
            <div class="col-md-4 text-right mb-2"  >
                <form action="{{ URL::route('dashboard.car.image.store',$car->id) }}" method="post" style="display: inline" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="image" class="ml-2">صورة السيارة</label>
                        <input id="image" type="file" accept="image/.jpg,.jpeg,.png" style="display: inline;width:70%" name="image" class="form-control p-0 pt-1 text-center">
                        <button type="submit" class="btn btn-primary mr-1" >اضافة</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-right mb-2" >
                <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.car.index') }}"><span class="w-100 icon-arrow-left text-light" style="font-size: 1.3rem"></span></a>
            </div>

        </div>
        @if($errors->any)
            <div class="row gutters " id="message">
                <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                </div>
                <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                    @if($errors->has('image'))
                        <div class="form-group bg-danger text-center pb-2 pt-2">
                            <p class="text-bold text-light">{{ $errors->first('image') }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-4">
                </div>

            </div>
        @endif
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- Card start -->
        <div class="card">
            <div class="card-header pt-2 pb-2 text-center">
                <div class="card-title">
                    كل صور السيارة : {{ $car->ar_name }}
                </div>
            </div>
            <div class="card-body">

                <div class="row gutters">
                    @foreach ($rows as $row)
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <img src="{{ URL::asset($row->image) }}" style="height:200px;width:100%" class="img-fluid rounded" alt="Responsive image">
                            <div class="row">
                                <div class="col-md-12 text-center pt-1">
                                    <form style="display: inline" action="{{ URL::route('dashboard.car.image.destroy',$row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  type="submit" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" ><span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
        <!-- Card end -->
    </div>
    <div class="col-md-12 text-center">
        {{ $rows->links() }}
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).ready(function(){
        $('#message').delay(3000).fadeOut('slow');
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

@endpush
