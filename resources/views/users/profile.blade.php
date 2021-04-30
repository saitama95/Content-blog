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
        <h5>My Profile</h5>
    </div>
    <div class="card-body">
        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="title">New Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="title">Facebook</label>
                <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}">
            </div>
            <div class="form-group">
                <label for="title">Youtube</label>
                <input type="text" class="form-control" name="youtube" value="{{$user->profile->youtube}}">
            </div>
            <div class="form-group">
                <label for="">User Image</label>
                <input type="file" onchange="previewFile()" class="form-control" name="avatar">
                <img src="{{asset($user->profile->avatar)}}" id="image_id" width="100px" /> 
            </div>
            <div class="form-group">
                <label for="">About</label>
                <textarea name="about" id="" cols="5" rows="3" class="form-control">{{$user->profile->about}}"</textarea>
            </div>
         
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
