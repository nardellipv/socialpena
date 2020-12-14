<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'about' => 'required | min:10',
            'region_id' => 'required',
            'dni' => 'required | numeric',
            'phone' => 'required | numeric',
            'birth_date' => 'required | date',
            'number_member' => 'required | numeric',
        ];
    }
    public function messages()
    {
        return [
            'about.required' => 'El campo sobre mi es requerido',
            'about.min' => 'Es muy corto lo que escribiste sobre ti',
            'region_id.required' => 'El campo Localidad es requerido',
            'dni.required' => 'El campo DNI es requerido',            
            'dni.numeric' => 'El campo DNI debe ser numérico',            
            'phone.required' => 'El campo Teléfono es requerido',            
            'phone.numeric' => 'El campo Teléfono debe ser numérico y sin espacios',            
            'birth_date.required' => 'El campo Fecha Nacimiento es requerido',            
            'birth_date.date' => 'El campo Fecha Nacimiento debe ser una fecha',   
            'number_member.required' => 'El campo Número de Socio es requerido',            
            'number_member.numeric' => 'El campo Número de Socio debe ser numérico',         
        ];
    }
}
