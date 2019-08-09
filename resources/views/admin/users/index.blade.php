@extends('layouts.master')


@section('title', 'Users | Admin Dashboard')


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
						<td>
							@if( file_exists(public_path('/images/') . $user->photo->filename))
								<img class="img-fluid rounded" alt="User Image" width="150" height="100" src="{{ asset('/images/' . $user->photo->filename)}}"/>
							@else
								<img class="img-fluid rounded" alt="User Image" width="150" height="100" src="{{ asset('/images/user.jpg') }}"/>
							@endif
							
						
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->admin == 1 ? 'Admin':'User' }}</td>
						<td>{{ $user->created_at->diffForHumans() }}</td>
						<td>{{ $user->updated_at->diffForHumans() }}</td>
						<td class="links">
							{!! Form::open(['method'=>'DELETE', 'action'=>['Admin\UserController@destroy', $user->id] ]) !!}
								{!! Form::submit('x', ['class'=>'btn btn-danger'])!!}
							{!! Form::close() !!}
							<a class="btn btn-info" href="/admin/users/{{ $user->id }}/edit"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
				@endforeach
			@endif
		  </tbody>
		</table>

		{{ $users->links() }}

	</div>

@endsection