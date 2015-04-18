<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use Request;

use \Bookfind\Book;
use \Bookfind\Course;
use \Bookfind\School;

use Auth;
use Session;

use Bookfind\Services\GoogleBooks;


class BooksController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->school = Session::get('school');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($domain)
	{

		// dd($domain);
		// $school = School::find(Auth::user()->school_id);
		// $books = $school->books;	
		
		return redirect()->action('CoursesController@index', $domain);
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
	public function show($domain, $course, $book)
	{
		$book = Book::find($book);


		if ($book->course->id == $course) {
			return view('books.profile', ['book' => $book]);
		} else {
			return error('404');
		}

		// Need to make sure book part of valid school/course for user auth'd (middleware)

		$bookSearch = new GoogleBooks;


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($domain, $courseId, $bookId)
	{
		$course = Course::findOrFail($courseId);
		$book = Book::findOrFail($bookId);

		if ($book->course == $course && $book->course->school == $this->school) {
			return view('books.edit', ['book' => $book, 'domain' => $domain]);		
		} else {
			dd("Invalid request.");
		}

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($school, $courseId, $bookId)
	{	
		$book = Book::findOrFail($bookId);

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

	public function searchBooks()
	{
		$searchParam = Request::input('search');

		// for AJAX search requests when selecting book
		$bookSearch = new GoogleBooks;

   	$opt_params = array(
      'alt' => "json"
    );

    $bookSearch->results = $bookSearch->get($searchParam, $opt_params);

    // $newResults = array();

    // foreach ($results['modelData']['items'] as $item) {
    // 	array_push($newResults, $item);

    // 	// $newResults[] = array_values($item['volumeInfo']);

    // }	

    // echo gettype($results);

    // echo var_dump($bookSearch->results);
    $serial = serialize($bookSearch->results);
    echo $serial;



    // echo json_encode($results['modelData']['items'][0], JSON_PRETTY_PRINT);

    // echo json_encode($newResults, JSON_PRETTY_PRINT);

	}

}

function isProperSchool() 
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