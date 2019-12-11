@extends('layouts.master')


@section('title', 'Create Post | Admin Dashboard')
@section('js')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#postcontent',
            height: 500,
            plugins: 'link',
        });
    </script>
@endsection
@section('content')
	<div class="container-fluid">
		@include('includes.form_error')
		<h2>Create Post</h2>
		{!! Form::open(['method'=>'POST','action'=>'Admin\PostController@store', 'files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null,['class'=>'form-control']) !!}	
			</div>
			<div class="form-group">
				{!! Form::label('content', 'Content') !!}
				{!! Form::textarea('content',null,  ['class'=>'form-control', 'id' => 'postcontent']) !!}	
			</div>
			<div class="form-group">
				{!! Form::label('category_id', 'Category') !!}
				{!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('photo_id', 'Post Thumbnail') !!}
				{!! Form::file('photo_id', ['class'=>'form-control']) !!}	
			</div>
			<div class="form-group">
				{!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}	
			</div>

		{!! Form::close() !!}
	</div>
	
@endsection