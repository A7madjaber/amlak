@extends('admin.layouts.master',['title'=>'الرسائل '])
@push('css')

    <!-- Internal Data table css -->
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">


@endpush


@section('content')
<br>
@include('admin.layouts.errors')


<div class="mt-3 col-xl-12">
        <div class="card mg-b-20">

            <div class="card-header pb-0">


            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">المرسل</th>
                            <th class="border-bottom-0">البريد</th>
                            <th class="border-bottom-0">عنوان الرسالة</th>
                            <th class="border-bottom-0">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->subject}}</td>
                                <td>

                                    <a class="btn btn-info btn-icon d-inline-flex"href="{{route('admin.messages.show',$message->id)}}" title="التفاصيل"><i  class="typcn typcn-eye"></i></a>

                                    <button id="delete"  data-id="{{$message->id}}" data-route="{{route('admin.messages.delete')}}" title=" حذف"
                                            class="btn btn-danger btn-icon d-inline-flex "><i class="typcn typcn-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--Add--}}
@include('admin.type._add')


<!-- edit -->



@push('js')

   @include('admin.type._js')

@endpush


@endsection


