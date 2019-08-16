<?php


// Front Users Routes

Route::get('/', 'HomeController@index');

Route::get('/post/{slug}', 'HomeController@post');

Route::get('category/{slug}', 'HomeController@category_posts');

Route::get('/contact', 'ContactController@index');

Route::post('/contact', 'ContactController@mail');



// Adding Comments
Route::post('/post', 'CommentController@store');

// Admin Routes  

Route::namespace('Admin')->group( function() {
	// users Routes

	Route::resource('/admin/users', 'UserController', ['except' => ['create', 'store']]);
	
	// Posts Routes

	Route::resource('/admin/posts', 'PostController');

	// Categories Routes
	
	Route::resource('/admin/categories', 'CategoryController');

	// Photos Routes 

	Route::resource('/admin/photos', 'PhotoController', ['only' => ['index', 'destroy'] ]);

	// Replies Routes

	Route::get('/admin/comments/replies', 'ReplyController@index');

	Route::get('/admin/comments/{id}/reply', 'ReplyController@create');

	Route::post('/admin/comments/reply', 'ReplyController@store');

	Route::delete('/admin/comments/{id}', 'ReplyController@destroy');

	Route::get('/admin/comments/replies/{id}/edit', 'ReplyController@edit');

	Route::patch('/admin/comments/replies/{id}', 'ReplyController@update');

	// Comments Routes

	Route::resource('/admin/comments', 'CommentController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
