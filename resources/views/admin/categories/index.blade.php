@extends('layouts.master')

@section('title', 'Categories | Admin Dashboard')

@section('content')


	<div class="container-fluid users-table">
		<div class="row">
			<div class="col-sm-4">
				<h2>Create Category</h2>
				{!! Form::open(['method'=>'POST','action'=>'Admin\CategoryController@store']) !!}
					<div class="form-group">
						{!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Category Name']) !!}	
					</div>
					{!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}	
					
				{!! Form::close() !!}
				@include('includes.form_error')
			</div>
			<div class="col-sm-8">
			@if(Session::has('deleted_category'))
				<p class="alert alert-success">{{ Session::get('deleted_category') }}</p>
			@endif
			@if(Session::has('updated_category'))
				<p class="alert alert-success">{{ Session::get('updated_category') }}</p>
			@endif
			@if(Session::has('created_category'))
				<p class="alert alert-success">{{ Session::get('created_category') }}</p>
			@endif
			<h2></h2>
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#ID</th>
			      <th scope="col">Name</th>
			      <th scope="col">Created</th>
			      <th scope="col">Updated</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if($categories)
					@foreach($categories as $category)
						<tr>
							<th scope="row">{{ $category->id }}</th>
							<td>{{ $category->name }}</td>
							<td>{{ $category->created_at->diffForHumans() }}</td>
							<td>{{ $category->updated_at->diffForHumans() }}</td>
							<td class="links">
								{!! Form::open(['method'=>'DELETE', 'action'=>['Admin\CategoryController@destroy', $category->id] ]) !!}
									{!! Form::submit('x', ['class'=>'btn btn-danger'])!!}
								{!! Form::close() !!}
								<a class="btn btn-info" href="/admin/categories/{{ $category->id }}/edit"><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
					@endforeach
				@endif
			  </tbody>
			</table>
			{{ $categories->links() }}
			</div>
		</div>
	</div>

@endsection