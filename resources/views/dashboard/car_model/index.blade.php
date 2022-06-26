@extends('dashboard.layouts.main')
@push('title') موديلات السيارات@endpush
@push('header') كل موديلات السيارات@endpush
@section('content')
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2" ></div>
                <div class="col-md-4 text-right mb-2"  >
                    <form action="{{ URL::route('dashboard.car_model.search') }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <input  type="text" @if(session()->has('search')) value="{{ session()->get('search_name') }}" @endif name="search" style="border-radius: 50px;display: inline;width:80%" class="form-control p-0 pt-1 text-center" placeholder="ابحث باسم موديل السيارة ( باللغة العربية )">
                        @if(session()->has('search'))
                            <a style="display: inline;border-radius: 100px" class="btn btn-primary pr-2 pl-2 pt-1 pb-0 m-0" href="{{ URL::route('dashboard.car-model.index') }}" ><span style="font-size: 1rem" class="icon-close"></span></a>
                        @endif
                    </form>
                </div>
                <div class="col-md-4 text-right mb-2"  >
                    <a id="delete" style="display: none" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.car_model.delete.all') }}">حذف الكل <span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></a>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>م</th>
                                    <th> اسم موديل السيارة ( باللغة العربية )</th>
                                    <th> اسم موديل السيارة ( باللغة الانجليزية )</th>
                                    <th> صورة موديل السيارة </th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($rows) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($rows as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->ar_name }}</td>
                                            <td>{{ $row->en_name }}</td>
                                            <td><img class="rounded mx-auto d-block" width="50"  src="{{ URL::asset($row->image) }}" alt="{{ $row->ar_name }}"></td>
                                            <td>
                                                <a class="btn btn-success btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.car-model.show', $row->id ) }}"><span class="icon-eye text-light" style="font-size: .8rem"></span></a>
                                                <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.car-model.edit',$row->id) }}"><span class="w-100 icon-pencil text-light" style="font-size: .8rem"></span></a>
                                                <form  style="display: inline" action="{{ URL::route('dashboard.car-model.destroy',$row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type="submit" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" ><span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></button>
                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="5" class="text-bold">لا يوجد اى موديلات سيارات مضافة حتي الان</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-12 text-center">
            {{ $rows->links() }}
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
