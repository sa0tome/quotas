<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrinterRequest extends FormRequest
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
            'name'         => 'required',
            'machine_name' => 'required',
            'rule_id'      => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'O nome não pode ficar em branco',
            'machine_name.required' => 'O nome de máquina não pode ficar em branco',
        ];
    }
}