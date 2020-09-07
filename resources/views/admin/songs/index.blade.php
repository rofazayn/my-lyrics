@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            All Songs
            <a href="{{route('songs.create')}}" class="float-right btn btn-primary">Add songs</a>
        </div>

        <div class="card-body">
            @if ($songs->count()===0)
                <h3>Coming soon ...</h3>
            @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Artiste</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($songs as $song)
                        <tr>
                            <td><strong><a href="{{route('songs.show',$song->id)}}">{{$song->name}}</a></strong></td>
                            <td><strong><a href="{{route('artistes.show',$song->artiste->id)}}">{{$song->artiste->name}}</a></strong></td>
                            <td class="d-flex justify-content-center">
                                <a href="{{route('songs.edit',$song->id)}}" class="btn btn-success mr-2">edit</a>
                                <form action="{{route('songs.destroy',$song->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif       
        </div>
    </div>
</div>
@endsection

