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
			<div class="admin-actions">
				<a href="/admin/posts/{{$post->id}}/edit" class="btn btn-info">Edit Post</a>
				
				{!! Form::open(['method' => 'DELETE' , 'action' => ['Admin\PostController@destroy',$post->id]]) !!}
					{!! Form::submit('Delete Post' , ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}
			</div>
		</div>

	</div>



@endsection