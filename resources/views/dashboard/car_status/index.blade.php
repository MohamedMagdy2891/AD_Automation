@extends('dashboard.layouts.main')
@push('title')حالات السيارات    @endpush
@push('header')  حالات السيارات@endpush
@section('content')
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2"  ></div>
                <div class="col-md-4 text-right mb-2"  >

                </div>
                <div class="col-md-4 text-right mb-2"  >
                    <a id="addStatus" style="display: inline" class="btn btn-primary btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.carstatuses.create') }}">إضافة حالة سيارة جديدة  <span class="w-100  text-light" style="font-size: .8rem"><i class="icon-plus"></i></span></a>

                    <a id="delete" style="display: inline" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.carstatuses.delete.all') }}">حذف الكل <span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></a>

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
                                    <th> حالة السيارة ( باللغة العربية ) </th>
                                    <th> حالة السيارة ( باللغة الإنجليزية) </th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($statuses) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($statuses as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->ar_name }}</td>
                                            <td>{{ $row->en_name }}</td>


                                            <td>
                                                {{-- <a class="btn btn-success btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.carstatuses.show', $row->id ) }}"><span class="icon-eye text-light" style="font-size: .8rem"></span></a> --}}
                                                <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.carstatuses.edit',$row->id) }}"><span class="w-100 icon-pencil text-light" style="font-size: .8rem"></span></a>
                                                <form  style="display: inline" action="{{ URL::route('dashboard.carstatuses.destroy',$row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type="submit" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" ><span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></button>
                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="9" class="text-bold">لا يوجد اى حالات للسيارات  حتي الان</td>
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
    @if(count($statuses) > 0)
        <script>
            $(document).ready(function(){
                $("[id=delete]").slideDown();
            });

        </script>
    @endif
@endpush
