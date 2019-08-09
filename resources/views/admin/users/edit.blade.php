@extends('layouts.master')

@section('title', 'Update User')

@section('content')


<div class="container-fluid">
	@include('includes.form_error')
	<h2>Edit User</h2>
	<div class="user-image">
		@if(file_exists(public_path('/images/') . $user->photo->filename))
			<img height="200" width="200" alt="User Image" src="{{ asset('/images/' .  $user->photo->filename)}}" class="img-fluid img-thumbnail text-center">
		@else
			<img class="img-fluid img-thumbnail text-center" height="200" width="200" alt="User Image" src="{{ asset('/images/user.jpg')}}">
		@endif

	</div>
	{!! Form::model($user,['method'=>'PATCH', 'action'=>['Admin\UserController@update', $user->id],'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('admin', 'Role'); !!}
			{!! Form::select('admin', ['1' => 'Admin', '0' => 'User'] , null, ['class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update User', ['class'=>'btn btn-info']) !!}
		</div>

	{!! Form::close() !!}
</div>


@endsection