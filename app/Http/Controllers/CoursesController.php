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
		$this->school = Session::get('school');

		// todo: auth each request with user school id?
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($domain)
	{

		return view('courses.list', ['domain' => $domain, 'school' => Session::get('school')]);
	}	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($domain)
	{	
		$course = new Course;

		return view('courses.create', ['course' => $course, 'domain' => $domain, 'school' => $this->school]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreCoursePostRequest $request, $domain) 
	{
		$course = Course::create([
			'name' => ucwords($request->input('name')),
			'shortcode' => $request->input('shortcode'),
			'reference_number' => $request->input('reference_number'),
			'school_id' => Session::get('school')->id
		]);

		$course = Course::findOrFail($course->id);
		// dd($course->name);
		// dd($course->id);
		// return redirect()->action('CoursesController@show', $domain, $course->id);

		return view('courses.show', ['course' => $course, 'domain' => $domain, 'new' => 'true', 'hasCourse' => False]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($domain, $course)
	{

		// dd($school);
		// Todo: fix $school right now ignored cause MemberOfSchool middleware validates school
		// $school = Session::get('school');
		$course = Course::find($course);

		if ($course->school == Session::get('school'))
		{

			$userCourses = Auth::user()->courses;
			$hasCourse = False;
			foreach ($userCourses as $userCourse) {
				if ($userCourse['id'] == $course->id) {
					$hasCourse = True;
					break;
				}
			}

			return view('courses.show', ['course' => $course, 'domain' => $domain, 'user' => Auth::user(), 'hasCourse' => $hasCourse]);
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
