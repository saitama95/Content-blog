@extends('layouts.app')

@section('content')

@if (count($errors)>0)
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger">{{$error}}</li>
        @endforeach
    </ul>
@endif
<div class="panel panel-default">
    <div class="panel-heading text-success">
        <h2>Edit Tag</h2>
    </div>
    <div class="panel-body">
        <form action="{{route('tag.update',['id'=>$id])}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Tag Name</label>
                <input type="text" class="form-control" name="tag" value="{{$id->tag}}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Update Tag</button>
            </div>
        </form>
    </div>
</div>
@endsection
