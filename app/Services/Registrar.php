<?php namespace Bookfind\Services;

use Bookfind\User;
use Bookfind\School;

use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
	  $school_domain = substr($data['email'], strpos($data['email'], "@")+1);
	  $school_name = substr($school_domain, 0, strpos($school_domain, "."));

	  $school = School::firstOrCreate([
	  	'name' => $school_name,
	  	'domain' => $school_domain
	  ]);

		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'school_id' => $school['id']
		]);
	}

}