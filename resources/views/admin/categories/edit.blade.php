@extends('layouts.master')


@section('title', 'Admin | Edit Category')


@section('content')

	<div class="container-fluid">
		<h2>Edit Category</h2>
		<div class="row">
			<div class="col-sm-4">
				{!! Form::model($category, ['method'=>'PATCH','action'=>['AdminCategoriesController@update', $category->id]]) !!}
					<div class="form-group">
						{!! Form::text('name', null, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::submit('Update Category',['class'=>'btn btn-info']) !!}
					</div>
				{!! Form::close() !!}
				@include('includes.form_error')
			</div>
		</div>
	</div>
	
@endsection