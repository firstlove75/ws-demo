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

Route::get('/', function () {
    return view('welcome');
});

Route::get('category', 'CategoryController@index');
Route::get('product', 'ProductController@index');
Route::get('category/add', function () {
	$categories = app('App\Category')::all();
	return view('welcome', ['categories' => $categories]);
});
Route::post('category/add', 'CategoryController@add');
Route::get('product/add', function () {
	$categories = app('App\Category')::all();
	return view('welcome', ['categories' => $categories]);
});
Route::post('product/add', 'ProductController@add');
