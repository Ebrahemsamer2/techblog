@extends('layouts.master')

@section('title', 'Create Reply | Admin Dashboard')

@section('content')
	<div class="container-fluid">
		
		<h2>Create Reply</h2>

		{!! Form::open(['method'=>'POST', 'action'=> 'Admin\ReplyController@store']) !!}
			<div class="form-group">
				{!! Form::label('comment_id', 'Related Comment') !!}
				{!! Form::select('comment_id',[$comment->id => $comment->the_comment],null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('the_reply', 'Reply') !!}
				{!! Form::textarea('the_reply', null, ['class' => 'form-control', 'required'=>'required']) !!}
			</div>
			{!! Form::submit('Create Reply', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
@endsection