@extends('dashboard.layouts.main')
@push('title')   عمليات الدفع  @endpush
@push('header') عمليات الدفع @endpush
@section('content')
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2"></div>
                <div class="col-md-4 text-right mb-2">

                    <form action="{{ route('dashboard.payment_history.search') }}" method="POST" style="display: inline">
                        @csrf
                        @method('POST')
                        <input  type="text" @if(session()->has('search')) value="{{ session()->get('search_name') }}" @endif name="search" style="border-radius: 50px;display: inline;width:80%" class="form-control p-0 pt-1 text-center" placeholder="ابحث  برقم هوية العميل ">
                        @if(session()->has('search'))
                            <a style="display: inline;border-radius: 100px" class="btn btn-primary pr-2 pl-2 pt-1 pb-0 m-0" href="{{ route('dashboard.payment_history.index') }}" ><span style="font-size: 1rem" class="icon-close"></span></a>
                        @endif
                    </form>
                </div>
                <div class="col-md-4 text-right mb-2">
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
                                    <th>   صاحب الطلب </th>
                                    <th>  كود السيارة</th>
                                    <th>  تاريخ  الطلب</th>
                                    <th>  حالة الطلب</th>
                                    <th>   كود الرسالة </th>
                                    <th>   نص الرسالة </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($rows) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($rows as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->Order->Client->full_name }}</td>
                                            <td>{{ $row->Order->Car->code }}</td>
                                            <td>{{ $row->Order->created_at }}</td>
                                            <td>{{ $row->Order->order_status }}</td>
                                            <td>{{ $row->payment_message_code }}</td>
                                            <td>{{ $row->payment_message}}</td>


                                        </tr>

                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="16" class="text-bold">لا يوجد اى  تنبيهات للطلبات </td>
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
