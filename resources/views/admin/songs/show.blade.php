@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex">
            <h2>{{$song->name}}</h2>
            <h5 style="margin-left: 500px"><a href="{{route('artistes.show',$song->album->artiste->id)}}">{{$song->album->artiste->name}}</a></h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col col-md-4 d-flex justify-content-center">
                    <img src="{{$song->image}}" alt="{{$song->name}}" height="200px" width="200px">
                </div>
                <div class="col col-md-8 text-center">
                    <p>{!!$song->lyrics!!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection