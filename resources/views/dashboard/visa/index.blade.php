@extends('dashboard.layouts.main')
@push('title')بيانات بطاقات الائتمان  @endpush
@push('header') بيانات بطاقات الائتمان @endpush
@section('content')
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2"  ></div>
                <div class="col-md-4 text-right mb-2"  >
                    <form action="{{ URL::route('dashboard.visas.search') }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <input  type="text" @if(session()->has('search')) value="{{ session()->get('search_name') }}" @endif name="search" style="border-radius: 50px;display: inline;width:80%" class="form-control p-0 pt-1 text-center" placeholder="ابحث  برقم بطاقة الائتمان">
                        @if(session()->has('search'))
                            <a style="display: inline;border-radius: 100px" class="btn btn-primary pr-2 pl-2 pt-1 pb-0 m-0" href="{{ URL::route('dashboard.visas.index') }}" ><span style="font-size: 1rem" class="icon-close"></span></a>
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
                                    <th> اسم العميل</th>
                                    <th> نوع البطاقة الإئتمانية  </th>
                                    <th>  رقم البطاقة الإئتمانية </th>
                                    <th>تاريخ الإنتهاء </th>
                                    <th> حالة البطاقة</th>
                                    <th>CSV</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($rows) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($rows as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->Client->full_name }}</td>
                                            <td>{{ $row->credit_card_type }}</td>
                                            <td>{{ $row->credit_card_number }}</td>
                                            <td>{{ $row->exp_date_month }}-20{{ $row->exp_date_year }}  </td>
                                            <td>{{ $row->result}}</td>
                                            <td>{{ $row->csv_number }}</td>


                                        </tr>

                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="7" class="text-bold">لا يوجد اى بطاقات ائتمان مضافة حتي الان</td>
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

@endpush
