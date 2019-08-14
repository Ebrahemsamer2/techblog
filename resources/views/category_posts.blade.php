@extends('layouts.user_layout')

@section('title', 'Posts Category | TechBlog')

@section('header')

    <div class="header">
        
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/"><span>T</span>echBlog
                    <img src="{{ asset('/images/right.svg') }}" class="rounded-circle" height="40" width="40" >
                </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="#">Categories</a>
                  </li>
                  <li class="nav-item {{ Request::is('/contact') ? 'active' : '' }}">
                    <a class="nav-link" href="contact">Contact</a>
                  </li>
                  <li class="nav-item {{ Request::is('/about') ? 'active' : '' }}">
                    <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">User</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    
        <div class="top">
            <h1 class="text-center">Welcome to TechBlog</h1>
        </div>
        <div class="middle">
            <div class="container">
                <p class="lead text-center">The right way to gain knowledge, share your knowledge and you 
            can be one of us and write your own articles for <span>FREE</span></p>
            </div>
        </div>
        <div class="bottom">
            <a href="" class="btn btn-default write">Write Articles</a>
            <a href="" class="btn btn-success read">Read Articles</a>
        </div>
    </div>

@endsection

 @section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="posts">
                        
                        @foreach($posts as $post)
                            <div class="post">
                                <div class="post-image">
                                    <a href="/post/{{ $post->slug }}">
                                        <img class="img-fluid" src="{{ asset('/images/' . $post->photo->filename)}}">
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
                    </div>
                </div>
                <div class="col-sm">
                    @include('includes.sidebar')

                </div>
            </div>
        </div>
    @endsection