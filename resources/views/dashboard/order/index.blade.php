@extends('dashboard.layouts.main')
@push('title')طلبات السيارات   @endpush
@push('header') طلبات السيارات@endpush
@section('content')
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2"  ></div>
                <div class="col-md-4 text-right mb-2"  >
                    <form action="{{ URL::route('dashboard.orders.search') }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <input  type="text" @if(session()->has('search')) value="{{ session()->get('search_name') }}" @endif name="search" style="border-radius: 50px;display: inline;width:80%" class="form-control p-0 pt-1 text-center" placeholder="ابحث  بكود السيارة">
                        @if(session()->has('search'))
                            <a style="display: inline;border-radius: 100px" class="btn btn-primary pr-2 pl-2 pt-1 pb-0 m-0" href="{{ URL::route('dashboard.orders.index') }}" ><span style="font-size: 1rem" class="icon-close"></span></a>
                        @endif
                    </form>
                </div>
                <div class="col-md-4 text-right mb-2">
                    @if(count($rows) != 0)
                        {{-- <a id="delete" style="display: inline" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.orders.delete.all') }}">حذف الكل <span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></a> --}}
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
                                    <th> اسم المستخدم</th>
                                    <th>  كود السيارة </th>
                                    <th>  مكان الإستلام </th>
                                    <th>وقت الإستلام </th>
                                    <th>مكان التسليم</th>
                                    <th>  وقت التسليم  </th>
                                    <th>  عدد الكيلومترات المستهلكة  </th>
                                    <th> عدد ساعات الإستخدام </th>
                                    <th>سائق إضافي </th>
                                    <th>مقعد أطفال  </th>
                                    <th>درع  </th>
                                    <th>open kilometers</th>
                                    <th>total</th>
                                    <th>حالة الطلب</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($rows) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($rows as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->Client->fn_name }}</td>
                                            <td>{{ $row->Car->code }}</td>
                                            <td>{{ $row->receive_place}}</td>
                                            <td>{{ $row->receive_time }}</td>
                                            <td>{{ $row->deliver_place }}</td>
                                            <td>{{ $row->deliver_time }}</td>
                                            <td>{{ $row->killometers_consumed }}</td>
                                            <td>{{ $row->hours_consumed }}</td>


                                            <td> @if ($row->extra_driver_checked) نعم @else لا  @endif </td>

                                            <td> @if ($row->baby_seat_checked) نعم @else لا  @endif </td>
                                            <td> @if ($row->open_kilometers_checked) نعم @else لا  @endif </td>
                                            <td> @if ($row->shield_checked) نعم @else لا  @endif </td>
                                            <td>{{ $row->total }}</td>
                                             <td>{{ $row->order_status }}</td>
                                            <td>
                                                <a class="btn btn-success btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.orders.show', $row->id ) }}"><span class="icon-eye text-light" style="font-size: .8rem"></span></a>
                                                <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.orders.edit',$row->id) }}"><span class="w-100 icon-pencil text-light" style="font-size: .8rem"></span></a>


                                            </td>

                                        </tr>

                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="6" class="text-bold">لا يوجد اى مستخدمين مضافين حتي الان</td>
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
