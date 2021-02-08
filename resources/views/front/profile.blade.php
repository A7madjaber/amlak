@extends('front.index',['title'=>'الصفحة الشخصية '])
@section('content')



    <div class="container">
        @include('front._errors ')

        <ol class="breadcrumb mt-5">
            <b class="font-weight-bold">المعلومات الشخصية</b>
        </ol>
        <div class="row">



            <div class="col-lg-12 col-md-12 mb-5">
                <div class="card mb">
                    <div class="card-body ">

                        <form class="parsley-style-2" id="selectForm2" autocomplete="off" name="selectForm2"
                              action="{{route('user.update',[$user->id])}}" method="POST">
                            @csrf

                            <div>
                                <div class="row mg-b-20">
                                    <div class="parsley-input col-md-6" id="fnWrapper">
                                        <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm mg-b-20" value="{{$user->name,old('name')}}"
                                               data-parsley-class-handler="#lnWrapper" name="name"  type="text">
                                    </div>

                                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                        <label>كلمة المرور القديمة: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                               name="old_password"  type="password">
                                    </div>

                                </div>

                            </div>

                            <div class="row mg-b-20">

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" value="{{$user->email,old('email')}}"
                                           data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                </div>

                                <input type="hidden" value="{{$user->admin}}" name="admin">
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label>  كلمة المرور الجديدة: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                           name="password" id="password"  type="password">
                                </div>
                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">

                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                           name="password_confirmation" id="password-confirm"  type="password">
                                </div>
                            </div>

                            <div class=" mt-3 text-right card-footer">
                                <button class="btn btn-warning mb" type="submit">تعديل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
