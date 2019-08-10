<?php


// Route::get('post/{id}', 'PostController@show');



Route::namespace('Admin')->group( function() {

	Route::resource('/admin/users', 'UserController', ['except' => ['create', 'store']]);
	
	Route::resource('/admin/posts', 'PostController');

	Route::resource('/admin/categories', 'CategoryController');

	Route::resource('/admin/photos', 'PhotoController', ['only' => ['index', 'destroy'] ]);

	Route::resource('/admin/comments', 'CommentController');

	Route::resource('admin.comments.replies', 'ReplyController');

});

// Route::get('categories/{slug}', 'HomeController@category_posts');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
