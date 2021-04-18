@extends('layouts.app')

@section('content')
<table class="table table-hover">
    <thead>
        <th>Title</th>
        <th>Content</th>
        <th>Features</th>
        <th>Editing</th>
        <th>Deleting</th>
    </thead>

    <tbody>
        @if (count($posts)>0)
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td><img src="{{asset($post->features)}}" alt="" width="50px"></td>
                <td><a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-danger">Delete</a></td>
                <td><a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success">Restore</a></td>
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
