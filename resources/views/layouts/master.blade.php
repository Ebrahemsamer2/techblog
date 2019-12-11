<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Font Awesome CDN -->
	<script src="https://use.fontawesome.com/9da1677a46.js"></script>

	<!-- My Own Style -->
	<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


	<title>@yield('title')</title>

	@yield('js')
</head>
<body>
	
	<div class="navbar">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			  <a class="navbar-brand" href="#">Navbar</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
				    <form class="form-inline my-2 my-lg-0">
				      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				    </form>
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Link</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <i class="fa fa-user" aria-hidden="true"></i>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Action</a>
			          <a class="dropdown-item" href="#">Another action</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Logout</a>
			        </div>
			      </li>
			    </ul>
			    
			  </div>
			</nav>
		</div>
	</div>

		<div class="wrapper">
		    <!-- Sidebar -->
		    <nav id="sidebar">
		        <div class="sidebar-header">
		            <h4 class="home-link">TechBlog</h4>
		        </div>

		        <ul class="list-unstyled components">
		            <p>Welcome, Admin</p>
		            <li>
		                <a href="#">Dashboard</a>
		            </li>
		            <li class="active">
		            	<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
		                <ul class="collapse list-unstyled" id="homeSubmenu">
		                    <li>
		                        <a href="/admin/users">All Users</a>
		                    </li>
		                </ul>
		            </li>
		            <li>
		                <a href="#postsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Posts</a>
		                <ul class="collapse list-unstyled" id="postsSubmenu">
		                    <li>
		                        <a href="/admin/posts">All Posts</a>
		                    </li>
		                    <li>
		                        <a href="/admin/posts/create">New Post</a>
		                    </li>
		                </ul>
		            </li>
		            <li>
		                <a href="#categoriesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories</a>
		                <ul class="collapse list-unstyled" id="categoriesSubmenu">
		                    <li>
		                        <a href="/admin/categories">All Categories</a>
		                    </li>
		                    <li>
		                        <a href="/admin/categories">New Category</a>
		                    </li>
		                </ul>
		            </li>

		            <li>
		                <a href="#commentsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Comments</a>
		                <ul class="collapse list-unstyled" id="commentsSubmenu">
		                    <li>
		                        <a href="/admin/comments">All Comments</a>
		                    </li>
		                    <li>
		                        <a href="/admin/comments/create">New Comment</a>
		                    </li>
		                </ul>
		            </li>

		            <li>
		                <a href="#repliesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Replies</a>
		                <ul class="collapse list-unstyled" id="repliesSubmenu">
		                    <li>
		                        <a href="/admin/comments/replies">All Replies</a>
		                    </li>
		                </ul>
		            </li>


		            <li>
		                <a href="#mediaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Photos</a>
		                <ul class="collapse list-unstyled" id="mediaSubmenu">
		                    <li>
		                        <a href="/admin/photos">All Photos</a>
		                    </li>
		                    <li>
		                        <a href="/admin/photos/create">New Photo</a>
		                    </li>
		                </ul>
		            </li>

		            <li>
		                <a href="#">Contact</a>
		            </li>
		        </ul>

		    </nav>
		</div>

	<div class="content">
		
		@yield('content')

	</div>





	<!-- JQuery, Bootstrap CDN -->

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- My Own Scrips -->
	<script src="{{ asset('admin/js/script.js') }}"></script>
	@yield('scripts')
</body>
</html>