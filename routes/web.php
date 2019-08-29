<?php

// Front Users Routes

Route::get('/', 'HomeController@index');

Route::get('/post/{slug}', 'HomeController@post');

Route::get('category/{slug}', 'HomeController@category_posts');

Route::get('/contact', 'ContactController@index')->middleware('auth', 'verified');

Route::post('/contact', 'ContactController@mail')->middleware('auth', 'verified');

Route::get('/user/{name}', 'HomeController@author_posts')->middleware('auth');

// Profile route
Route::get('/user/{id}/profile', 'UserController@user_profile')->middleware('auth', 'verified');
// profile edit route
Route::get('/user/{id}/profile/edit', 'UserController@edit_profile')->middleware('auth', 'verified');

Route::patch('/user/{id}/profile/edit', 'UserController@update_profile')->middleware('auth', 'verified');

// Post Routes
Route::get('/create_article', 'PostController@create_article')->middleware('auth', 'verified');

Route::post('/create_article', 'PostController@store')->middleware('auth', 'verified');




// Adding Comments and Replies

Route::post('/post', 'CommentController@store')->middleware('auth');

// Admin Routes  

Route::namespace('Admin')->group( function() {
	// users Routes

	Route::resource('/admin/users', 'UserController', ['except' => ['create', 'store']])->middleware('admin', 'auth', 'verified');
	
	// Posts Routes

	Route::resource('/admin/posts', 'PostController')->middleware('admin', 'auth', 'verified');

	// Categories Routes
	
	Route::resource('/admin/categories', 'CategoryController')->middleware('admin', 'auth', 'verified');

	// Photos Routes 

	Route::resource('/admin/photos', 'PhotoController', ['only' => ['index', 'destroy'] ])->middleware('admin', 'auth', 'verified');

	// Replies Routes

	Route::get('/admin/comments/replies', 'ReplyController@index')->middleware('admin', 'auth','verified');

	Route::get('/admin/comments/{id}/reply', 'ReplyController@create')->middleware('admin', 'auth','verified');

	Route::post('/admin/comments/reply', 'ReplyController@store')->middleware('admin', 'auth','verified');

	Route::delete('/admin/comments/{id}', 'ReplyController@destroy')->middleware('admin', 'auth','verified');

	Route::get('/admin/comments/replies/{id}/edit', 'ReplyController@edit')->middleware('admin', 'auth', 'verified');

	Route::patch('/admin/comments/replies/{id}', 'ReplyController@update')->middleware('admin', 'auth', 'verified');

	// Comments Routes

	Route::resource('/admin/comments', 'CommentController')->middleware('admin', 'auth', 'verified');

});


Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function() {
	Auth::logout();
	return redirect('/');
})->middleware('auth');