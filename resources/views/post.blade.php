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
                        <div class="post one-post">
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
                                        <i class="fa fa-comments"></i> {{ count($post->comments) }} Comments
                                        @else
                                        No Comments
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="post-content">
                                <p class="lead">{{ $post->content }}</p>
                            </div>
                            <div class="post-category">
                                <p class="lead">Category: <a href="/category/{{ $post->category->name }}">{{ $post->category->name }}</a> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"><hr></div>
                            <div class="col-sm-4"></div>
                        </div>
                        <div class="author-intro">
                            <div class="row">
                                <div class="col-sm-2">
                                    @if(file_exists(public_path('/images/') . $post->user->photo->filename))
                                    <img src="{{ asset('/images/'.$post->user->photo->filename) }}" width="100" height="100" class="rounded-circle">
                                    @else
                                    <img src="{{ asset('/images/user.jpg') }}" width="100" height="100" class="rounded-circle">
                                    @endif
                                </div>
                                <div class="col-sm author-info">
                                    <h6>Created By</h6>
                                    <h5>{{ $post->user->name }}</h5>
                                    <span>{{ $post->user->email }}</span>
                                    <a href="" class="btn btn-default btn-sm">Author Posts</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"><hr></div>
                            <div class="col-sm-4"></div>
                        </div>
                        <div class="post-comments">
                            <h2>Comments</h2>
                            @foreach($post->comments as $comment)
                                <div class="comment">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            @if(file_exists(public_path('/images/') . $comment->user->photo->filename))
                                            <img src="{{ asset('/images/'.$comment->user->photo->filename) }}" width="80" height="80" class="rounded">
                                            @else
                                            <img src="{{ asset('/images/user.jpg') }}" width="80" height="80" class="rounded">
                                            @endif
                                        </div>
                                        <div class="col-sm comment-info">
                                            <h6>{{ $comment->user->name }}</h6>
                                            <p class="lead">{{ $comment->the_comment }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if(count($comment->replies) > 0)
                                    @foreach($comment->replies as $reply)
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm">
                                            <div class="replies">
                                                <div class="reply">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            @if(file_exists(public_path('/images/') . $reply->user->photo->filename))
                                                            <img src="{{ asset('/images/'.$reply->user->photo->filename) }}" width="80" height="80" class="rounded">
                                                            @else
                                                            <img src="{{ asset('/images/user.jpg') }}" width="80" height="80" class="rounded">
                                                            @endif
                                                        </div>
                                                        <div class="col-sm reply-info">
                                                            <h6>{{ $comment->user->name }}</h6>
                                                            <p class="lead">{{ $comment->the_comment }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    @endforeach
                                @endif
                            @endforeach
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"><hr></div>
                                <div class="col-sm-4"></div>
                            </div>
                            <div class="add-comment">
                                <h5>Add Comment</h5>
                                @auth
                                {!! Form::open(['method' => 'POST', 'action' => 'Admin\CommentController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::textarea('the_comment',null, ['class' => 'form-control', 'placeholder' => 'Your Comment Here...']) !!}
                                    </div>
                                    {!! Form::submit('Add Comment', ['class' => 'btn btn-default']) !!}
                                {!! Form::close() !!}
                                @endauth
                                @guest
                                    <h6>Sorry, You must login to add Comment <a href="">Login</a></h6>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    @include('includes.sidebar')

                </div>
            </div>
        </div>
    @endsection