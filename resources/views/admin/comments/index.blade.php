@extends('layouts.master')


@section('title', 'Admin | Posts')


@section('content')

	<div class="container-fluid users-table comments">

		@if(Session::has('deleted_post'))
			<p class="alert alert-success">{{ Session::get('deleted_post') }}</p>
		@endif
		@if(Session::has('updated_post'))
			<p class="alert alert-success">{{ Session::get('updated_post') }}</p>
		@endif
		@if(Session::has('created_post'))
			<p class="alert alert-success">{{ Session::get('created_post') }}</p>
		@endif
		<h2>All Comments <span>Hover on the Comment if you wanna reply</span></h2>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#ID</th>
		      <th scope="col">Commenter</th>
		      <th scope="col">The Comment</th>
		      <th scope="col">Related Post</th>
		      <th scope="col">Created</th>
		      <th scope="col">Updated</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($comments)
				@foreach($comments as $comment)
					<tr>
						<th scope="row">{{ $comment->id }}</th>
						<td>{{ $comment->user->name }}</td>
						<td>{{ $comment->the_comment }} 
							<span class="reply-link">Reply</span>
							<div class="reply-form">
								{!! Form::open(['method'=>'POST', 'action'=>'AdminCommentsController@store']) !!}

									{{ Form::hidden('comment_id', $comment->id) }}

									{!! Form::textarea('the_reply', null, ['class'=>'form-control']) !!}
									{!! Form::submit('Reply', ['class'=>'btn btn-info']) !!}
								{!! Form::close() !!}
							</div>
						</td>
						<td>{{ $comment->post->title }}</td>
						<td>{{ $comment->created_at ? $comment->created_at->diffForHumans() : 'No Date' }}</td>
						<td>{{ $comment->updated_at ? $comment->updated_at->diffForHumans() : 'No Date' }}</td>
						<td class="links">
							{!! Form::open(['method'=>'DELETE', 'action'=>['AdminCommentsController@destroy', $comment->id] ]) !!}
								{!! Form::submit('x', ['class'=>'btn btn-danger'])!!}
							{!! Form::close() !!}
							<a class="btn btn-info" href="/admin/comments/{{ $comment->id }}/edit"><i class="fa fa-pencil"></i></a>
							<button class="btn btn-primary"><i class="fa fa-reply"></i></button>
						</td>
					</tr>
					
				@endforeach
			@endif
		  </tbody>
		</table>
		<a href="/admin/comments/create" class="btn btn-info">New Comment</a>
	</div>

@endsection