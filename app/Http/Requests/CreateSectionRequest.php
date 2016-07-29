<?php
//php artisan make:request CreatePhotographyRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSectionRequest extends Request
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
            'user_id' => 'numeric | required | max:10000 | exists:users,id',
            'photography_id' => 'numeric | max:10000 | exists:photographies,id',
            'name' => 'alpha | required | min:5 | unique:sections',
            'content' => 'alpha-num | required | min:50',
            'slug' => 'alpha-num',
            'image_name' => 'alpha_num | unique:photographies',
            'image_type' => 'numeric',
            'online' => 'boolean',
            'image' => 'required | mimes:jpeg,jpg,bmp,png | max:10000',
        ];
    }
}
