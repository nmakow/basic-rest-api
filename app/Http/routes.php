<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/posts', 'PostsController@index');
Route::get('/posts/{id}', 'PostsController@show');

Route::post('/posts', 'PostsController@create');

Route::put('/posts/{id}', 'PostsController@update');

Route::delete('/posts/{id}', 'PostsController@destroy');