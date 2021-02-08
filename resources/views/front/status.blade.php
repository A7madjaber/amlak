@extends('front.index',['title'=>$building->name])
@section('content')


    <div class="container">


        <div class="alert alert-danger">
            <h4>{{$message}}   {{$building->name}}     </h4>
        </div>


                <hr>
    </div>

@endsection
