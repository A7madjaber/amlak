@extends('admin.layouts.master',['title'=>'اعدادات الموقع'])
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.tagsinput.css')}}">


    <!--- Internal Select2 css-->
    <!---Internal Fileupload css-->
    <link href="{{ asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

@endpush

@section('content')

    <div class="mt-3 col-xl-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    <h5 class=" mg-b-0">اعدادات الموقع</h5>
                                    <br>
                                </div>

                                <form class="parsley-style-2" id="selectForm2" autocomplete="off" name="selectForm2"
                                      enctype="multipart/form-data"

                                      action="{{route('admin.setting.update',[$setting->id])}}" method="POST">
                                    @csrf

                                    <div class="pd-30 pd-sm-40">
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">اسم الموقع</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="name" value="{{$setting->name}}" type="text">
                                        </div>
                                    </div>


                                <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">العنوان</label>
                                        </div>
                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="address" value="{{$setting->address}}" >
                                        </div>
                                    </div>

                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">رقم الهاتف</label>
                                            </div>
                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                <input class="form-control" name="phone" value="{{$setting->phone}}" >
                                            </div>
                                        </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">البريد الالكتروني</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input class="form-control" name="email" type="email" value="{{$setting->email}}">
                                        </div>
                                    </div>

                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">الكلمات الدلالية</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <input name="tags" id="tags" class="form-control m-input" value="{{$setting->tags}}"
                                                   placeholder="الكلمات المفتاحية"/>
                                        </div>
                                    </div>


                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">الوصف</label>
                                        </div>

                                        <div class="col-md-8 mg-t-5 mg-md-t-0">
                                            <textarea class="form-control" name="description">{{$setting->description}}</textarea>
                                        </div>

                                    </div>

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-3">
                                        <label class="form-label mg-b-0">رابط الفيس بوك</label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="fb_url" value="{{$setting->fb_url}}" type="text">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-3">
                                        <label class="form-label mg-b-0">رابط التويتر</label>
                                    </div>

                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="tw_url" value="{{$setting->tw_url}}">
                                    </div>
                                </div>

                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-3">
                                        <label class="form-label mg-b-0">رابط اليوتيوب</label>
                                    </div>

                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                        <input class="form-control" name="you_url" value="{{$setting->you_url}}" >
                                    </div>

                                </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">الصورة الرئيسية  </label>
                                            </div>

                                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                <input type="file" name="image" data-default-file="{{asset('media/settings/'.$setting->image)}}" class="dropify">

                                            </div>

                                        </div>
                                    <div class="tx-left">
                                        <button class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5 ">تعديل</button>
                                    </div>
                            </div>
                                    <input type="hidden" name="old_image" value="{{$setting->image }}">

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


