@extends('front.index',['title'=>'جميع عقاراتي '])
@section('content')



    <div class="container">
        <ol class="breadcrumb mt-5">
            <li>
                <b class="font-weight-bold">جميع عقاراتك</b>

            </li>
            <li>
                <b class="font-weight-bold"><a href="{{route('buildings.create')}}">اضف عقار</a></b>

            </li>
        </ol>
        <div class="row">


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
                                        <div class="card-footer mb ">

                                        @if ($building->status ==0)
                                                <button  disabled  class="  btn btn-success mb">  انتظار الموافقة  </button>
                                                <a href="{{route('building.edit',$building->id)}}"  class=" btn btn-warning mb"> تعديل </a>

                                            @else
                                                <a href="{{route('building.details',$building->id)}}" class=" btn btn-primary mb"> التفاصيل </a>

                                            @endif
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
@endsection
