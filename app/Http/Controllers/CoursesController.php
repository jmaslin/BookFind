<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Bookfind\School;
use \Bookfind\Course;

use Auth;
use Session;

class CoursesController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('school');

		// todo: auth each request with user school id?
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($school)
	{
		$school = School::whereDomain($school.'.edu')->first();

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
		// Todo: fix $school right now ignored cause MemberOfSchool middleware validates school
		$course = Course::find($course);
		// dd($course->school);

		if ($course->school == Session::get('school'))
		{
			$userCourses = Auth::user()->courses;
			$hasCourse = False;
			foreach ($userCourses as $userCourse) {
				if ($userCourse['id'] == $course['id']) {
					$hasCourse = True;
					break;
				}
			}

			return view('courses.show', ['course' => $course, 'school' => $school, 'user' => Auth::user(), 'hasCourse' => $hasCourse]);
		}
		else
		{
			return redirect()->action('HomeController@index');	
		}
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
