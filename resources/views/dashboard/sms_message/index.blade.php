@extends('dashboard.layouts.main')
@push('title') كل الرسائل@endpush
@push('header') كل الرسائل@endpush
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
                                    <th> رقم الجوال</th>
                                    <th>الرسالة</th>
                                    <th>البوابة</th>
                                    <th>تاريخ / وقت الارسال</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($rows) > 0)
                                    @php $i=1; @endphp
                                    @foreach ($rows as $row)
                                        <tr class="text-center">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->message }}</td>
                                            <td>{{ $row->gateway == "alghad" ? "بوابة الغد" : "بوابة NetPowers" }}</td>
                                            <td>{{ $row->created_at }}</td>



                                        </tr>

                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="5" class="text-bold">لا توجد رسائل مرسلة حتي الان</td>
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
