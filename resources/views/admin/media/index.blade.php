@extends('layouts.master')


@section('title', 'Admin | Media')


@section('content')


	<div class="container-fluid users-table">

		@if(Session::has('deleted_mdeia'))
			<p class="alert alert-success">{{ Session::get('deleted_mdeia') }}</p>
		@endif
		@if(Session::has('updated_media'))
			<p class="alert alert-success">{{ Session::get('updated_media') }}</p>
		@endif
		@if(Session::has('created_media'))
			<p class="alert alert-success">{{ Session::get('created_media') }}</p>
		@endif
		<h2>Media</h2>
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
							@if($photo->path)
								<img height="50" width="100" src="{{ $photo->path }}" alt="Photo">
							@else
								No Image
							@endif
						</td>
						<td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : "No Date" }}</td>
						<td class="links">
							{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id] ]) !!}
								{!! Form::submit('x', ['class'=>'btn btn-danger'])!!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			@endif
		  </tbody>
		</table>
		<a href="/admin/media/create" class="btn btn-info">New Media</a>
	</div>

@endsection