@extends('layouts.user_layout')

@section('title', 'Edit Profile | TechBlog')

@section('content')

	<div class="edit-profile">
		
		<div class="container">
			
			<h1>Edit Profile</h1>
			<div class="row">
				
				<div class="col-sm-3">
					@if(isset($user->photo_id))
					<img src="{{ asset('/images/' . $user->photo->filename) }}" class="rounded-circle" width="150" height="150">
					@else
					<img src="{{ asset('/images/user.jpg') }}" class="rounded-circle" width="150" height="150">
					@endif
				</div>
				<div class="col-sm-6">
					<div class="user-info-form" id="edit-form">
						@if(Session::get('updated_user'))
						<div class="alert alert-success">
							{{ Session::get('updated_user') }}
						</div>
						@endif

						@if(Session::get('nothing-changed'))
							<div class="alert alert-primary">
								{{ Session::get('nothing-changed') }}
							</div>
						@endif

						{!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update_profile',$user->id],'files' => true ]) !!}

						{!! Form::text('name', null, ['class' => 'form-control']) !!}
						
						{!! Form::email('email', null, ['class' => 'form-control']) !!}
						
						{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
							<br>
						{!! Form::submit('Update Profile', ['class' => 'btn btn-default']) !!}

						{!! Form::close() !!}
					</div>
				</div>
				<div class="col-sm-3">
					
				</div>
			</div>

		</div>

	</div>

@endsection