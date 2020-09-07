@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            All Categories
            <a href="{{route('categories.create')}}" class="float-right btn btn-primary">Add categories</a>
        </div>

        <div class="card-body">
            <table id="table" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-center" scope="col">Artistes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><strong><a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a></strong></td>
                            <td class="text-center"><strong>{{$category->artistes->count()}}</strong></td>
                            <td class="d-flex justify-content-center">
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success mr-2">edit</a>
                                <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection