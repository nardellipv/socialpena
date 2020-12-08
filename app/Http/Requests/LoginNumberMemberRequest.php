<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginNumberMemberRequest extends FormRequest
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
            'number_member' => 'required | integer',
        ];
    }
    public function messages()
    {
        return [
            'number_member.required' => 'El campo Número de socio es requerido',
            'number_member.integer' => 'El campo Número de socio debe ser numérico',
        ];
    }
}
