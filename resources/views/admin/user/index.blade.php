@extends('admin.layouts.master',['title'=>'قائمة المستخدمين'])
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

    <div class="mt-3 col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة المستخدمين</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{route('admin.user.create')}}" class="modal-effect btn btn-outline-primary btn-block col-1 m-1">
                    <i class="typcn typcn-plus"></i>اضافة</a>
                <br>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                        <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0 sorting">الاسم</th>
                            <th class="wd-15p border-bottom-0 sorting">البريد</th>
                            <th class="wd-15p border-bottom-0 sorting">العقارات</th>
                            <th class="wd-15p border-bottom-0 sorting">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>

                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ( (is_array($user->buildings) || is_object($user->buildings)))

                                    @foreach($user->buildings as $building)
                                        <a href="{{route('admin.building.edit',$building->id)}}"> {{$building->name}}</a><br>
                                    @endforeach
                                @else


                                @endif


                                </td>
                            <td>

                                <a class="btn btn-warning-gradient btn-icon d-inline-flex" data-effect="effect-scale"
                                   href="{{route('admin.user.edit',$user->id)}}" title="تعديل"><i  class="typcn typcn-edit"></i></a>

                                <button id="delete"  data-route="{{route('admin.user.delete')}}"
                                        title="حذف"data-id="{{$user->id}}"class="btn btn-danger-gradient btn-icon d-inline-flex ">
                                    <i class="typcn typcn-trash"></i></button>
                            </td>


                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@push('js')

    @include('admin.user._js')

@endpush

@endsection


