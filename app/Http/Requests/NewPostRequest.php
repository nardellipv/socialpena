<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPostRequest extends FormRequest
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
            'text' => 'required|min:10',
            'picture' => 'mimes:jpeg,jpg,png,gif|max:2048',    
        ];
    }
    public function messages()
    {
        return [
            'text.required' => 'El texto es requerido',                  
            'text.min' => 'El texto debe ser más largo', 
            'picture.max' => 'La foto no debe superar los 2MB',
            'picture.mimes' => 'La foto debe ser una imágen',                 
        ];
    }
}
