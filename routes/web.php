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

Route::get('/', function () {
    return redirect('/home');
});



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



Route::group(['middleware'=>'admin'], function() {

	Route::resource('/admin/users', 'AdminUsersController');
	
	Route::resource('/admin/posts', 'AdminPostsController');

	Route::resource('/admin/categories', 'AdminCategoriesController');

	Route::resource('/admin/media', 'AdminMediaController');

	Route::resource('/admin/comments', 'AdminCommentsController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('categories/{slug}', 'HomeController@category_posts');

