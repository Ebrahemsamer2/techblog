@extends('layouts.app')

@section('content')

@include('includes.nav')

@include('includes.header')


<div class="container home-container">
    <div class="row">
        <div class="col-md-8">
            <div class="posts-container">
                
                @foreach($posts as $post)

                    <div class="post">

                        <h2><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>
                        <div class="post-info">
                            <span><i class="fa fa-user"></i> {{ $post->user->name }}</span>
                            <span><i class="fa fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</span>
                            <span><i class="fa fa-comment"></i> {{ count($post->comments) }} Comment</span>
                        </div>

                        <div class="post-thumbnail">
                            <img class="post-image img-fluid" src="{{ $post->photo->path }}" >
                        </div>
                        <div class="post-content">
                            <p class="lead">{{ $post->home_content }}</p>
                            <a class="btn btn-info" href="/post/{{ $post->slug }}">Read More</a>
                        </div>

                    </div>

                @endforeach

            </div>
        </div>
        <div class="col-md">
                
            <div class="sidebar">
                
                <div class="side-header">
                    <p class="lead">Features</p>
                </div>

                <div class="side-body">
                    
                    @foreach($posts as $post) 
                        @if($loop->iteration < 6)
                        <div class="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="/post/{{ $post->slug }}"><img width="80" class="side-post-image img-fluid" src="{{ $post->photo->path }}" /></a>
                                </div>
                                <div class="col-md">
                                    <h6><a href="/post/{{ $post->slug }}">{{ Str::limit($post->title, 40) }}</a></h6>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>

            </div>

            <div class="top-five-cats">
                <div class="side-header">
                    <p class="lead">Top Categories</p>
                </div>

                <div class="side-body">
                    
                    @foreach($categories as $cat) 
                        @if($loop->iteration < 6)
                        <div class="cat">
                            <div class="">
                                <h6><a href="/categories/{{ $cat->slug }}">{{ $cat->name }}</a></h6>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 pagination">
            {{ $posts->render() }}
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection
