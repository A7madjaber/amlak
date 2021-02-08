@extends('admin.layouts.master',['title'=>'عقار جديد'])
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.tagsinput.css')}}">


    <!--- Internal Select2 css-->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

@endpush

@section('content')
    <br>

    @include('admin.layouts.errors ')


    <div class="mt-3 col-xl-12">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                <h5 class=" mg-b-0">اضافة عقار جديد</h5>
                                <hr>
                            </div>

                            <form method="post" action="{{route('building.store')}}" enctype="multipart/form-data">



                                @csrf

                                <div class="pd-30 pd-sm-40">
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">اسم العقار</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="name" value="{{old('name')}}" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">عنوان او مكان العقار</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="address" value="{{old('address')}}" type="text">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">نوع العقار</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select name="type_id"  class="form-control nice-select custom-select">
                                                <option disabled selected>اختر نوع العقار</option>

                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">نوع العرض</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <select name="rent"  class="form-control nice-select custom-select">
                                                <option disabled selected>اختر نوع العرض</option>
                                                    <option value="للبيع">تمليك</option>
                                                    <option value="للايجار">ايجار</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">عدد الغرف</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="roms" type="number" value="{{old('roms')}}" >
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">المساحة</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="square" type="number" value="{{old('square')}}" >
                                        </div>
                                    </div>



                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">الكلمات المفتاحية</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input name="tags" id="tags" class="form-control m-input" value="{{old('tags')}}"
                                                    placeholder="الكلمات المفتاحية"/>
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">الوصف</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <textarea class="form-control" rows="4" name="description">{{old('description')}}</textarea>
                                        </div>

                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">وصف صغير</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" value="{{old('sm_description')}}" placeholder="ادخل وصف صغير 160 حرف  على الاكثر" name="sm_description">
                                        </div>

                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">السعر</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="price" type="number" value="{{old('price')}}" >
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">الصور</label>
                                        </div>


                                        <div class="col-md-3 mg-t-5 mg-md-t-0">

                                            <input type="file" name="image_one" class="dropify">
                                            <label class="m-1">الصورة الرئيسية (<b style="color: red">مطلوبة</b>)</label>
                                        </div>




                                        <div class="col-md-3 mg-t-5 mg-md-t-0">
                                            <input type="file" name="image_two" class="dropify">
                                            <label class="m-1">الصورة الثانية</label>

                                        </div>




                                        <div class="col-md-3 mg-t-5 mg-md-t-0">
                                            <input type="file"  name="image_three" class="dropify">
                                            <label class="m-1">الصورة الثالثة</label>

                                        </div>
                                    </div>


                                    <div class="tx-left">
                                        <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5 ">اضافة</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @push('js')



                <!-- Internal Select2 js-->
                <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
                <!--Internal Fileuploads js-->
                <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
                <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
                <!--Internal Fancy uploader js-->
                <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
                <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
                <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
                <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
                <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
                <!--Internal  Form-elements js-->
                <script src="{{ asset('assets/js/advanced-form-elements.js') }}"></script>
                <script src="{{ asset('assets/js/select2.js') }}"></script>
                <!--Internal Sumoselect js-->
                <script src="{{ asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
                <!--Internal  Daepicker js -->
                <script src="{{ asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
                <!--Internal  jquery.maskedinput js -->
                <script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
                <!--Internal  spectrum-colorpicker js -->
                <script src="{{ asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
                <!-- Internal form-elements js -->
                <script src="{{ asset('assets/js/form-elements.js') }}"></script>

                    <script src="{{asset('assets/js/jquery.tagsinput.js')}}"></script>


                    <script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>

                    <script src="{{asset('assets/js/jasny.js')}}"></script>
                    <script>

                jQuery(document).ready(function () {
                    jQuery('#tags').tagsInput({
                        width: 'auto',
                        defaultText: 'اضف '
                    });
                });
            </script>



    @endpush

@endsection


