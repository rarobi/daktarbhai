<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
    /*public function rules()
    {
        return [
            'email'                => 'required|max:255',
//            'email'                => 'required|email|max:255',
            'password'             => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('validation.custom.frontend.email.required'),
            'email.email'   => trans('validation.custom.frontend.email.email'),
            'password.required' => trans('validation.custom.frontend.password.required')
        ];
    }
    */
    public function rules()
    {
        return [
            'email_phone'                => 'required|max:255',
//            'email'                => 'required|email|max:255',
            'password'                   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email_phone.required' => trans('validation.custom.frontend.email.required'),
            'email_phone.email'   => trans('validation.custom.frontend.email.email'),
            'password.required' => trans('validation.custom.frontend.password.required')
        ];
    }

}
