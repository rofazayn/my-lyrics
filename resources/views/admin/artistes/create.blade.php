@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add new artiste</div>

        <div class="card-body">
            <form action="{{route('artistes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="text" name="image" class="form-control" value="{{old('image')}}">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
