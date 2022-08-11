<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            'email'                => 'required|email|max:255'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.custom.frontend.email.required'),
            'email.email'   => trans('validation.custom.frontend.email.email')
        ];
    }
}
