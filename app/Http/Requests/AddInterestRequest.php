<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInterestRequest extends FormRequest
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
            'interest' => 'required | min:5',
        ];
    }

    public function messages()
    {
        return [
            'interest.required' => 'El interés es requerido',
            'interest.min' => 'Agregar un interés válido',
        ];
    }
}
