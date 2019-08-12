@extends('layouts.master')

@section('title', 'Comments | Admin Dashboard')

@section('content')

	<div class="container-fluid users-table comments">

		@if(Session::has('deleted_comment'))
			<p class="alert alert-success">{{ Session::get('deleted_comment') }}</p>
		@endif
		@if(Session::has('updated_comment'))
			<p class="alert alert-success">{{ Session::get('updated_comment') }}</p>
		@endif
		@if(Session::has('created_comment'))
			<p class="alert alert-success">{{ Session::get('created_comment') }}</p>
		@endif
		<h2>All Comments </h2>

		<div class="comments">
			
			@foreach($posts as $post)
				<h5>Post <span>{{ $post->id }}</span> : {{ $post->title }}</h2>
				@if(count($post->comments) > 0)
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
				@else
					<p>No Comments in this post</p>
				@endif
			@endforeach
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="/admin/comments/create" class="btn btn-info">New Comment</a>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				{{ $posts->links() }}
			</div>
		</div>
		
	</div>

@endsection