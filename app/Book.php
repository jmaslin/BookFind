<?php namespace Bookfind;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function creator()
	{
		return $this->belongsTo('Bookfind\User', 'uploader_id');
	}

}
