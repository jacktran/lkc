<?php
namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Response;


class StoreToolPostRequest extends Request {

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
			'name' => 'required|max:100|unique:tools',
            'name_url' => 'required|max:100|unique:tools',
            'features' => 'max:250',
            'description' => 'max:250',
		];
	}

    /**
     * Get the failed validation info that apply to the request.
     *
     *  @return array
     */
    public function response(array $error)
    {
        // If you want to customize what happens on a failed validation,
        // override this method.
        // See what it does natively here:
        // https://github.com/laravel/framework/blob/master/src/Illuminate/Foundation/Http/FormRequest.php
        return Response()->json($error);
    }

}
