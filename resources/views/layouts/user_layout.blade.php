<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Lato font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,700&display=swap" rel="stylesheet">

	<!-- Font Awesome CDN -->
	<script src="https://use.fontawesome.com/9da1677a46.js"></script>

	<!-- My Own Style -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

	<div class="header">
  
  <nav class="navbar navbar-expand-lg">
      <div class="container">
          <a class="navbar-brand" href="/"><span>T</span>echBlog
              <img src="{{ asset('/images/right.svg') }}" class="rounded-circle" height="40" width="40" >
          </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item {{ Request::is('/contact') ? 'active' : '' }}">
              <a class="nav-link" href="contact">Contact</a>
            </li>
            <li class="nav-item {{ Request::is('/about') ? 'active' : '' }}">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">User</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>

  <div class="top">
      <h1 class="text-center">Welcome to TechBlog</h1>
  </div>
  <div class="middle">
      <div class="container">
          <p class="lead text-center">The right way to gain knowledge, share your knowledge and you 
      can be one of us and write your own articles for <span>FREE</span></p>
      </div>
  </div>
  <div class="bottom">
      <a href="" class="btn btn-default write">Write Articles</a>
      <a href="" class="btn btn-success read">Read Articles</a>
  </div>
</div>

	@yield('content')


	<!-- Footer -->
	<footer class="page-footer font-small cyan darken-3">

	  <!-- Footer Elements -->
	  <div class="container-fluid">

	  	<div class="top">
	  		<p class="lead text-center">Do not forget to follow us.</p>
	  	</div>

	    <!-- Grid row-->
	    <div class="row">

	      <!-- Grid column -->
	      <div class="col-md-12 py-5">
	        <div class="mb-5 flex-center">

	          <!-- Facebook -->
	          <a class="fb-ic">
	            <i class="fa fa-facebook-f"></i>
	          </a>
	          <!-- Twitter -->
	          <a class="tw-ic">
	            <i class="fa fa-twitter"></i>
	          </a>
	          <!-- Google +-->
	          <a class="gplus-ic">
	            <i class="fa fa-google-plus"></i>
	          </a>
	          <!--Linkedin -->
	          <a class="li-ic">
	            <i class="fa fa-linkedin"></i>
	          </a>
	          <!--Instagram-->
	          <a class="ins-ic">
	            <i class="fa fa-instagram"></i>
	          </a>
	          <!--Pinterest-->
	          <a class="pin-ic">
	            <i class="fa fa-youtube"></i>
	          </a>
	        </div>
	      </div>
	      <!-- Grid column -->
	    </div>
	    <!-- Grid row-->
	  </div>
	  <!-- Footer Elements -->
	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">© 2018 Copyright:
	    <a href="/">TechBlog</a>
	  </div>
	  <!-- Copyright -->

	</footer>
	<!-- Footer -->


		<!-- JQuery, Bootstrap CDN -->

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- My Own Scrips -->
	<script src="{{ asset('js/script.js') }}"></script>
	@yield('scripts')

</body>
</html>