<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PhucTran
 * Date: 6/11/15
 * Time: 8:57 PM
 * To change this template use File | Settings | File Templates.
 */
namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class StorePLanguagePostRequest extends  Request
{
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
            'name' => 'required|max:50|unique:p_languages',
            'name_pattern' => 'required|max:20',
            'root_name' => 'required|max:50',
            'structure' => 'required',
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
