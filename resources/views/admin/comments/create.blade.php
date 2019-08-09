@extends('layouts.master')


@section('title', 'Admin | Comments')


@section('content')
	<div class="container-fluid">
		
		<h2>Comments</h2>

		{!! Form::open(['method'=>'POST', 'action'=>'AdminCommentsController@store']) !!}
			<div class="form-group">
				{!! Form::label('post_id', 'Related Post') !!}
				{!! Form::select('post_id',$posts, null , ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('the_comment', 'Comment') !!}
				{!! Form::textarea('the_comment', null, ['class' => 'form-control', 'required'=>'required']) !!}
			</div>
			{!! Form::submit('Create Comment', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
@endsection