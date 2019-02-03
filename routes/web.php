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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/threads', 'ThreadsController@index');
Route::get('/threads/create', 'ThreadsController@create');
Route::get('/threads/{category}', 'ThreadsController@index');
Route::post('/threads', 'ThreadsController@store');
Route::get('/threads/{category}/{thread}', 'ThreadsController@show');
Route::delete('/threads/{category}/{thread}', 'ThreadsController@destroy');

Route::post('/threads/{category}/{thread}/replies', 'RepliesController@store');
Route::get('/threads/{category}/{thread}/replies', 'RepliesController@index');
Route::delete('/replies/{reply}', 'RepliesController@destroy');
Route::patch('/replies/{reply}', 'RepliesController@update');

Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');

Route::get('/profiles/{user}', 'ProfilesController@show');
