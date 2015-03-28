<?php namespace Bookfind;

use Illuminate\Database\Eloquent\Model;

class School extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'schools';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'domain'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}