@extends('layouts.user_layout')

@section('title', 'Posts Category | TechBlog')


@section('content')
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="posts">
                        <div class="post one-post" id="post">
                            <div class="post-image">
                                <a href="/post/{{ $post->slug }}">
                                    @if($post->photo)
                                        @if(file_exists('images/' . $post->photo->filename))
                                            <img src="{{ asset('/images/' . $post->photo->filename) }}" class="img-fluid" alt="Card image cap">
                                        @else
                                            <img class="img-fluid" src="{{ asset('/images/post.jpg')}}">
                                        @endif
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
                                        <i class="fa fa-comments"></i> {{ count($post->comments) }} Comments
                                        @else
                                        No Comments
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="post-content">
                                <p class="lead">{!! $post->content !!}</p>
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
                                    @if($post->user && $post->user->photo)
                                    @if(file_exists('images/' . $post->user->photo->filename))
                                    <img src="{{ asset('/images/'.$post->user->photo->filename) }}" width="100" height="100" class="rounded-circle">
                                    @else
                                    <img src="{{ asset('/images/user.jpg') }}" width="100" height="100" class="rounded-circle">
                                    @endif
                                    @else
                                    <img src="{{ asset('/images/user.jpg') }}" width="100" height="100" class="rounded-circle">
                                    @endif
                                </div>
                                <div class="col-sm author-info">
                                    <h6>Created By</h6>
                                    <h5>{{ $post->user->name }}</h5>
                                    <span>{{ $post->user->email }}</span>
                                    <a href="/user/{{ $post->user->name }}#posts" class="btn btn-default btn-sm">Author Posts</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"><hr></div>
                            <div class="col-sm-4"></div>
                        </div>
                        <div class="post-comments" id="comments">
                            @if(Session::get('created_comment'))
                                <div class="alert alert-success">
                                    {{ Session::get('created_comment') }}
                                </div>
                            @endif
                            @if(Session::get('created_reply'))
                                <div class="alert alert-success">
                                    {{ Session::get('created_reply') }}
                                </div>
                            @endif
                            
                            <h2>Comments</h2>
                            @include('errors.errors')
                            @foreach($post->comments as $comment)
                                <div class="comment">
                                    <div class="row">
                                        <div class="col-sm-2">

                                            @if(isset($comment->user->photo))

                                            <img src="{{ asset('/images/'.$comment->user->photo->filename) }}" width="80" height="80" class="rounded">
                                            @else

                                            <img src="{{ asset('/images/user.jpg') }}" width="80" height="80" class="rounded">
                                            @endif
                                        </div>
                                        <div class="col-sm comment-info">
                                            <h6>{{ $comment->user->name }} <span>{{ $comment->created_at->diffForHumans() }}</span></h6>
                                            <p class="lead">{{ $comment->the_comment }}</p>
                                            @auth
                                                <span class="reply-btn">Reply</span>
                                            @endauth
                                            @guest
                                            <h6>Sorry, You must login to add Reply <a href="/login">Login</a></h6>
                                            @endguest
                                            {!! Form::open(['method' => 'POST', 'action' => 'CommentController@store']) !!}
                                                <div class="form-group">
                                                    {!! Form::hidden('comment_id',$comment->id) !!}

                                                    {!! Form::textarea('the_reply',null, ['class' => 'form-control', 'placeholder' => 'Your Reply Here...']) !!}
                                                    <p style="margin-top: 10px;margin-left: 10px"></p>
                                                </div>
                                                
                                                {!! Form::submit('Reply', ['class' => 'btn btn-default']) !!}
                                            {!! Form::close() !!}
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
                                                            @if(isset($reply->user->photo))
                                                            <img src="{{ asset('/images/'.$reply->user->photo->filename) }}" width="80" height="80" class="rounded">
                                                            @else
                                                            <img src="{{ asset('/images/user.jpg') }}" width="80" height="80" class="rounded">
                                                            @endif
                                                        </div>
                                                        <div class="col-sm reply-info">
                                                            <h6>{{ $reply->user->name }}</h6>
                                                            <p class="lead">{{ $reply->the_reply }}</p>
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
                                    {!! Form::open(['method' => 'POST', 'action' => 'CommentController@store']) !!}
                                        <div class="form-group">
                                            {!! Form::hidden('post_id',$post->id) !!}

                                            {!! Form::textarea('the_comment',null, ['class' => 'form-control', 'placeholder' => 'Your Comment Here...']) !!}
                                            <p style="margin-top: 10px;margin-left: 10px"></p>
                                        </div>
                                        {!! Form::submit('Comment', ['class' => 'btn btn-default']) !!}
                                    {!! Form::close() !!}
                                @endauth
                                @guest
                                    <h6>Sorry, You must login to add Comment <a href="/login">Login</a></h6>
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