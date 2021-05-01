@extends('layouts.forntend')

@section('content')
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Search results: {{ $query }}</h1>
    </div>
</div>
<div class="container">
    <div class="row medium-padding120">
    <div class="row">
            @foreach ($posts as $post)
                <div class="case-item-wrap">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="{{asset($post->features)}}" alt="our case">
                            </div>
                            <h6 class="case-item__title"><a href="{{route('single.post',['slug'=>$post->slug])}}">{{$post->title}}</a></h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection