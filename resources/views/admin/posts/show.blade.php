@extends('layouts.master')

@section('title', 'Post | Admin Dashboard')

@section('content')

	<div class="container-fluid">
			

		<div class="show-post">
			<div class="post-info">
				<span><i class="fa fa-user"></i> {{ $post->user->name }}</span>
				<span><i class="fa fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</span>
				<span><i class="fa fa-calendar"></i> {{ count($post->comments) }} Comments</span>
			</div>
			<div class="post">
				@if(file_exists(public_path('/images/') . $post->photo->filename))
					<img src="{{ asset('/images/' . $post->photo->filename ) }}" class="" height="500" width="1000" >
				@endif
				</div>
			<h3>{{ $post->title }}</h3>
			<div class="post">
				<p>{{ $post->content }}</p>
			</div>
			<div class="admin-actions links">
				<a href="/admin/posts/{{$post->id}}/edit" class="btn btn-info btn-sm">Edit Post</a>
				
				{!! Form::open(['method' => 'DELETE' , 'action' => ['Admin\PostController@destroy',$post->id]]) !!}
					{!! Form::submit('Delete Post' , ['class' => 'btn btn-danger btn-sm']) !!}
				{!! Form::close() !!}

			</div>
			<div class="post-comments">
				
				<h5>Post Comments</h5>

				@foreach($post->comments as $comment)
				<div class="post-comments">
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-3">
							@if(file_exists(public_path('/images/') . $comment->user->photo->filename))
								<img src="{{ asset('/images/' . $comment->user->photo->filename) }}" width="50" height="50" class="rounded-circle">
							@else
								<img src="{{ asset('/images/user.jpg') }}" width="50" height="50" class="rounded-circle">
							@endif
							<span>{{ $comment->user->name }}</span>
						</div>
						<div class="col-sm-6">
							<p>{{ $comment->the_comment }}</p>
							<div class="comment-actions links">
								<a class="btn btn-info btn-sm" href="/admin/comments/{{$comment->id}}/edit">Edit</a>

								<a class="btn btn-secondary btn-sm" href="/admin/comments/{{$comment->id}}/reply">Reply</a>

								{!! Form::open(['method' => 'DELETE', 'action' => ['Admin\CommentController@destroy',$comment->id] ]) !!}
									{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}

								<a class="btn btn-secondary btn-sm" href="/admin/comments/{{$comment->id}}">Show Replies</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>

	</div>



@endsection