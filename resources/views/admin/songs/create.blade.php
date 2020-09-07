@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add new song</div>

        <div class="card-body">
            <form action="{{route('songs.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="text" name="image" class="form-control" value="{{old('image')}}">
                </div>
                <div class="form-group">
                    <label for="">Artiste</label>
                    <select name="artiste_id" class="form-control" onchange="setAlbums()">
                        <option value=""></option>
                        @foreach ($artistes as $artiste)
                            <option value="{{$artiste->id}}">{{$artiste->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>lyrics</label>
                    <input id="lyrics" name="lyrics" type="hidden">
                    <trix-editor input="lyrics"></trix-editor>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    {{-- <script>
        function setAlbums(){
            const album=document.getElementById('albums').value="reset";
            const artiste=document.getElementById('artiste').value;
            clearAlbums(artiste)
            const getalbums=document.getElementsByClassName(artiste)
            const albums=Object.values(getalbums)
            albums.forEach((item)=>{
                if(item.style.display==="none"){
                    item.style.display="flex"
                }else if(item.style.display==="flex"){
                    item.style.display="none"
                }
            })
        }
        function clearAlbums(artiste){
            const getallalbums=document.getElementsByClassName('op')
            const albums=Object.values(getallalbums)
            albums.forEach((item)=>{
                if(item.className!==artiste){
                    item.style.display="none"
                }
            })
        }
    </script> --}}
@endsection
