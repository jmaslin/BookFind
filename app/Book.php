<?php namespace Bookfind;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $table = 'books';

	protected $fillable = ['name', 'isbn', 'url', 'course_id'];


	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function creator()
	{
		return $this->belongsTo('Bookfind\User', 'uploader_id');
	}

	public function course()
	{
		return $this->belongsTo('Bookfind\Course');
	}

}
