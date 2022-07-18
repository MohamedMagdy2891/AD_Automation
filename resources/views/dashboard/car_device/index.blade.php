@extends('dashboard.layouts.main')
@push('title') اجهزة السيارات@endpush
@push('header') كل اجهزة السيارات@endpush
@section('content')
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2" ></div>
                <div class="col-md-4 text-right mb-2"  >
                    <form action="{{ URL::route('dashboard.device.search') }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <input  type="text" @if(session()->has('search')) value="{{ session()->get('search_name') }}" @endif name="search" style="border-radius: 50px;display: inline;width:80%" class="form-control p-0 pt-1 text-center" placeholder="ابحث برقم vin لجهاز تتبع السيارة">
                        @if(session()->has('search'))
                            <a style="display: inline;border-radius: 100px" class="btn btn-primary pr-2 pl-2 pt-1 pb-0 m-0" href="{{ URL::route('dashboard.device.index') }}" ><span style="font-size: 1rem" class="icon-close"></span></a>
                        @endif
                    </form>
                </div>
                <div class="col-md-4 text-right mb-2"  >
                    @if(count($rows) != 0)
                        <a id="delete" style="display: none" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.device.delete.all') }}">حذف الكل <span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></a>
                    @endif
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
                                    <th> رقم iemi</th>
                                    <th> رقم vin</th>
                                    <th>رقم لوحة السيارة</th>
                                    <th>اسم السيارة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($rows) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($rows as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row['imei'] }}</td>
                                            <td>{{ $row['vin'] }}</td>
                                            <td>{{ $row['plateNumber'] }}</td>
                                            <td>{{ $row['name'] }}</td>
                                            <td><a  href="{{ URL::route('dashboard.device.show',$row['vin']) }}" class="btn btn-primary text-light">المزيد من المعلومات</a></td>

                                        </tr>

                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="6" class="text-bold">لا يوجد اى أجهزة تتبع للسيارات مضافة حتي الان</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

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
