@extends('layouts.master')

@section('title', 'Comment Replies | Admin Dashboard')

@section('content')

	<div class="container-fluid">	
		<div class="comment-reply">
			
			<h5>Comment: {{ $comment->id }}: {{ $comment->the_comment }}<h5>
			<div class="replies">
				<h3>All Replies</h3>
				@if(count($comment->replies) > 0)
				@foreach($comment->replies as $reply)

					<div class="reply">
						
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
								<div class="reply-actions links">
									<a class="btn btn-info btn-sm" href="/admin/comments/replies/{{$reply->id}}/edit">Edit</a>

									{!! Form::open(['method' => 'DELETE', 'action' => ['Admin\ReplyController@destroy',$reply->id] ]) !!}
										{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
									{!! Form::close() !!}

									<a class="btn btn-primary btn-sm" href="/admin/comments/{{$comment->id}}/reply">Reply on Comment</a>

								</div>
							</div>
						</div>

					</div>

				@endforeach
				@else
					<p>There is No Replies on this Comment</p>
					<a class="btn btn-primary btn-sm" href="/admin/comments/{{$comment->id}}/reply">Reply on Comment</a>
				@endif

			</div>
		</div>
	</div>

@endsection