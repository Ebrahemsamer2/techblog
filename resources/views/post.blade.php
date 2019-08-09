@extends('layouts.app')

@section('content')

@include('includes.nav')



<div class="container">
    <div class="row">
    	<div class="col-md-1">
    		
    	</div>
        <div class="col-md-10">
            <div class="post-container">

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
                            <p class="lead">{{ $post->post_content }}</p>
                        </div>

                    </div>

            </div>

            <div class="comments-container">
            	<span id="like"><i class="fa fa-heart-o"></i> Like</span>
            	<span id="add-comment"><i class="fa fa-comment-o"></i> Add Comment</span><br>
            	<hr>
                @guest
                    <div class="go-login">
                        <p>Please <a href="/login">Login</a> to comment</p>
                    </div>
                @endguest
                @auth
                <div class="add-comment-form">
                    @include('includes.form_error')
                    @if(session('comment_added'))
                        <div class="alert alert-success">
                            {{ session('comment_added') }}
                        </div>
                    @endif
                    <!-- Need to fixex -->
                    {!! Form::open(['method'=>'POST','action'=>'AdminCommentsController@store']) !!}
                        {!! Form::textarea('the_comment', null, ['class'=>'form-control','placeholder'=>'Write Your Comment...']) !!}
                        {{ Form::hidden('post_id', $post->id) }}
                        {!! Form::submit('Comment', ['class'=>'btn btn-info']) !!}
                    {!! Form::close() !!}
                </div>
                @endauth
            	@foreach($post->comments as $comment)
            		<div class="comment">
            			<img class="img-fluid rounded" width="80" src="{{ $comment->user->photo->path }}">
            			<span class="commenter">{{ $comment->user->name }}</span>
            			<span class="created-at">{{ $comment->created_at->diffForHumans() }}</span><br>
            			<p class="the-comment lead">{{ $comment->the_comment }}</p>


            			<div class="replies-container">
            					
            				@foreach($comment->replies as $reply)

            					<div class="reply">
    								<img class="img-fluid" width="75" src="{{ $reply->comment->user->photo->path }}">
			            			<span class="commenter">{{ $reply->comment->user->name }}</span>
			            			<span class="created-at">{{ $reply->created_at->diffForHumans() }}</span><br>
			            			<p class="the-reply lead">{{ $reply->the_reply }}</p>
            					</div>

            				@endforeach


            			</div>

            		</div>
            	@endforeach
            </div>

        </div>
        <div class="col-md-1">
            <!-- Search Form -->

        </div>
    </div>

</div>