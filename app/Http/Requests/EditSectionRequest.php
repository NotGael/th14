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
            'user_id' => 'integer | exists:users,id',
            'photography_id' => 'integer | exists:photographies,id',
            'name' => 'alpha | min:5 | unique:sections',
            'content' => 'min:50',
        ];
    }
}
