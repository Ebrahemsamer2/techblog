@extends('layouts.master')


@section('title', 'Admin | Users')


@section('content')


	<div class="container-fluid users-table">

		@if(Session::has('deleted_user'))
			<p class="alert alert-success">{{ Session::get('deleted_user') }}</p>
		@endif
		@if(Session::has('updated_user'))
			<p class="alert alert-success">{{ Session::get('updated_user') }}</p>
		@endif
		@if(Session::has('created_user'))
			<p class="alert alert-success">{{ Session::get('created_user') }}</p>
		@endif
		<h2>Users</h2>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#ID</th>
		      <th scope="col">Image</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Role</th>
		      <th scope="col">Created</th>
		      <th scope="col">Updated</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($users)
				@foreach($users as $user)
					<tr>
						<th scope="row">{{ $user->id }}</th>
						<td >
							<img class="img-fluid img-circle" alt="User Image" height="50" src="{{ $user->photo ? $user->photo->path : 'No Image' }}"/>
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role->name }}</td>
						<td>{{ $user->created_at->diffForHumans() }}</td>
						<td>{{ $user->updated_at->diffForHumans() }}</td>
						<td class="links">
							{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id] ]) !!}
								{!! Form::submit('x', ['class'=>'btn btn-danger'])!!}
							{!! Form::close() !!}
							<a class="btn btn-info" href="/admin/users/{{ $user->id }}/edit"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
				@endforeach
			@endif
		  </tbody>
		</table>
		<a href="/admin/users/create" class="btn btn-info">New User</a>
	</div>

@endsection