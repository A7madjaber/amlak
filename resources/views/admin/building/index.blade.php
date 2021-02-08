@extends('admin.layouts.master',['title'=>'قائمة العقارات'])
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
                    <h4 class="card-title mg-b-0">قائمة العقارات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{route('admin.building.create')}}" class="modal-effect btn btn-outline-primary btn-block col-1 m-1">
                    <i class="typcn typcn-plus"></i>اضافة</a>
                <br>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                        <thead>
                        <tr>
                            <th class="border-bottom-0 sorting"></th>
                            <th class=" border-bottom-0 sorting">اسم العقار</th>
                            <th class=" border-bottom-0 sorting">السعر</th>
                            <th class=" border-bottom-0 sorting">النوع</th>
                            <th class=" border-bottom-0 sorting">صاحب العقار</th>
                            <th class=" border-bottom-0 sorting">تاريخ الاضافة</th>
                            <th class=" border-bottom-0 sorting">الحالة</th>
                            <th class=" border-bottom-0 sorting">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buildings as $building)
                        <tr>

                            <td>{{$loop->index+1}}</td>
                            <td>{{$building->name}}</td>
                            <td>{{$building->price}}</td>
                            <td>{{$building->type->name}}</td>
                            <td><a href="{{route('admin.building.index',$building->user->id)}}">{{$building->user->name}}</a> </td>
                            <td>{{$building->created_at->diffforhumans()}}</td>
                            <td>

                                @if ($building->status==1)
                                    <span class="badge badge-success ">معروضة</span>
                                    @else
                                    <span class="badge badge-warning">غير معروضة</span>
                                @endif

                            </td>


                            <td>
                                <a class="btn btn-warning-gradient btn-icon d-inline-flex" data-effect="effect-scale"
                                   href="{{route('admin.building.edit',$building->id)}}" title="تعديل"><i  class="typcn typcn-edit"></i></a>

                                <button id="delete"  data-route="{{route('admin.building.delete')}}"
                                        title="حذف"data-id="{{$building->id}}"class="btn btn-danger-gradient btn-icon d-inline-flex ">
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

    @include('admin.building._js')

@endpush

@endsection


