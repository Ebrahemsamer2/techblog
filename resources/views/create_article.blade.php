<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Create Article | TechBlog</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,700&display=swap" rel="stylesheet">

	<!-- Font Awesome CDN -->
	<script src="https://use.fontawesome.com/9da1677a46.js"></script>

	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#postcontent',
            height: 500,
            plugins: 'link',
        });
    </script>

	<style>

		.tox-tinymce html {
			background-color: #101010 !important;
			color: #fff !important;
		}

	/* Colors : #3b8a13 => green,#791313 => red, #bfbfbf => white */
		body {
			background: #101010;
			color: #bfbfbf;
			font-family: 'Lato', sans-serif;
		}
		
		.intro a.btn-default {
			color: #bfbfbf;
			background: #791313;
			border-color: #791313;
		}
		.intro a.btn-default:hover {
			color: #fff;
		}
		.intro {
			margin-top: 50px;
			font-weight: 300;
		}
		.intro h1 {
			letter-spacing: 5px;
		}
		.intro p.lead {
			margin-top: 25px;
			font-size: 30px;

		}


		.article-form {
			margin-top: 30px;
			margin-bottom: 100px;
		}
		.article-form form input,
		.article-form form textarea,
		.article-form form select,
		.article-form form input:focus,
		.article-form form textarea:focus,
		.article-form form select:focus,
		.article-form form select:active {
			background: #151414;
			color: #fff;
		}

		.article-form .btn-default {
			color: #bfbfbf;
			background: #791313;
			border-color: #791313;
		}

		.article-form .btn-default:hover {
			color: #fff;
		}
		.article-error {
			color: red;
			font-size: 18px;
			margin-left: 10px;
			margin-top: 10px;
		}

/* Footer */

footer .top p {
	font-size: 25px;
	font-weight: lighter;
	padding-top: 20px;
}

footer .container-fluid {
	background: #232323;
}

footer .footer-copyright {
	color: #bfbfbf;
	background: #1b1b1b;
}
.pb-5, .py-5 {
    padding-bottom: 0!important;
    padding-top: 2rem!important;
}

footer .container-fluid div div div a i {
	font-size: 30px;
	margin-left: 40px;
	color: #fff;
}
footer .container-fluid div div div a i.fa-facebook-f {
	color: #3b5998 ;
}
footer .container-fluid div div div a i.fa-google-plus {
	color: #dc4e41 ;
}
footer .container-fluid div div div a i.fa-linkedin {
	color: #0077b5 ;
}
footer .container-fluid div div div a i.fa-twitter {
	color: #55acee ;
}
footer .container-fluid div div div a i.fa-instagram {
	color: #517fa4 ;
}
footer .container-fluid div div div a i.fa-youtube {
	color: #b31217 ;
}

footer .flex-center {
	text-align: center;
	margin: auto;
}

	</style>
</head>
<body>

	<div class="intro">
		<div class="container">
			<a href="/" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to Home</a>
			<h1 class="text-center">Welcome To TechBlog</h1>
			<p class="lead text-center">You're ready to create a new article, but before you start creating
			articles note that you won't able to delete it.
			</p>
			<p class="lead text-center">Admin only has the permission to make this action.</p>
		</div>
	</div>
	<div class="article-form">
		
		<div class="container">
			
			@if(Session::get('created_post'))
				<div class="alert alert-success">
					{{ Session::get('created_post') }}
				</div>
			@endif
			@include('includes.form_error')
			{!! Form::open(['method' => 'POST', 'action' => 'PostController@store', 'files' => true]) !!}
				<div class="form-group">
					{!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required','autocomplete' => 'off', 'placeholder' => 'Post Title ']) !!}
					<p class="article-error"></p>
				</div>
				<div class="form-group">
					{!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Post Content', 'id' => 'postcontent']) !!}
					<p class="article-error"></p>
				</div>
				<div class="form-group">
					{!! Form::select('category_id',\App\Category::pluck('name', 'id'),null, ['class' => 'form-control', 'required' => 'required']) !!}
					<p class="article-error"></p>
				</div>
				<div class="form-group">
					{!! Form::label('photo_id','Post Image ') !!}
					{!! Form::file('photo_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<p class="article-error"></p>
				</div>
				{!! Form::submit('Create Article', ['class' => 'btn btn-default']) !!}
			{!! Form::close() !!}
		</div>

	</div>

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

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script>


		// Article Validation

		$(".article-form form").submit(function() {

			let post_title = $(".article-form form input[name='title']").val();
			let post_content = $(".article-form form textarea[name='content']").val();
			let post_category = $(".article-form form select[name='category_id']").val();
			let post_image = $(".article-form form input[name='photo_id']").val();

			if(post_title.length < 20) {
				$(".article-form form input[name='title'] + p").text("Title must be more than 20 Character.");
				return false;
			}else {
				$(".article-form form input[name='title'] + p").text("");
			}

			if(post_title.length > 100) {
				$(".article-form form input[name='title'] + p").text("Title must be less than 100 Character.");
				return false;
			}else {
				$(".article-form form input[name='title'] + p").text("");
			}

			if(post_content.length < 100) {
				$(".article-form form textarea[name='content'] + p").text("Content must be more than 100 Character.");
				return false;
			}else {
				$(".article-form form textarea[name='content'] + p").text("");
			}

			if(post_content.length > 1000) {
				$(".article-form form textarea[name='content'] + p").text("Content must be less than 1000 Character.");
				return false;
			}else {
				$(".article-form form textarea[name='content'] + p").text("");
			}

			if(post_category < 0) {
				$(".article-form form select[name='category_id'] + p").text("Wrong Select");
				return false;
			}else {
				$(".article-form form select[name='category_id'] + p").text("");
			}

			if(post_image.length <= 0) {
				$(".article-form form input[name='photo_id'] + p").text("Image is required");
				return false;
			}else {
				$(".article-form form input[name='photo_id'] + p").text("");
			}
			return true;
		});


	</script>

</body>
</html>