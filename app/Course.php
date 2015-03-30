<?php namespace Bookfind;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'courses';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'shortcode', 'school_id'];

	public function books()
	{
		return $this->hasMany('Bookfind\Book', 'course_id');
	}

	public function students()
	{
		return $this->hasMany('Bookfind\User_Course', 'course_id');
	}

	public function school()
	{
		return $this->belongsTo('Bookfind\School', 'school_id');
	}


}
