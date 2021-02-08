@extends('admin.layouts.master',['title'=>'لوحة التحكم'])
@push('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endpush


@section('content')
    <br>
    <!-- row -->
    <div class="card">
        <div class="card-header bg-transparent ">
    <div class="row row-sm">

        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-primary-gradient text-white ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-users tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">المستخدمين</span>
                                <h2 class="text-white mb-0">{{count(\App\User::all())}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-danger-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fa fa-building tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">عقارات غير مفعلة</span>
                                <h2 class="text-white mb-0">{{count(\App\Building::where('status',0)->get())}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-success-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fa fa-university tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">عقارات مفعلة</span>
                                <h2 class="text-white mb-0">{{count(\App\Building::where('status',1)->get())}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-warning-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-message-circle tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">الرسائل</span>
                                <h2 class="text-white mb-0">{{count(\App\Message::all())}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">أخر الأعضاء المسجلين في الموقع</label>
                <span class="d-block mg-b-20 text-muted tx-12"></span>
                <div class="">

                    <div class="vmap-wrapper ht-180">
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <ul class="list-group wd-md-100p users-list-group">

                                        @foreach($users as $user)
                                            <li class="list-group-item d-flex align-items-center">
                                                <div>
                                                    <h6 class="tx-15 mb-1 tx-inverse tx-semibold mg-b-0">{{$user->name}}</h6>
                                                    <span class="d-block tx-13 text-muted">{{$user->created_at->diffforhumans()}}</span>
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

        <div class="col-lg-12 col-xl-7">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">أخر العقارات المضافة</label>
                <span class="d-block mg-b-20 text-muted tx-12"></span>

                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab4">
                                    <ul class="list-group wd-md-100p users-list-group">

                                        @foreach($buildings as $building)
                                            <li class="list-group-item d-flex align-items-center">
                                                <div>
                                                    <h6 class="tx-15 mb-1 tx-inverse tx-semibold mg-b-0">{{$building->name}}</h6>
                                                    <span class="d-block tx-13 text-muted">{{$building  ->created_at->diffforhumans()}}</span>
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


    <!-- row closed -->




    <!-- row opened -->



    @push('js')
        <!--Internal  Chart.bundle js -->
        <script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    @endpush

@endsection
