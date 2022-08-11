<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppointmentConfirmRequest extends FormRequest
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
                'appointment_for' => ['required', Rule::in(['myself', 'others'])
                                     ],
                'visit_type'      => ['required', Rule::in(['first_time', 'return'])
                ],
                'contact_to_whom' => ['required', Rule::in(['me','patient', 'both'])],
                'contact_number'  => 'required|regex:/^[1-9][0-9]{1,10}$/'
        ];
    }
}
