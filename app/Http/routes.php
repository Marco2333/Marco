<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','IndexController@index' );


Route::get('detail/{id}','IndexController@detail' );

Route::get('archive','IndexController@archive' );

Route::get('resume','IndexController@resume' );

Route::get('contact','IndexController@contact' );

Route::any('mail','IndexController@mail');

Route::get('category/{id}','IndexController@category');

Route::get('search','IndexController@search');

Route::get('admin','AdminController@index');

Route::any('submitBlog','AdminController@submitBlog');

Route::any('login',function() {
	return view('Admin/login');
});
Route::any('toLogin','AdminController@toLogin');
Route::get('logout','AdminController@logout');

Route::get('newBlog','AdminController@newBlog');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
