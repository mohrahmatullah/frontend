<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'fullname'           => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u|min:3',
            'email'           => 'required|email',
            'gender'           => 'required',
            'dob'           => 'required'
        ];
    }
}
