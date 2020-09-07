@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add new category</div>

        <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
