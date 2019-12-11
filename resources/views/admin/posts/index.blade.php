@extends('layouts.master')

@section('title', 'Admin | Posts')

@section('content')

	<div class="container-fluid users-table">

		@if(Session::has('deleted_post'))
			<p class="alert alert-success">{{ Session::get('deleted_post') }}</p>
		@endif
		@if(Session::has('updated_post'))
			<p class="alert alert-success">{{ Session::get('updated_post') }}</p>
		@endif
		@if(Session::has('created_post'))
			<p class="alert alert-success">{{ Session::get('created_post') }}</p>
		@endif
		<h2>All Posts</h2>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#ID</th>
		      <th scope="col">Thumbnail</th>
		      <th scope="col">Author</th>
		      <th scope="col">Title</th>
		      <th scope="col">Content</th>
		      <th scope="col">Category</th>
		      <th scope="col">Created</th>
		      <th scope="col">Updated</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@if($posts)
				@foreach($posts as $post)
					<tr>
						<th scope="row">{{ $post->id }}</th>
						<td>
							@if(file_exists(public_path('/images/') . $post->photo->filename))
								<img class="img-fluid" height="50" width="100" src="{{ asset('/images/' . $post->photo->filename) }}" alt="Post Thumbnail">
							@else
								No Image
							@endif
						</td>
						<td>{{ $post->user->name }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ strip_tags($post->admin_content) }}  </td>
						<td>{{ $post->category ? $post->category->name : "Uncategorized" }}</td>
						<td>{{ $post->created_at->diffForHumans() }}</td>
						<td>{{ $post->updated_at->diffForHumans() }}</td>
						<td class="links">
							<a class="btn btn-info" href="/admin/posts/{{ $post->id }}/edit"><i class="fa fa-pencil"></i></a>

							{!! Form::open(['method'=>'DELETE', 'action'=>['Admin\PostController@destroy', $post->id],'class' =>'delete-form' ]) !!}
								{!! Form::submit('x', ['class'=>'btn btn-danger'])!!}
							{!! Form::close() !!}
							
							<a class="btn btn-secondary" href="/admin/posts/{{ $post->id }}"><i class="fa fa-eye"></i></a>
						</td>
					</tr>
				@endforeach
			@endif
		  </tbody>
		</table>
		<div class="row">
	        <div class="col-md-4">
	        	<a href="/admin/posts/create" class="btn btn-info">New Post</a>
	        </div>
	        <div class="col-md-4"></div>
	        <div class="col-md-4">{{ $posts->links() }}</div>
	    </div>
	</div>

@endsection