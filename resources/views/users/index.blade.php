@extends('layouts.app')

@section('content')
<table class="table table-hover">
    <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Premission</th>
        <th>Delete</th>
    </thead>

    <tbody>
        @if (count($users)>0)
        @foreach ($users as $user)
            <tr>
                <td><img src="{{asset($user->profile->avatar)}}" alt="" width="50px"></td>
                <td>{{$user->name}}</td>
                <td>
                    @if ($user->admin)
                        <a href="{{route('users.not_admin',['id'=>$user->id])}}" class="btn btn-sm btn-danger">Remove Permission</a>
                    @else
                        <a href="{{route('users.admin',['id'=>$user->id])}}" class="btn btn-sm btn-success">Make admin</a>
                    @endif
                </td>
                <td>
                    @if (Auth::id()!==$user->id)
                        <a href="{{route('users.destroy',['id'=>$user->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    @endif
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">No data found</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection
