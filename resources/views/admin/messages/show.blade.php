@extends('admin.layouts.master',['title'=>'الرسائل '])
@push('css')


    <!--Internal  Quill css -->
    <link href="{{asset('assets/plugins/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/quill/quill.bubble.css')}}" rel="stylesheet">

@endpush


@section('content')
    <br>
    @include('admin.layouts.errors')


    <div class="mt-3 col-xl-12">
        <div class="card mg-b-20">

            <div class="card-header pb-0">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> <span class="badge badge-primary">موضوع الرسالة </span> {{$message->subject}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="email-media">
                                <div class="mt-0 d-sm-flex">
                                    <img class="ml-2 rounded-circle avatar-xl" src="{{asset('media/mail.png')}}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-left d-none d-md-flex fs-15">
                                            <span class="mr-3">{{$message->created_at->diffforhumans()}}</span>
                                        </div>

                                        <div class="media-title  font-weight-bold mt-3">{{$message->name}} </div>
                                        <p class="mb-0">{{$message->email}} </p>
                                       <hr>
                                    </div>

                                </div>
                            </div>
                            <div class="eamil-body mt-5">

                                <p>{{$message->message}}</p>

                                    <div  class="flex-1 bg-gray-100 " style="height:150px" id="quillEditorModal">

                                    </div>

                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <a class="btn btn-primary mt-1 mb-1" href="#"><i class="fa fa-reply"></i> ارسال الرد</a>
                        </div>
                    </div>
                </div>

            </div>

    @push('js')


                <script src="{{asset('assets/plugins/quill/quill.min.js')}}"></script>
                <!-- Internal Form-editor js -->
                <script src="{{asset('assets/js/form-editor.js')}}"></script>

    @endpush


@endsection


