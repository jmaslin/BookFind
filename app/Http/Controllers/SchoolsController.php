<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Bookfind\School;
use \Bookfind\Book;

use Auth;

class SchoolsController extends Controller {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		if (isProper())
		{
			$schools = School::all();
			return view('schools.list', ['schools' => $schools]);
		}
		else {
			$school = School::find(Auth::user()->school_id);
			return redirect()->action('SchoolsController@show', ['school' => $school]);
		}
		// else
		// 	return redirect()->action('HomeController@auth');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(School $school)
	{

		if (School::where('id', '=', $school['id'])->first() == null) 
		{
			abort(404);
		}
		else if (Auth::user()->school_id == $school->id)
		{
			return view('schools.profile', ['school' => $school]);
		}
		else
			return redirect()->action('HomeController@auth');		

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

function isProper() 
{
	if ( Auth::user()->user_type_id == '100')
	{
		return true;
	}
	else
	{
		return false;
	}
}
