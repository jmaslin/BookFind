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

Route::get('418', 'HomeController@auth');

Route::model('books', '\Bookfind\Book');
Route::model('courses', '\Bookfind\Course');
Route::model('schools', '\Bookfind\School');
Route::model('users', '\Bookfind\User');

Route::resource('books', 'BooksController');
Route::resource('users', 'UsersController');
Route::resource('schools', 'SchoolsController');
Route::resource('courses', 'CoursesController');

Route::resource('schools.courses', 'CoursesController');
Route::resource('schools.courses.books', 'BooksController');

Route::resource('courses', 'CoursesController@showCourses');

// Route::get('schools.courses.show', 'CoursesController@show');

Route::get('profile', 'UsersController@profile');
Route::get('profile/edit', 'UsersController@editProfile');

Route::get('/schools/{school}/courses/{course}', 'CoursesController@show');
Route::get('/schools/{school}/courses/{course}/books/{book}', 'BooksController@show');


// Route::bind('books', function($value, $route) {
// 	return Bookfind\Book::where('isbn', $value)->first();
// });

// Route::bind('schools', function($value, $route) {
// 	return Bookfind\School::where('domain', $value)->first();
// });

// Route::bind('schools', function($value, $route) {
// 	return Bookfind\School::where('name', $value)->first();
// });