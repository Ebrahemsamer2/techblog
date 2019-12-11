@extends('layouts.master')


@section('title', 'Admin | Edit Post')

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
		
		@if(Session::has('nothing_changed'))
			<p class="alert alert-info">{{ Session::get('nothing_changed') }}</p>
		@endif

		<h2>Edit Post</h2>
		@if(file_exists(public_path('/images/') . $post->photo->filename))
			<div class="post-image">
				<img class="rounded" height="100" alt="Post Thumbnail" src="{{ asset('/images/' . $post->photo->filename)}}">
			</div>
		@endif
		{!! Form::model($post, ['method'=>'PATCH','action'=>['Admin\PostController@update', $post->id], 'files'=>true]) !!}

			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('content', 'Content') !!}
				{!! Form::textarea('content',null, ['class'=>'form-control', 'id' => 'postcontent']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('category_id', 'Category') !!}
				{!! Form::select('category_id',$categories,null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('photo_id', 'Post Thumbnail') !!}
				{!! Form::file('photo_id', ['class'=>'form-control']) !!}	
			</div>
			<div class="form-group">
				{!! Form::submit('Update Post',['class'=>'btn btn-info']) !!}
			</div>

		{!! Form::close() !!}
	</div>
	
@endsection