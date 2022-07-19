@extends('dashboard.layouts.main')
@push('title') اجهزة السيارات@endpush
@push('header') كل اجهزة السيارات@endpush
@section('content')
    <div class="row gutters">

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
                                            <td><a  href="{{ URL::route('dashboard.device.show',[$row['name'],$row['vin']]) }}" class="btn btn-primary text-light">المزيد من المعلومات</a></td>

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
    @if(count($rows) > 0)
        <script>
            $(document).ready(function(){
                $("[id=delete]").slideDown();
            });

        </script>
    @endif
@endpush
