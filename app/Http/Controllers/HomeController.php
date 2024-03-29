<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Bookfind\School;
use Auth;
use Session;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$domain = "";

		if ( Session::get('school') !== null ) {	

			$domain = str_replace(".edu", "", Session::get('school')->domain);

		} else {
			$domain = str_replace(".edu", "", Auth::user()->school->domain);
		}
	
		return view('app', ['domain' => $domain]);

		// if (Auth::user()) { 
		// 	$user = Auth::user();
		// }
		// return view('home', ['user' => $user]);

		// $school = School::find(Auth::user()->school_id);
		// return redirect()->action('SchoolsController@show', ['school' => $school]);
	}

	public function auth()
	{
		return view('errors.418');
	}
	
}
