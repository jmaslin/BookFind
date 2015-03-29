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

	public function students()
	{
		return $this->hasMany('Bookfind\User');
	}

	public function books()
	{
		return $this->hasManyThrough('Bookfind\Book', 'Bookfind\User', 'school_id', 'uploader_id');
	}

	public function courses()
	{
		return $this->hasMany('Bookfind\Course', 'school_id');
	}

}