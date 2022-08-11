<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class AskDoctorRequest extends FormRequest
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
            'description'                => 'required|min:40|max:1000'
        ];
    }

    public function messages()
    {
       return [
           'description.required'  => trans('validation.custom.frontend.description.required'),
           'descripiton.min'       => trans('validation.custom.frontend.description.min')
       ];
    }
}
