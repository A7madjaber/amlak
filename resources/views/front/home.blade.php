@extends('front.index',['title'=>'الرئيسية'])
@section('content')


    @push('css')
        <style>

            a {
                text-decoration: none !important;
            }
            .banner  {
                background-image: url("{{ asset('media/settings/'.settings()->image) }}")

            } .highlight-info  {
                  background-image: url("{{ asset('media/settings/'.settings()->image_two) }}")
              }
        </style>

        <link rel="stylesheet" href="{{asset('front/main/css/reset.css')}}"> <!-- Resource style -->
        <script src="{{asset('front/main/js/modernizr.js')}}"></script> <!-- Modernizr -->


    @endpush

    <div class="banner text-center">
        <div class="container">
            <div class="banner-info">
                <h1 class="mb-5" style="text-shadow: -3px 4px 2px rgba(255,255,255,0.6); margin-top: -25px;
 color: #0c0c0c">أهلا بك في {{settings()->name}}</h1>

                            <form method="GET" action="{{route('search.deep')}}" >
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <input type="number" placeholder="المساحة" name="square" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="number" placeholder="الغرف" name="roms" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select id="inputState" name="rent" class="form-control">
                                                <option disabled selected>نوع العرض</option>
                                                <option name="تمليك">تمليك</option>
                                                <option name="ايجار">ايجار</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <select name="type_id" id="inputState" class="form-control">
                                            <option disabled selected>نوع العقار</option>
                                            @foreach(types() as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <input type="text" placeholder="المنطقة" name="address" class="form-control" >
                                        </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" placeholder="السعر من" name="min" class="form-control">
                                            </div>
                                               <div class="form-group col-md-4">

                                                <input type="number" placeholder="السعر الى" name="max" class="form-control">
                                        </div>
                                        <div class="form-group col-md-1">

                                                <button  type="submit" class="btn btn-primary">بحث</button>

                                    </div>
                                    <input type="hidden" name="status" class="form-control" value="1">


                                    </div>
                                </form>

                <div class="m-5"> <a class="banner_btn" href="{{route('buildings.create')}}">اضف عقارك</a> </div>



            </div>

        </div>
    </div>




    <div class="container">

        <h3 class="mt-5 text-center"><b>أخر العروض</b></h3>
            <ul class="cd-items cd-container">


            @foreach(buildings()->take(8) as $building)
                <li class="cd-item effect8" >
                    <img src="{{asset('media/buildings/'.$building->name.'/'.$building->image_one)}}" alt="{{$building->name}}" title="{{$building->name}}">
                    <a href="#" data-id="{{$building->id}}" title="{{$building->name}}" class="cd-trigger">نبذة سريعة</a>
                </li>


                @endforeach
                    <div class="text-center">
                        <a class="banner_btn m-3 text-center " href="{{route('buildings.all')}}">التفاصيل</a>

                    </div>
            </ul> <!-- cd-items -->



    </div>

            <div class="cd-quick-view">
                <div class="cd-slider-wrapper">
                    <ul class="cd-slider">
                        <li class="selected"><img src="" class="imagebox1" ></li>
                        <li><img src="" class="imagebox2"></li>
                        <li><img src="" class="imagebox3"></li>
                    </ul> <!-- cd-slider -->

                    <ul class="cd-slider-navigation">
                        <li><a class="cd-next" href="#0">Prev</a></li>
                        <li><a class="cd-prev" href="#0">Next</a></li>
                    </ul> <!-- cd-slider-navigation -->
                </div> <!-- cd-slider-wrapper -->

                <div class="cd-item-info">

                    <h2 class="titlebox"></h2>
                    <p class="discbox"></p>
                    <ul class="cd-item-action">
                        <li><a href="" class="pricebox btn btn-outline-primary btn-sm"></a></li>
                        <li><a href="" class="morbox btn btn-outline-primary btn-sm">اقرأ المزيد</a></li>
                    </ul> <!-- cd-item-action -->
                </div> <!-- cd-item-info -->
                <a href="#0" class="cd-close">Close</a>

            </div> <!-- cd-quick-view -->

</div>

@push('js')
    <script>
        function urlHome(){
            return '{{route('home')}}'
        }

    </script>
    <script src="{{asset('front/main/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('front/main/js/velocity.min.js')}}"></script>
    <script src="{{asset('front/main/js/main.js')}}"></script> <!-- Resource jQuery -->
@endpush

@endsection
