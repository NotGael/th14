<?php
// php artisan make:request EditSectionRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditSectionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'content' => 'alpha-num | required | min:50',
            'image' => 'required | mimes:jpeg,jpg,bmp,png | max:10000',
            'user_id' => 'num | required | max:10000 | exists:users,id',
        ];
    }
}
