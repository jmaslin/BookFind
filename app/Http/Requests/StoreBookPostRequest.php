<?php namespace Bookfind\Http\Requests;

use Bookfind\Http\Requests\Request;

class StoreBookPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

		// todo: error check if valid link, isbn, name

		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|max:128',
			'isbn' => 'min:10|max:20',
			'url' => 'required|url',
		];
	}

}
