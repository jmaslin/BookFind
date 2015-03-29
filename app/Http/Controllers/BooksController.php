<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use Request;

use \Bookfind\Book;
use \Bookfind\Course;
use \Bookfind\School;

use Auth;

class BooksController extends Controller {

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
		if (isProperGroup())
		{
			$books = Book::all(); // Temporary
			// return view('books.list', ['books' => $books]);
		}
		else
		{
			$school = School::find(Auth::user()->school_id);
			$books = $school->books;	
		}
		return view('books.list', ['books' => $books]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$book = new Book;

		return view('books.create', ['book' => $book]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreBookPostRequest $request) 
	{	

		$book = Book::create([
			'name' => ucwords($request->input('name')),
			'isbn' => $request->input('isbn'),
			'url' => $request->input('url'),
			'uploader_id' => Auth::user()->id
		]);

		return view('books.profile', ['book' => $book, 'new' => 'true']);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(School $school, Course $course, Book $book)
	{
		// $creator = Book::find($book->id)->creator;

		return view('books.profile', ['book' => $book]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit(Book $book)
	{
		$book = Book::findOrFail($book->id);

		return view('books.edit', ['book' => $book]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Book $book)
	{
		$book = Book::findOrFail($book->id);

		$book->fill(Request::all());
		$book->save();

		return view('books.profile', ['book' => $book]);
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

function isProperGroup() 
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