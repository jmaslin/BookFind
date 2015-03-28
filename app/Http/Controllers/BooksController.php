<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use Request;

use \Bookfind\Book;

class BooksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = Book::all(); // Temporary

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
	public function show(Book $book)
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