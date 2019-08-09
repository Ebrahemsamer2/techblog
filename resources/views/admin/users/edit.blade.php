@extends('layouts.master')

@section('title', 'Update User')

@section('content')


<div class="container-fluid">
	@include('includes.form_error')
	<h2>Edit User</h2>
	<div class="user-image">
		
		<img height="100" width="100" alt="User Image" src="{{ $user->photo ? $user->photo->path : 'No Image' }}" class="img-responsive">

	</div>
	{!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name'); !!}
			{!! Form::text('name',null, ['class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email'); !!}
			{!! Form::email('email',null, ['class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password'); !!}
			{!! Form::password('password',['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('path', 'User Image'); !!}
			{!! Form::file('path',['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Role'); !!}
			{!! Form::select('role_id', $roles , null, ['class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update User', ['class'=>'btn btn-info']) !!}
		</div>

	{!! Form::close() !!}
</div>


@endsection