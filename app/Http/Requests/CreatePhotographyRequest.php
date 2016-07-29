<?php
//php artisan make:request CreatePhotographyRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePhotographyRequest extends Request
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
            'image_name' => 'alpha_num | required | unique:photographies',
            'image_type' => 'num',
            'online' => 'boolean',
            'image' => 'required | max:10000',
        ];
    }
}
