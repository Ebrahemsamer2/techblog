@extends('layouts.user_layout')

@section('title', 'Posts Category | TechBlog')

 @section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="posts">
                        @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="post">
                                <div class="post-image">
                                    <a href="/post/{{ $post->slug }}">
                                        @if($post->photo)
                                            <img class="img-fluid" src="{{ asset('/images/' . $post->photo->filename)}}">
                                        @else
                                            <img class="img-fluid" src="{{ asset('/images/post.jpg')}}">
                                        @endif
                                    </a>
                                </div>
                                <div class="post-title">
                                    <a title="{{ $post->slug }}" href="/post/{{ $post->slug }}">
                                        <h5>{{ $post->title }}</h5>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <p class="lead text-center"> 
                                        <span><i class="fa fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</span><span><i class="fa fa-user"></i> {{ $post->user->name }}</span>
                                        <span>
                                            @if(count($post->comments) > 0)
                                            <i class="fa fa-comments"></i> {{ count($post->comments) }} Comment
                                            @else
                                            No Comments
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="post-content">
                                    <p class="lead">{{ Str::limit($post->content,200) }}</p>
                                    <a href="/post/{{ $post->slug }}" class="btn btn-default">Read More</a>
                                </div>
                            </div>
                        @endforeach
                        @else

                            <div class="no-posts">
                                <p class="lead">Sorry, No Posts in this Category</p>
                            </div>

                        @endif
                    </div>
                </div>
                <div class="col-sm">
                    @include('includes.sidebar')

                </div>
            </div>
        </div>
    @endsection