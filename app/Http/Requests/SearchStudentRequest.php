<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // SBD thường là chữ số/chuỗi ký tự; điều chỉnh regex nếu SBD có format khác
            'sbd' => ['required', 'regex:/^[0-9]{8}$/'],
        ];
    }

    public function messages()
    {
        return [
            'sbd.required' => 'Please enter the registration number.',
            'sbd.regex' => 'Invalid registration number format.',
        ];
    }
}
