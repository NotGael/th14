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
            'user_id' => 'num | required | max:10000 | exists:users,id',
            'photography_id' => 'num | max:10000 | exists:photographies,id',
            'name' => 'required|min:5',
            'content' => 'alpha-num | required | min:50',
            'slug' => 'alpha-num'
        ];
    }
}
