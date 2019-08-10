@extends('layouts.master')


@section('title', 'Photos | Admin Dashboard')


@section('content')


	<div class="container-fluid users-table">

		@if(Session::has('deleted_photo'))
			<p class="alert alert-success">{{ Session::get('deleted_photo') }}</p>
		@endif
		@if(Session::has('updated_photo'))
			<p class="alert alert-success">{{ Session::get('updated_photo') }}</p>
		@endif
		@if(Session::has('created_photo'))
			<p class="alert alert-success">{{ Session::get('created_photo') }}</p>
		@endif
		<h2>Photos</h2>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#ID</th>
		      <th scope="col">Photo</th>
		      <th scope="col">Created</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($photos)
				@foreach($photos as $photo)
					<tr>
						<th scope="row">{{ $photo->id }}</th>
						<td>
							@if(file_exists(public_path('/images/') . $photo->filename)) 
								<img height="50" width="100" src="{{ asset('/images/' . $photo->filename) }}" alt="Photo">
							@else
								No Image
							@endif
						</td>
						<td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : "No Date" }}</td>
						<td class="links">
							{!! Form::open(['method'=>'DELETE', 'action'=>['Admin\PhotoController@destroy', $photo->id] ]) !!}
								{!! Form::submit('x', ['class'=>'btn btn-danger'])!!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			@endif
		  </tbody>
		</table>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">{{ $photos->links() }}</div>
			<div class="col-sm-4">	</div>
		</div>
		
	</div>

@endsection