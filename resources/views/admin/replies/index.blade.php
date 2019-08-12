@extends('layouts.master')

@section('title', 'Replies | Admin Dashboard')

@section('content')

	<div class="container-fluid users-table replies">

		@if(Session::has('deleted_reply'))
			<p class="alert alert-success">{{ Session::get('deleted_reply') }}</p>
		@endif
		@if(Session::has('updated_reply'))
			<p class="alert alert-success">{{ Session::get('updated_reply') }}</p>
		@endif
		@if(Session::has('created_reply'))
			<p class="alert alert-success">{{ Session::get('created_reply') }}</p>
		@endif
		<h2>All Replies</h2>

		<div class="replies">
			
			@foreach($comments as $comment)
				<h5>Comment <span>{{ $comment->id }}</span> : {{ $comment->the_comment }}</h2>
				@if(count($comment->replies) > 0)
				@foreach($comment->replies as $reply)
				<div class="comment-replies">
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-3">
							@if(file_exists(public_path('/images/') . $reply->user->photo->filename))
								<img src="{{ asset('/images/' . $reply->user->photo->filename) }}" width="50" height="50" class="rounded-circle">
							@else
								<img src="{{ asset('/images/user.jpg') }}" width="50" height="50" class="rounded-circle">
							@endif
							<span>{{ $reply->user->name }}</span>
						</div>
						<div class="col-sm-6">
							<p>{{ $reply->the_reply }}</p>
							<div class="comment-actions links">
								<a class="btn btn-info btn-sm" href="/admin/comments/replies/{{$reply->id}}/edit">Edit</a>

								{!! Form::open(['method' => 'DELETE', 'action' => ['Admin\ReplyController@destroy',$reply->id] ]) !!}
									{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}

							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
					<p>No Replies on this Comment</p>
				@endif
			@endforeach
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="/admin/comments/create" class="btn btn-info">New Comment</a>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				{{ $comments->links() }}
			</div>
		</div>
		
	</div>

@endsection