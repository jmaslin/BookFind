<?php namespace Bookfind\Http\Requests;

use Bookfind\Http\Requests\Request;

class StoreCoursePostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// todo: error check if valid info?

		return true;	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|max:128',
			'shortcode' => 'required|max:10',
			'crn' => 'optional',
		];
	}

}
