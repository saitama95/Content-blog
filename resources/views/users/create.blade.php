@extends('layouts.app')

@section('content')

@if (count($errors)>0)
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger">{{$error}}</li>
        @endforeach
    </ul>
@endif
<div class="card">
    <div class="card-header text-success">
        <h5>Create User</h5>
    </div>
    <div class="card-body">
        <form action="{{route('users.store')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Add user</button>
            </div>
        </form>
    </div>
</div>
@endsection
