<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/contact', function() {
// 	$data = [
// 		'title' => 'User Contact',
// 		'content' => ''
// 	];
// 	Mail::send('emails.contact', $data, function($message) {
// 		$message->to('ebrahemsamer2@gmail.com', 'Hima')->subject('Contact');
// 	});
// });


Route::get('post/{id}', 'PostController@show');



Route::namespace('Admin')->group( function() {

	Route::resource('/admin/users', 'UserController', ['except' => ['create', 'store']]);
	
	Route::resource('/admin/posts', 'PostController');

	Route::resource('/admin/categories', 'CategoryController');

	Route::resource('/admin/photos', 'PhotoController', ['except' => ['create', 'store'] ]);

	Route::resource('/admin/comments', 'CommentController');

	Route::resource('admin.comments.replies', 'ReplyController');

});

// Route::get('categories/{slug}', 'HomeController@category_posts');

