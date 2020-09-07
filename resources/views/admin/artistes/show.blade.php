@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <img src="{{$artiste->image}}" alt="{{$artiste->name}}" height="60px" width="60px">
            <h3 class="float-right"><strong>{{$artiste->name}}</strong></h3>
        </div>

        <div class="card-body">
        <h4><strong>Albums</strong></h4>   
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Album name</th>
                    <th class="text-center" scope="col">Songs number</th>
                </tr>
            </thead>
            @if ($artiste->albums->count()===0)
                <h3>Coming soon ...</h3>
            @else
                <tbody>
                    @foreach ($artiste->albums as $album)
                        <tr>
                            <td><strong><a href="{{route('albums.show',$album->id)}}">{{$album->name}}</a></strong></td>
                            <td class="text-center">{{$album->songs->count()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>

        
        <h4><strong>Songs</strong></h4>   
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Song name</th>
                    <th class="text-center" scope="col">Album name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artiste->albums as $album)
                    @foreach ($album->songs as $song)
                        <tr>
                            <td><strong><a href="{{route('songs.show',$song->id)}}">{{$song->name}}</a></strong></td>
                            <td class="text-center"><a href="{{route('albums.show',$song->album->id)}}">{{$song->album->name}}</a></td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

            
        </div>
    </div>

</div>
@endsection