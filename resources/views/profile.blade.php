@extends('layouts.user_layout')

@section('title', 'User Profile | TechBlog')

@section('content')

	<div class="container">
		<div class="profile" id="profile">
			<h1>User Profile</h1>
			<div class="row">
				<div class="col-sm-3">
					@if(isset($user->photo_id))
					<img src="{{ asset('/images/' . $user->photo->filename) }}" class="rounded-circle" width="150" height="150">
					@else
					<img src="{{ asset('/images/user.jpg') }}" class="rounded-circle" width="150" height="150">
					@endif
				</div>
				<div class="col-sm-6">
					<div class="user-info">
						<p class="lead">{{ $user->name }}</p>
						<p class="lead">{{ $user->email }}</p>
						<p class="">{{ $user->admin == 1 ? 'Admin ' : 'User ' . $user->created_at->diffForHumans() }}</p>
						<a href="/user/{{ $user->id }}/profile/edit#edit-form" class="btn btn-default">Edit Profile</a>
					</div>
				</div>
				<div class="col-sm-3">
					<h1>{{ count($user->posts) }} Articles</h1>
					@if(count($user->posts) == 0)
						<a class="btn btn-default" href="/create_article">Create Your First</a>
					@endif
				</div>
			</div>
			<div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><hr></div>
                <div class="col-sm-4"></div>
            </div>
			<div class="profile-posts">
				
				<h1>{{ $user->name }}'s Posts</h1>
				@if(count($user->posts) == 0)
					<p class="lead">You've no posts to show</p>
				@else
					<div class="user-posts">
						<div class="row">
							@foreach($user->posts as $post)
								<div class="col-sm-4">
									<div class="post">
										<div class="card" style="width: 18rem;">
											@if($post->photo)
		                                        @if(file_exists('images/' . $post->photo->filename))
		                                        <img src="{{ asset('/images/'. $post->photo->filename) }}" class="img-fluid" alt="Card image cap">
		                                        @else
		                                        <img class="img-fluid" src="{{ asset('/images/post.jpg')}}">
		                                        @endif
			                                    @else 
			                                    <img class="img-fluid" src="{{ asset('/images/post.jpg')}}">
		                                    @endif
										  	<div class="card-body">
										    	<h5 title="{{ $post->title }}" class="card-title">{{ Str::limit($post->title, 20) }}</h5>
										    	<p class="card-text">{!! Str::limit($post->content,100) !!}</p>
										    	<a href="/post/{{ $post->slug }}#post" class="btn btn-primary">Read More</a>
										  	</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				@endif

			</div>

		</div>
	</div>

@endsection
