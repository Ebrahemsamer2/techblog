@extends('layouts.user_layout')
    
@section('title', 'Home | TechBlog')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="posts">
                    
                    @foreach($posts as $post)
                        <div class="post">
                            <div class="post-image">
                                <a href="/post/{{ $post->slug }}#post">
                                    @if($post->photo_id)
                                        @if(file_exists(public_path('/images/') . $post->photo->filename))
                                            <img src="{{ asset('/images/'. $post->photo->filename) }}" class="img-fluid" alt="Card image cap">
                                        @else
                                            <img class="img-fluid" src="{{ asset('/images/post.jpg')}}">
                                        @endif
                                    @else 
                                        <img class="img-fluid" src="{{ asset('/images/post.jpg')}}">
                                    @endif
                                </a>
                            </div>
                            <div class="post-title">
                                <a title="{{ $post->slug }}" href="/post/{{ $post->slug }}#post">
                                    <h5>{{ $post->title }}</h5>
                                </a>
                            </div>
                            <div class="post-info">
                                <p class="lead text-center"> 
                                    <span><i class="fa fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</span><span><i class="fa fa-user"></i> {{ $post->user->name }}</span>
                                    <span>
                                        @if(count($post->comments) > 0)
                                        <i class="fa fa-comments"></i> {{ count($post->comments) }} Comment
                                        @else
                                        No Comments
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="post-content">
                                <p class="lead">{{ Str::limit($post->content,200) }}</p>
                                <a href="/post/{{ $post->slug }}" class="btn btn-default">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="col-sm">
                <div class="posts-sidebar">
                    <div class="sidebar-header">
                        <h5>Hottest Posts</h5>
                    </div>
                    <div class="sidebar-content">
                        <div class="container-fluid">
                            @foreach($hottest_posts as $post)
                                
                                <div class="sidebar-post">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="/post/{{ $post->slug }}">
                                                <img src="{{ asset('/images/' . $post->photo->filename) }}" height="60" width="60" class="">
                                            </a>
                                        </div>
                                        <div class="col-sm">
                                            <a title="{{ $post->slug }}" class="" href="/post/{{ $post->slug }}"><h6>{{ Str::limit($post->title, 80) }}</h6></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="categories-sidebar">
                    <div class="sidebar-header">
                        <h5>Hottest Categories</h5>
                    </div>
                    <div class="sidebar-content">
                        <div class="container-fluid">
                            @foreach($hottest_categories as $category)
                                <a title="{{ $category->slug }}" class="" href="/category/{{ $category->slug }}">{{ $category->name}}</a>  
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="button-sidebar">
                    <div class="button-header">
                        <h5>Share Your knowledge</h5>
                    </div>
                    <div class="sidebar-content">
                        <a href="" class="btn btn-default">Write Your First Article</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection