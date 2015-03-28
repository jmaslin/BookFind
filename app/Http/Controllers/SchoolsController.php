<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Bookfind\School;
use \Bookfind\Book;

class SchoolsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$schools = School::all();

		return view('schools.list', ['schools' => $schools]);
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
		else 
		{
			$books = Book::all();
			return view('schools.profile', ['school' => $school, 'books' => $books]);
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
