<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            //'id' => ['required', 'exists:students,id'],
            'phone' => ['sometimes','required', 'starts_with:010,015,012,011', "digits:11"],
            'name'=>['sometimes','required']
        ];
    }
}
