@extends('layouts.master')


@section('title', 'Admin | Edit Comment')


@section('content')
	<div class="container-fluid">
		@include('includes.form_error')
		<h2>Edit Comment</h2>

		{!! Form::model($comment, ['method'=>'PATCH','action'=>['AdminCommentsController@update', $comment->id]]) !!}
			<div class="form-group">
				{!! Form::label('post_id', 'Related Post') !!}
				{!! Form::select('post_id',$posts,null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('the_comment', 'Comment') !!}
				{!! Form::textarea('the_comment',null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update Comment',['class'=>'btn btn-info']) !!}
			</div>

		{!! Form::close() !!}
	</div>
	
@endsection