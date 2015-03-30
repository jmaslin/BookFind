<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Bookfind\School;
use Auth;


class CoursesController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function __construct()
	{
		$this->middleware('auth');

		// todo: auth each request with user school id?
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($school)
	{
		// user is a member of this school
		if (Auth::user()->school_id == $school['id'])	
		{
			return view('courses.list', ['school' => $school]);
		}
		else
			return redirect()->action('HomeController@auth');	

	}	

	public function showCourses()
	{
		$school = School::find(Auth::user()->school_id);

		return view('courses.list', ['school' => $school]);
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
	public function show($school, $course)
	{
		if ( (Auth::user()->school_id == $school['id']) && ($course->school->id == $school->id) )
		{
			return view('courses.show', ['course' => $course, 'school' => $school]);
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
