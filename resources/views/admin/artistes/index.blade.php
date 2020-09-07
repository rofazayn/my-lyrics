@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            All Artistes
            <a href="{{route('artistes.create')}}" class="float-right btn btn-primary">Add artiste</a>
        </div>

        <div class="card-body">
            @if ($artistes->count()===0)
                <h3>Coming soon ...</h3>
            @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-center" scope="col">Songs count</th>
                        <th  class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artistes as $artiste)
                        <tr>
                            <td><strong><a href="{{route('artistes.show',$artiste->id)}}">{{$artiste->name}}</a></strong></td>
                            <td class="text-center"><strong>{{$artiste->songs->count()}}</strong></td>
                            <td class="d-flex justify-content-center">
                                <a href="{{route('artistes.edit',$artiste->id)}}" class="btn btn-success mr-2">edit</a>
                                <form action="{{route('artistes.destroy',$artiste->id)}}" method="POST">
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
