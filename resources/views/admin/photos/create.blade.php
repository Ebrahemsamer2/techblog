
@extends('layouts.master')


@section('title', 'Admin | Upload Media')



@section('style')




@endsection


@section('content')


	<div class="container-fluid">
		
		<h2>Upload Media</h2>
		<div class="row">
			<div class="col-sm-10">
				{!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'files'=>true]) !!}
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								{!! Form::file('path', ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="col-sm-2">
							{!! Form::submit('Create Media', ['class' => 'btn btn-primary']) !!}
						</div>
					</div>
				{!! Form::close() !!}	
			</div>
		</div>
	</div>


@endsection




@section('scripts')


@endsection