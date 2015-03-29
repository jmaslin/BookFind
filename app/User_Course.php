<?php namespace Bookfind;

use Illuminate\Database\Eloquent\Model;

class User_Course extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user__courses';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'course_id'];

	public function info()
	{
		return $this->hasOne('Bookfind\Course', 'id', 'course_id');
	}



}
