<?php
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;

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

Route::get('/', 'AlbumsController@index');
/******* Album Routes **********/
Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create');
Route::post('/albums/store', 'AlbumsController@store');
Route::get('/albums/{id}' , 'AlbumsController@show');

/******* Photo Routes **********/
Route::get('/photos/create/{id}' , 'PhotosController@create');
Route::post('/photos/store', 'PhotosController@store');
Route::get('/photos/{id}' , 'PhotosController@show');
Route::delete('/photos/{id}' , 'PhotosController@destroy');


