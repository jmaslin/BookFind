<?php namespace Bookfind\Http\Controllers;

use Bookfind\Http\Requests;
use Bookfind\Http\Controllers\Controller;

use Illuminate\Http\Request;

use \Bookfind\User;
use Auth;
	

class UsersController extends Controller {

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
			return view('users.list', ['users' => User::all() ]);
		else
			return redirect()->action('HomeController@auth');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $user)
	{

		// if ($user->id == Auth::user()->id) 
		if (isProperGroup()) 
			return view('users.profile', ['user' => $user]);
		else
			return redirect()->action('HomeController@auth');	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{
		if (isProperGroup()) 	
			return view('users.edit', ['user' => $user]);
		else
			return redirect()->action('HomeController@auth');	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return redirect('home');
	}

	public function profile()
	{
		$user = User::find(Auth::user()->id);
		return view('users.profile', ['user' => $user]);
	}

	public function editProfile()
	{
		$user = User::find(Auth::user()->id);
		return view('users.edit', ['user' => $user]);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function destroy($id)
	// {
	// 	//
	// }


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
