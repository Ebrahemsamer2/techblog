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