<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

use ClientMessage;

class RegisterPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
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
            'name' => 'required|max:255',
			'email' => 'required|max:255|email|unique:users',
            'password' => 'required|confirmed|min:8'
		];
	}

    /**
     * Get the failed validation info that apply to the request.
     *
     *  @return array
     */
    public  function response(array $errors)
    {
        // If you want to customize what happens on a failed validation,
        // override this method.
        // See what it does natively here:
        // https://github.com/laravel/framework/blob/master/src/Illuminate/Foundation/Http/FormRequest.php
        return ClientMessage::create_error($errors);
    }

}
