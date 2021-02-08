@extends('front.index',['title'=>'اتصل بنا'])
@section('content')

<div class="about">
    <div class="container text-center">
        <section class="title-section">
            <h1 class="title-header ">اتصل بنا</h1>
        </section>
    </div>
</div>
<div class="container">


<div class="contact">
    <div class="container">
        <div class="row contact_top">

            <div class="col-md-4 contact_details">
                <div class="contact_address">
                    <h5><i class="fa fa-location-arrow fa-lg"></i>
                        {{settings()->address}}</h5><br>
                </div>
            </div>
            <div class="col-md-4 contact_details">
                <div class="contact_address">
                   <h5><i class="fa fa-phone fa-lg"></i>
                    {{settings()->phone}}</h5><br>
                </div>
            </div>

            <div class="col-md-4 contact_details">
                <div class="contact_address">
                    <h5><i class="fa fa-inbox fa-lg"></i>
                        {{settings()->email}}</h5><br>
                </div>
            </div>
        </div>

        <div class="contact_bottom">

            <form method="post" action="{{route('send.message')}}">
                @csrf
                <div class="contact-to">
                    <input type="text" class="text"  name="subject" placeholder="موضوع الرسالة" required>
                    <input type="text" class="text" name="email" value="{{ \Illuminate\Support\Facades\Auth::user() ?
\Illuminate\Support\Facades\Auth::user()->email : '' }}" placeholder="بريدك الالكتروني" style="margin-left: 10px"required>
                    <input type="text" class="text" value="{{ \Illuminate\Support\Facades\Auth::user() ?
\Illuminate\Support\Facades\Auth::user()->name : '' }}" name="name" placeholder="الاسم" style="margin-left: 10px"required>
                </div>
                <div class="text2">
                    <textarea required name="message" >الرسالة..</textarea>
                </div>
                <div class="float-right"><button type="submit" class="submit">ارسال</button></div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
