<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
            'name'                => 'required|min:2|max:32',
            'email'               => 'required|email|max:255',
            'subject'             => 'required|min:2|max:100',
            'description'         => 'required|min:14|max:1000',
            'feedback_type'       => ['required', Rule::in(['contact', 'health-package']),
                                        ]
        ];
    }
    public function messages()
    {
        return [
            'description.required'  => 'Your message is required.',
            'description.min'       => 'Your message must be at least 14 charcters.'
        ];
    }
}
