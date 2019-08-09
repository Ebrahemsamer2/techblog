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
            <!-- Search Form -->

        </div>
    </div>
</div>
@endsection
