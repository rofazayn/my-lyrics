@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edite category</div>

        <div class="card-body">
            <form action="{{route('categories.update',$category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
