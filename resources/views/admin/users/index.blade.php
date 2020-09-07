@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            All Users
        </div>

        <div class="card-body">
            <table id="table" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Role</th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><strong>{{$user->name}}</strong></td>
                            <td class="text-center"><strong>{{$user->email}}</strong></td>
                            @if ($user->isadmin())
                                <td  class="text-center" scope="col"><strong>Admin</strong></td>
                            @else
                               <td  class="text-center" scope="col"></td> 
                            @endif
                            <td class="d-flex justify-content-center">
                                <a href="{{route('users.modify',$user->id)}}" class="btn btn-success mr-2">@if(!$user->isadmin())
                                    Make Admin
                                @else
                                    Remove Admin    
                                @endif</a>
                                <form action="{{route('users.destroy',$user->id)}}" method="POST">
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