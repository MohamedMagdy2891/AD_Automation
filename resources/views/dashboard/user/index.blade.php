@extends('dashboard.layouts.main')
@push('title')بيانات المستخدمين  @endpush
@push('header') @endpush
@section('content')
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> c88d5d403b1e8587616d778d6cd449442e2ca396
=======
=======

>>>>>>> 128babb790733925ad8c2c1f55db8eaf3b9b6533
>>>>>>> eaff86b4867d798a8b2098d1d003f8988697841a
    <div class="row gutters">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-right mb-2"  ></div>
                <div class="col-md-4 text-right mb-2"  >
                    <form action="{{ URL::route('dashboard.user.search') }}" method="post" style="display: inline">
                        @csrf
                        @method('POST')
                        <input  type="text" @if(session()->has('search')) value="{{ session()->get('search_name') }}" @endif name="search" style="border-radius: 50px;display: inline;width:80%" class="form-control p-0 pt-1 text-center" placeholder="ابحث باسم المستخدم">
                        @if(session()->has('search'))
                            <a style="display: inline;border-radius: 100px" class="btn btn-primary pr-2 pl-2 pt-1 pb-0 m-0" href="{{ URL::route('dashboard.user.index') }}" ><span style="font-size: 1rem" class="icon-close"></span></a>
                        @endif
                    </form>
                </div>
                <div class="col-md-4 text-right mb-2">
                    @if(count($rows) == 0)
                        <a id="delete" style="display: inline" class="btn btn-danger btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.user.delete.all') }}">حذف الكل <span class="w-100 icon-trash-2 text-light" style="font-size: .8rem"></span></a>
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
                                    <th> رقم الهاتف </th>
                                    <th> البريد الإلكتروني </th>
                                    <th>دور المستخدم</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($users as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>


                                                <a class="btn btn-success btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.user.show', $row->id ) }}"><span class="icon-eye text-light" style="font-size: .8rem"></span></a>
                                                <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.user.edit',$row->id) }}"><span class="w-100 icon-pencil text-light" style="font-size: .8rem"></span></a>
                                                <form  style="display: inline" action="{{ URL::route('dashboard.user.destroy',$row->id) }}" method="POST">
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
            {{-- {{ $users->links() }} --}}
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
    @if(count($users) > 0)
        <script>
            $(document).ready(function(){
                $("[id=delete]").slideDown();
            });

        </script>
    @endif
@endpush
