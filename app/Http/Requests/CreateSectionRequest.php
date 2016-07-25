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
            'user_id' => 'num | required | max:10000 | exists:users,id',
            'photography_id' => 'num | required | max:10000 | exists:photographies,id',
            'name' => 'alpha | required | min:5 | unique:sections',
            'content' => 'alpha-num | required | min:50',
        ];
    }
}
