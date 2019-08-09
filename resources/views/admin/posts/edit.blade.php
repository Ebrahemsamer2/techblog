@extends('layouts.master')


@section('title', 'Admin | Edit Post')


@section('content')
	<div class="container-fluid">
		@include('includes.form_error')
		<h2>Edit Post</h2>
		@if($post->photo)
			<div class="post-image">
				<img class="img-responsive" height="100" alt="Post Thumbnail" src="{{ $post->photo->path }}">
			</div>
		@endif
		{!! Form::model($post, ['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('content', 'Content') !!}
				{!! Form::textarea('content',null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('category_id', 'Category') !!}
				{!! Form::select('category_id',$categories,null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('photo_id', 'Post Thumbnail') !!}
				{!! Form::file('photo_id', ['class'=>'form-control']) !!}	
			</div>
			<div class="form-group">
				{!! Form::submit('Update Post',['class'=>'btn btn-info']) !!}
			</div>

		{!! Form::close() !!}
	</div>
	
@endsection