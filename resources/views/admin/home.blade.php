@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>@if (auth()->user()->isadmin())
            Your logged as an admin // just for test
        @endif</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-header text-center"><h3><strong>Users</strong></h3></div>
                <div class="card-body text-center"><h3>{{$users->count()}}</h3></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white">
                <div class="card-header text-center"><h3><strong>Categories</strong></h3></div>
                <div class="card-body text-center"><h3>{{$categories->count()}}</h3></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-header text-center"><h3><strong>Aristes</strong></h3></div>
                <div class="card-body text-center"><h3>{{$artistes->count()}}</h3></div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white">
                <div class="card-header text-center"><h3><strong>Songs</strong></h3></div>
                <div class="card-body text-center"><h3>{{$songs->count()}}</h3></div>
            </div>
        </div>
    </div>
</div>
@endsection
