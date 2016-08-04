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
            'user_id' => 'integer | required | exists:users,id',
            'photography_id' => 'integer | exists:photographies,id',
            'name' => 'alpha | min:5 | required | unique:sections',
            'content' => 'min:50 | required',
        ];
    }
}
