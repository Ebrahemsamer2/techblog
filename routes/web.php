<?php


// Front Users Routes

Route::get('/', 'HomeController@index');

Route::get('/post/{slug}', 'HomeController@post');

Route::get('category/{slug}', 'HomeController@category_posts');

Route::get('/contact', 'ContactController@index')->middleware('auth');

Route::post('/contact', 'ContactController@mail')->middleware('auth');

Route::get('/user/{name}', 'HomeController@author_posts')->middleware('auth');

// Profile route
Route::get('/user/{name}/profile', 'HomeController@user_profile')->middleware('auth');

Route::get('/create_article', 'HomeController@create_article')->middleware('auth');




// Adding Comments and Replies

Route::post('/post', 'CommentController@store')->middleware('auth');

// Admin Routes  

Route::namespace('Admin')->group( function() {
	// users Routes

	Route::resource('/admin/users', 'UserController', ['except' => ['create', 'store']])->middleware('admin', 'auth');
	
	// Posts Routes

	Route::resource('/admin/posts', 'PostController')->middleware('admin', 'auth');

	// Categories Routes
	
	Route::resource('/admin/categories', 'CategoryController')->middleware('admin', 'auth');

	// Photos Routes 

	Route::resource('/admin/photos', 'PhotoController', ['only' => ['index', 'destroy'] ])->middleware('admin', 'auth');

	// Replies Routes

	Route::get('/admin/comments/replies', 'ReplyController@index')->middleware('admin', 'auth');

	Route::get('/admin/comments/{id}/reply', 'ReplyController@create')->middleware('admin', 'auth');

	Route::post('/admin/comments/reply', 'ReplyController@store')->middleware('admin', 'auth');

	Route::delete('/admin/comments/{id}', 'ReplyController@destroy')->middleware('admin', 'auth');

	Route::get('/admin/comments/replies/{id}/edit', 'ReplyController@edit')->middleware('admin', 'auth');

	Route::patch('/admin/comments/replies/{id}', 'ReplyController@update')->middleware('admin', 'auth');

	// Comments Routes

	Route::resource('/admin/comments', 'CommentController')->middleware('admin', 'auth');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function() {
	Auth::logout();
	return redirect('/');
})->middleware('auth');