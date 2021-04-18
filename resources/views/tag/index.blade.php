@extends('layouts.app')

@section('content')
<table class="table table-hover">
    <thead>
        <th>Tag Name</th>
        <th>Editing</th>
        <th>Deleting</th>
    </thead>

    <tbody>
        @foreach ($tags as $tag)
            <tr>
                <td>{{$tag->tag}}</td>
                <td><a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-success">Edit</a></td>
                <td><a href="{{route('tag.destroy',['id'=>$tag->id])}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
