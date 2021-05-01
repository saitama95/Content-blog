@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-lg-3" style="margin-bottom:10px">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        Post
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">
                            {{$post->count()}}
                        </h1>
                    </div>
                </div>
           </div>
           <div class="col-lg-3" style="margin-bottom:10px">
                <div class="card">
                    <div class="card-header text-center bg-danger">
                        Trashed Post
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">
                            {{$tarshed_post}}
                        </h1>
                    </div>
                </div>
           </div>
           <div class="col-lg-3" style="margin-bottom:10px">
                <div class="card">
                    <div class="card-header text-center bg-light">
                        User
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">
                            {{$user->count()}}
                        </h1>
                    </div>
                </div>
           </div>
           <div class="col-lg-3" style="margin-bottom:10px">
                <div class="card">
                    <div class="card-header text-center bg-secondary ">
                        Category
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">
                            {{$category->count()}}
                        </h1>
                    </div>
                </div>
           </div>
           <div class="col-lg-3" style="margin-bottom:10px">
                <div class="card">
                    <div class="card-header text-center bg-success">
                        Tags
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">
                            {{$tag->count()}}
                        </h1>
                    </div>
                </div>
           </div>
    </div>
@endsection
