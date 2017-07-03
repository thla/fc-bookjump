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

Route::get('change-password', function() {return view('user.change-password'); });
Route::post('change-password', 'Auth\UpdatePasswordController@update');
Route::post('change-settings', 'Auth\UpdatePasswordController@location');

Route::get('books', 'BooksController@index');