@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit song</div>

        <div class="card-body">
            <form action="{{route('songs.update',$song->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$song->name}}">
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="text" name="image" class="form-control" value="{{$song->image}}">
                </div>
                <div class="form-group">
                    <label for="">Artiste</label>
                    <select name="artiste_id" class="form-control">
                        <option value=""></option>
                        @foreach ($artistes as $artiste)
                            <option value="{{$artiste->id}}" @if ($song->artiste->id===$artiste->id)
                                selected
                            @endif>{{$artiste->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>lyrics</label>
                    <input id="lyrics" name="lyrics" type="hidden" value="{{$song->lyrics}}">
                    <trix-editor input="lyrics"></trix-editor>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script>
        // function setAlbums(){
        //     const album=document.getElementById('albums').value="reset";
        //     const artiste=document.getElementById('artiste').value;
        //     clearAlbums(artiste)
        //     const getalbums=document.getElementsByClassName(artiste)
        //     const albums=Object.values(getalbums)
        //     albums.forEach((item)=>{
        //         if(item.style.display==="none"){
        //             item.style.display="flex"
        //         }else if(item.style.display==="flex"){
        //             item.style.display="none"
        //         }
        //     })
        // }
        // function clearAlbums(artiste){
        //     const getallalbums=document.getElementsByClassName('op')
        //     const albums=Object.values(getallalbums)
        //     albums.forEach((item)=>{
        //         if(item.className!==artiste){
        //             item.style.display="none"
        //         }
        //     })
        // }
    </script>
@endsection
