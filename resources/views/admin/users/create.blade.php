@extends('layouts.master')

@section('title', 'Create User')

@section('content')


<div class="container-fluid">
	@include('includes.form_error')
	<h2>Create User</h2>
	{!! Form::open(['method'=>'post', 'action'=>'AdminUsersController@store','files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name',null, ['class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email',null, ['class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password',['class'=>'form-control', 'required'=>'required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('path', 'User Image') !!}
			{!! Form::file('path',['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Role') !!}
			{!! Form::select('role_id', [''=>'Choose Role'] + $roles ,3, ['class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
</div>


@endsection