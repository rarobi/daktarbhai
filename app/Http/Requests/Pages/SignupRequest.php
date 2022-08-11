<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'email'                => 'required|email|max:255',
//            'mobile'               => 'required|min:8|regex:/^(?:\+?88)?[0-9]+[15-9]\d{6}$/',
         //   'mobile'               => 'required|min:8',

            'password'             => 'required|min:6',
            'checkbox'             => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => trans('validation.custom.frontend.email.required'),
            'email.email'   => trans('validation.custom.frontend.email.email'),
            'password.required' => trans('validation.custom.frontend.password.required'),
            'password.min' => trans('validation.custom.frontend.password.min'),
//            'mobile.required' => trans('validation.custom.frontend.mobile.required'),
//            'mobile.regex'    => trans('validation.custom.frontend.mobile.regex'),
            'checkbox.required' => trans('validation.custom.frontend.checkbox.required'),
        ];
    }
}
