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
        <h3>Create New Post</h3>
    </div>
    <div class="card-body">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="">Feature Image</label>
                <input type="file" onchange="previewFile()" class="form-control" name="feature">
                <img src="" id="image_id" width="100px" /> 
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="" cols="5" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Select Category</label>
                <select name="category_id" id="" class="form-control">
                    <option value="disabled">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="">Tags</label>
            @foreach ($tags as $tag)
                <div class="checkbox">
                    <label><input type="checkbox" name="tag[]" value="{{$tag->id}}"> {{ $tag->tag }}</label>
                </div>
                @endforeach
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
