<?php


// Route::get('post/{id}', 'PostController@show');



Route::namespace('Admin')->group( function() {

	Route::resource('/admin/users', 'UserController', ['except' => ['create', 'store']]);
	
	Route::resource('/admin/posts', 'PostController');

	Route::resource('/admin/categories', 'CategoryController');

	Route::resource('/admin/photos', 'PhotoController', ['only' => ['index', 'destroy'] ]);

	// Replies Routes

	Route::get('/admin/comments/replies', 'ReplyController@index');

	Route::get('/admin/comments/{id}/reply', 'ReplyController@create');

	Route::post('/admin/comments/reply', 'ReplyController@store');

	Route::delete('/admin/comments/{id}', 'ReplyController@destroy');

	Route::get('/admin/comments/replies/{id}/edit', 'ReplyController@edit');

	Route::patch('/admin/comments/replies/{id}', 'ReplyController@update');


	Route::resource('/admin/comments', 'CommentController');

	
	
	// Route::resource('/admin/comments/{id}/replies', 'ReplyController');
});

// Route::get('categories/{slug}', 'HomeController@category_posts');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
