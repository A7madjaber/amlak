@extends('front.index',['title'=>'جميع العقارات '])
@section('content')



    <div class="container">
    <ol class="breadcrumb mt-5">
        <b class="font-weight-bold">جميع العقارات</b>
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

                                    <div class="card-footer">
                                        <a href="{{route('building.details',$building->id)}}"  class=" btn btn-primary mb"> المزيد </a>

                                    </div>
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>


                <div class="col-lg-12">
                    <ul class="pagination justify-content-center">
                        {{$buildings->render()}}

                    </ul>
                </div>

    </div>
        @endsection
