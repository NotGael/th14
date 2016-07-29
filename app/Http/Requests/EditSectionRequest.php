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
            'photography_id' => 'numeric | max:10000 | exists:photographies,id',
            'name' => 'min:5',
            'content' => 'min:50',
            'slug' => 'alpha-num'
        ];
    }
}
