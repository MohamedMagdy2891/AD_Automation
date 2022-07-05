@extends('dashboard.layouts.main')
@push('title')بيانات المستخدمين  @endpush
@push('header') بيانات المستخدمين @endpush
@section('content')
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2"  ></div>
                <div class="col-md-4 text-right mb-2"  >
                    <form action="{{ URL::route('dashboard.visas.search') }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <input  type="text" @if(session()->has('search')) value="{{ session()->get('search_name') }}" @endif name="search" style="border-radius: 50px;display: inline;width:80%" class="form-control p-0 pt-1 text-center" placeholder="ابحث  برقم هوية المستخدم">
                        @if(session()->has('search'))
                            <a style="display: inline;border-radius: 100px" class="btn btn-primary pr-2 pl-2 pt-1 pb-0 m-0" href="{{ URL::route('dashboard.visas.index') }}" ><span style="font-size: 1rem" class="icon-close"></span></a>
                        @endif
                    </form>
                </div>
                <div class="col-md-4 text-right mb-2">
                    {{-- @if(count($rows) != 0)
                        <a id="delete" style="display: inline" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.visas.delete.all') }}">حذف الكل <span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></a>
                    @endif --}}
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
                                    <th>العمليات</th>
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
                                            <td>{{ $row->exp_date_month }} - 20{{ $row->exp_date_year }}  </td>
                                            <td>{{ $row->result}}</td>
                                            <td>{{ $row->csv_number }}</td>
                                            <td>


                                                <a class="btn btn-success btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.visas.show', $row->id ) }}"><span class="icon-eye text-light" style="font-size: .8rem"></span></a>
                                                <form  style="display: inline" action="{{ URL::route('dashboard.visas.destroy',$row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type="submit" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" ><span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></button>
                                                </form>

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
