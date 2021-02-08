@extends('front.index',['title'=>'نتائج البحث'])
@section('content')



    <div class="container">

            @if (isset($array))
                @if (!empty($array))

                <ol class="breadcrumb mt-5">

                    @foreach($array as $key=>$value)
                        <li class="breadcrumb-item "><strong>{{searchFiled()[$key]}}

                                @if ($key=='type_id')
                                    <a class="btn btn-info btn-sm" href="{{url('/search?'.$key.'='.$value)}}"> {{type($value)['name']}}</a>
                                @else
                                    <a class="btn btn-info btn-sm" href="{{url('/search?'.$key.'='.$value)}}"> {{$value}}</a>
                                @endif


                            </strong></li>
                    @endforeach


                </ol>

                @endif
            @endif


            @if (count($buildings)>0)

                <div class="row" >
                    @foreach($buildings as $building)
                        <div class="col-md-3 mb-3">
                            <div class="card mb">
                                <img class="pic-1" src="{{asset('media/buildings/'.$building->name.'/'.$building->image_one)}}">
                                <div class="card-body mb">
                                    <h5 class="card-title text-primary" >${{$building->price}}</h5>
                                    <div class="text-black-50">{{$building->name}}</div>
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

                <div class="col-lg-12">
                    <ul class="pagination justify-content-center">
                        {{$buildings->render()}}

                    </ul>
                </div>

            @else
                    <div class="card-body align-content-center">
                    <h4 class="card-title font-weight-light">لا يوجد نتائج</h4>
                </div>
            @endif

    </div>

        @endsection
