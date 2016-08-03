<?php
// php artisan make:request EditReminderRequest
namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditPostRequest extends Request
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
            'section_id' => 'integer | exists:sections,id',
            'title' => 'min:10 | max:50',
            'slug' => 'alphanum',
            'content' => 'min:50',
            'online' => 'boolean',
            'published_at' => 'date',
        ];
    }
}
