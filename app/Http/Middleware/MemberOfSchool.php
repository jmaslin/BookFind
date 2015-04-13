<?php namespace Bookfind\Http\Middleware;

use Closure;
use Auth;
use Session;

use \Bookfind\School;


class MemberOfSchool {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$school = array_shift((explode(".",$_SERVER['HTTP_HOST'])));
		$school = School::whereDomain($school.'.edu')->first();

		Session::put('school', $school);

		if (Session::get('school') != Auth::user()->school)
		{
			return "Not proper school.";
		}

		return $next($request);
	}

}
