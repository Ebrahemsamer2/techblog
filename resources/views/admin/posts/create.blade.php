@extends('layouts.master')


@section('title', 'Create Post | Admin Dashboard')


@section('content')
	<div class="container-fluid">
		@include('includes.form_error')
		<h2>Create Post</h2>
		{!! Form::open(['method'=>'POST','action'=>'Admin\PostController@store', 'files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null,['class'=>'form-control']) !!}	
			</div>
			<div class="form-group">
				{!! Form::label('content', 'Content') !!}
				{!! Form::textarea('content',null,  ['class'=>'form-control']) !!}	
			</div>
			<div class="form-group">
				{!! Form::label('category_id', 'Category') !!}
				{!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('photo_id', 'Post Thumbnail') !!}
				{!! Form::file('photo_id', ['class'=>'form-control']) !!}	
			</div>
			<div class="form-group">
				{!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}	
			</div>

		{!! Form::close() !!}
	</div>
	
@endsection