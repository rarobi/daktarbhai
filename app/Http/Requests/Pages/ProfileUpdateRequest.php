<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|min:2|max:32',
            'gender'      => [Rule::in(['male', 'female']),],
            'blood_group' => 'nullable',[Rule::in(['O+','A+','B+','AB+','O-','A-','B-','AB-','other'])]
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Name field is required',
            'name.max'      => 'Name field not more than 15 characters'
        ];
    }
}
