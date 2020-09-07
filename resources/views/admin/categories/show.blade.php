@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{$category->name}}</h3>
        </div>

        <div class="card-body">
            <table id="table" class="table">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th class="text-center" scope="col">Albums count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($category->artistes as $artiste)
                            <tr>
                                <td><strong><a href="{{route('artistes.show',$artiste->id)}}">{{$artiste->name}}</a></strong></td>
                                <td class="text-center"><strong>{{$artiste->albums->count()}}</strong></td>
                            </tr>
                        @empty
                            <tr>
                                <td><h2>Coming soon ..</h2></td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>
            </table>
        </div>
    </div>
</div>
@endsection