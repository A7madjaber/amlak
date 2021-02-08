@extends('front.index',['title'=>$building->name])
@section('content')
   @push('css')

       <style>

           * {
               box-sizing: border-box;
           }

           img {
               vertical-align: middle;
           }

           /* Position the image container (needed to position the left and right arrows) */
           .container {
               position: relative;
           }

           /* Hide the images by default */
           .mySlides {
               display: none;
           }

           /* Add a pointer when hovering over the thumbnail images */
           .cursor {
               cursor: pointer;
           }

           /* Next & previous buttons */
           .prev,
           .next {
               cursor: pointer;
               position: absolute;
               top: 40%;
               width: auto;
               padding: 16px;
               margin-top: -50px;
               color: white;
               font-weight: bold;
               font-size: 20px;
               border-radius: 0 3px 3px 0;
               user-select: none;
               -webkit-user-select: none;
           }

           /* Position the "next button" to the right */
           .next {
               right: 0;
               border-radius: 3px 0 0 3px;
           }

           /* On hover, add a black background color with a little bit see-through */
           .prev:hover,
           .next:hover {
               background-color: rgba(0, 0, 0, 0.8);
           }

           /* Number text (1/3 etc) */
           .numbertext {
               color: #f2f2f2;
               font-size: 12px;
               padding: 8px 12px;
               position: absolute;
               top: 0;
           }

           /* Container for image text */
           .caption-container {
               text-align: center;
               background-color: #222;
               padding: 2px 16px;
               color: white;
           }

           .row:after {
               content: "";
               display: table;
               clear: both;
           }

           /* Six columns side by side */
           .column {
               float: left;
               width: 16.66%;
           }

           /* Add a transparency effect for thumnbail images */
           .demo {
               opacity: 0.6;
           }

           .active,
           .demo:hover {
               opacity: 1;
           }
       </style>
   @endpush

    <div class="container">

    <div class="row">

            <div class="m-5 pull-right">

                <h1 style="color: dimgray">{{$building->name}}</h1>
                        <hr>
                        <div class="btn-group" role="group" aria-label="Basic example">
                              <a href ="{{url('search/?type_id='.$building->type->id)}}" class="btn btn-outline-secondary">نوع العقار : {{$building->type->name}}</a>
                              <a href ="{{url('search/?rent='.$building->rent)}}" class="btn btn-outline-secondary">نوع العملية : {{$building->rent}}</a>
                              <a href ="{{url('search/?price='.$building->price)}}" class="btn btn-outline-secondary">السعر :{{$building->price}}</a>
                              <a href ="{{url('search/?square='.$building->square)}}" class="btn btn-outline-secondary">المساحة : {{$building->square}}</a>
                              <a href ="{{url('search/?address='.$building->address)}}" class="btn btn-outline-secondary">المنطقة : {{$building->address}}</a>
                              <a href ="{{url('search/?roms='.$building->roms)}}" class="btn btn-outline-secondary">الغرف : {{$building->roms}}</a>

                            <!-- Go to www.addthis.com/dashboard to customize your tools -->

                        </div>
                        <hr>

                {{$building->description}}
                <hr>
                <h4>
                صور <b>{{$building->name}}</b></h4>

                <div id="carouselExampleIndicators" class="carousel slide  " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner img-thumbnail ">
                        <div class="carousel-item active">
                            <img class="d-block w-100 img-thumbnail pt-4 pb-4" src="{{asset('media/buildings/'.$building->name.'/'.$building->image_one)}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 img-thumbnail pt-4 pb-4"  src="{{asset('media/buildings/'.$building->name.'/'.$building->image_two)}}"  alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 img-thumbnail pt-4 pb-4" src="{{asset('media/buildings/'.$building->name.'/'.$building->image_three)}}"  alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <hr>  <h4>
                    عقارات <b>{{$building->rent}}</b></h4>


                <div class="container">

                    <div class="row">

                        <div class="container">

                            <div class="row">


                @foreach($buildings as $building)
                                    <div class="col-md-3 mb-3">
                                        <div class="card mb">
                                            <img class="pic-1" src="{{asset('media/buildings/'.$building->name.'/'.$building->image_one)}}">
                                            <div class="card-body mb">
                                                <h5 class="card-title text-primary" >${{$building->price}}</h5>
                                                <div class="text-black-50">{{$building->name}}</div>
                                                <div class="text-black-50">{{$building->type->name}}</div>
                                                <div class="text-black-50">  غرف:{{$building->roms}} </div>
                                                <div class="text-black-50">  العنوان:{{$building->address}} </div>
                                            </div>

                                            <div class="card-footer">
                                                <a href="{{route('building.details',$building->id)}}"  class=" btn btn-primary mb"> التفاصيل </a>

                                            </div>
                                        </div>
                                    </div>

                @endforeach




            </div>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


@push('js')


    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
@endpush

@endsection
