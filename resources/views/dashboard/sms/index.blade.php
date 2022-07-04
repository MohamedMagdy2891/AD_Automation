@extends('dashboard.layouts.main')
@push('title') اعدادات الرسائل@endpush
@push('header') اعدادات الرسائل@endpush
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
                                    <th> البوابة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($rows) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($rows as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->gateway == "alghad" ? "بوابة الغد" : "بوابة NetPowers" }}</td>
                                            <td>
                                                <a class="btn btn-info btn-rounded p-1 pr-2 pl-2" href="{{ URL::route('dashboard.sms.edit') }}"><span class="w-100 icon-pencil text-light" style="font-size: .8rem"></span></a>


                                            </td>

                                        </tr>

                                    @endforeach

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

@endpush
