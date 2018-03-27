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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => 'web'], function () {
    // your routes here

	Route::get('/','FrontController@index')->name('home');
	Route::get('/login','LoginController@getLogin')->name('login');
	Route::post('/login','LoginController@checkLogin');
	Route::get('/logout', 'LoginController@logout')->name('logout');
	Route::get('/register', 'LoginController@showRegisterForm')->name('register');
	Route::post('/register','LoginController@register')->name('registered');

	Route::get('/singleCategory/{id}','FrontController@singleCategory');
	Route::get('/author','FrontController@author')->name('author');
	Route::get('/categories/themes/{id}','FrontController@themes');
	Route::get('/categories/themes/theme/{id}','FrontController@singleThread');



	// Comments 


	// AJAX - Close thread
	Route::get('/closeThread/{id}','ThreadController@close')->name('closeThread');
	// AJAX - get Comments
	Route::get('/comments/{id}','ThreadController@getComments');

	Route::get('/comments/{id}/edit','ThreadController@getComment')->name('editComent');

	Route::post('/comments/edit/{id}','ThreadController@updateComment')->name('commentEdit');

	// AJAX - insert comment
	Route::get('/insertComment','ThreadController@insertComments');

	// Edit Comment
	//Route::get('/comments/{id}/edit','ThreadController@edit')->name('comments.edit');
	Route::get('/comments/{id}/replay','ThreadController@replay');


	// Posts

	Route::get('/posts/createPost','PostController@show')->name('showFormForCreatePost');
	Route::post('/posts/insert','PostController@insert')->name('insertPost');

	// Pictures

	Route::get('/galery','FrontController@galery');

	// Anketa

	Route::get('/author/anketa','FrontController@insertAnswer');


	// Log Activity
});

Route::group(['middleware' => 'Admin','prefix'=>'admin/'], function(){

	Route::get('/users','Admin\UsersController@index');
    Route::get('/{controller}/{action}/{id?}',function ($controller, $action, $id = null){
    	$naziv = ucfirst($controller);
    	return App::call('App\Http\Controllers\Admin\\'.$naziv.'Controller@' . $action , ['id' => $id]);
    })->name('crud_route');
    Route::post('/{controller}/{action}/{id?}',function ($controller, $action, $id = null){
    	$naziv = ucfirst($controller);
    	return App::call('App\Http\Controllers\Admin\\'.$naziv.'Controller@' . $action , ['id' => $id]);
    })->name('crud_route');
});