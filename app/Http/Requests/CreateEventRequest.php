<?php
// php artisan make:request EditReminderRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEventRequest extends Request
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
            'section_id' => 'integer | required | exists:sections,id',
            'name' => 'min:10 | max:50 | required',
            'slug' => 'alphanum',
            'content' => 'min:10 | required',
            'start' =>'date | required',
            'end' =>'date',
        ];
    }
}
