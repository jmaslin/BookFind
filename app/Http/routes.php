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


// Route::get('auth/login', function()
// {
// 	 return view('auth.login');
// });

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::controllers([
    'auth' => '\Bookfind\Http\Controllers\Auth\AuthController',
    'password' => '\Bookfind\Http\Controllers\Auth\PasswordController',
]);

Route::group(['domain' => '{school}.bookfind.app'], function()
{

	// Route::get('/', array('school' => '{school}', 
	// 	'uses' => 'CoursesController@index'));

	Route::resource('courses', 'CoursesController');

	// Route::bind('course', function($value, $route) {
	// 	return Course::find($value)->first();
	// });

	// Route::get('/', function($school)
	// {
	// 	return "Welcome to Bookfind for $school!";
	// });


});

// Route::get('/', function()
// {
// 	return "Welcome to Bookfind!";

// });


// use Bookfind\School;

// Route::get('/', 'WelcomeController@index');
Route::get('/', 'HomeController@index');

// Route::model('school', 'Bookfind\School');

// Route::resource('school', 'SchoolsController');

// Route::bind('school', function($value, $route) {
// 	return School::whereDomain($value)->first();
// });


// Route::model('course', 'Bookfind\Course');

// Route::get('/schools/{school}', function($school)
// {
// 	return $school;
// });

// Route::get('home', 'HomeController@index');


// Route::get('418', 'HomeController@auth');

// Route::model('books', '\Bookfind\Book');
// Route::model('courses', '\Bookfind\Course');
// Route::model('schools', '\Bookfind\School');
// Route::model('users', '\Bookfind\User');

// Route::resource('books', 'BooksController');
// Route::resource('users', 'UsersController');
// Route::resource('courses', 'CoursesController');

// Route::resource('schools.courses', 'CoursesController');
// Route::resource('schools.courses.books', 'BooksController');

// Route::resource('courses', 'CoursesController@showCourses');

// Route::get('profile', 'UsersController@profile');
// Route::get('profile/edit', 'UsersController@editProfile');

// Route::get('/schools/{school}/courses/{course}', 'CoursesController@show');
// Route::get('/schools/{school}/courses/{course}/books/{book}', 'BooksController@show');

// Route::post('books/search', 'BooksController@searchBooks');

Route::filter('csrf', function()
{
   $token = Request::header('X-CSRF-Token') ?: Input::get('_token');
   if (Session::token() !== $token) {
      throw new Illuminate\Session\TokenMismatchException;
   }
});

// Route::bind('books', function($value, $route) {
// 	return Bookfind\Book::where('isbn', $value)->first();
// });



// Route::bind('schools', function($value, $route) {
// 	return Bookfind\School::where('name', $value)->first();
// });