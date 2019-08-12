@extends('layouts.master')

@section('title', 'Edit Reply | Admin Dashboard')

@section('content')
	<div class="container-fluid">
		
		<h2>Edit Reply</h2>

		{!! Form::model($reply, ['method'=>'PATCH', 'action'=> ['Admin\ReplyController@update',$reply->id]]) !!}
			<div class="form-group">
				{!! Form::label('comment_id', 'Related Comment') !!}
				{!! Form::select('comment_id',[$reply->comment->id => $reply->comment->the_comment],null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('the_reply', 'Reply') !!}
				{!! Form::textarea('the_reply', null, ['class' => 'form-control', 'required'=>'required']) !!}
			</div>
			{!! Form::submit('Update Reply', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
	</div>
@endsection