@extends('admin.layouts.master',['title'=>'تعديل مستخدم'])
@push('css')
    <!-- Internal Nice-select css  -->
    <link href="{{asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />

@endpush
@section('content')
    <!-- row -->
    <br>
    @include('admin.layouts.errors')

    <div class="row">


        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">

                    <form class="parsley-style-2" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('admin.user.update',[$user->id])}}" method="POST">
                      @csrf

                        <div>

                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" value="{{$user->name,old('name')}}"
                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" value="{{$user->email,old('email')}}"
                                           data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                </div>
                            </div>

                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="password"  type="password">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="password_confirmation" id="password-confirm"  type="password">
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> صلاحية المستخدم</label>
                                        <select name="admin" id="select-beast" class="form-control  nice-select  custom-select">

                                        <option value="" disabled selected>اختار نوع الصلاحيات</option>
                                        <option value="0" >مستخدم</option>
                                        <option value="1" >مدير</option>



                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="panel panel-primary tabs-style-2">
                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">  العقارات المعروضة  <span class="badge badge-info"> {{count($building_active)}} </span></a></li>
                                    <li><a href="#tab5" class="nav-link " data-toggle="tab">   العقارات الغير معروضة  <span class="badge badge-info"> {{count($building_Notactive)}} </span></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <ul  class="list-group wd-md-100p users-list-group">

                                        @foreach($building_active as $bu)
                                            <li  class="list-group-item d-flex align-items-center">
                                                <img alt="" class="ml-3 thumbnail-circle avatar-md" src="{{asset('media/buildings/'.$bu->name.'/'.$bu->image_one)}}">
                                                <div>
                                                    <h6 class="tx-15 mb-1 tx-inverse tx-semibold mg-b-0">{{$bu->name}}</h6><span class="d-block tx-13 text-muted">{{$bu->created_at->diffforhumans()}}</span>
                                                </div>
                                                <div class="d-flex float-right mr-auto">
                                                    <a title="الغاء التفعيل" href="{{route('admin.building.status',$bu->id)}}" class="btn btn-danger btn-icon ml-2">
                                                        <div class=""><i class="bx bx-dislike"></i></div>
                                                    </a>
                                                    <a href="{{route('admin.building.edit',$bu->id)}}" class="btn btn-warning btn-icon">
                                                        <div class=""><i class="bx bx-edit"></i></div>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <ul  class="list-group wd-md-100p users-list-group">

                                        @foreach($building_Notactive as $bu)
                                            <li  class="list-group-item d-flex align-items-center">
                                                <img alt="" class="ml-3 thumbnail-circle avatar-md" src="{{asset('media/buildings/'.$bu->name.'/'.$bu->image_one)}}">
                                                <div>
                                                    <h6 class="tx-15 mb-1 tx-inverse tx-semibold mg-b-0">{{$bu->name}}</h6><span class="d-block tx-13 text-muted">{{$bu->created_at->diffforhumans()}}</span>
                                                </div>
                                                <div class="d-flex float-right mr-auto">
                                                    <a title="تفعيل" href="{{route('admin.building.status',$bu->id)}}" class="btn btn-success btn-icon ml-2">
                                                        <div class=""><i class="bx bx-like"></i></div>
                                                    </a>
                                                    <a title="تعديل" href="{{route('admin.building.edit',$bu->id)}}" class="btn btn-warning btn-icon">
                                                        <div class=""><i class="bx bx-edit"></i></div>
                                                    </a>
                                                </div>
                                            </li>
                                            @endforeach
                                    </ul>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@push('js')



    <!-- Internal Nice-select js-->
    <script src="{{asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
@endpush
