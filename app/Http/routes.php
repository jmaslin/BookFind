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

// Route::get('/', 'WelcomeController@index');
Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('schools', 'SchoolsController@index');
Route::get('books', 'BooksController@index');

Route::model('schools', '\Bookfind\School');
Route::model('books', '\Bookfind\Book');
Route::model('users', '\Bookfind\User');

// Route::resource('schools.books', 'BooksController');
Route::resource('schools', 'SchoolsController');
Route::resource('books', 'BooksController');
Route::resource('users', 'UsersController');

// Route::bind('books', function($value, $route) {
// 	return Bookfind\Book::where('isbn', $value)->first();
// });

Route::bind('schools', function($value, $route) {
	return Bookfind\School::where('domain', $value)->first();
});

// Route::bind('schools', function($value, $route) {
// 	return Bookfind\School::where('name', $value)->first();
// });