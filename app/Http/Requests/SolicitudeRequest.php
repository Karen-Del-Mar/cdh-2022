<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudeRequest extends FormRequest
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
            'document' => 'required | min:5 | max:11',
            'email'=> 'required | min:5 | max:80',
            'name' => 'required | min:4 | max:50',
            'company' => 'required | min:4 | max:80',
            'location' => 'required | min:5 | max:50',
            'phone' => 'required |max:10',
            'description' => 'required | min: 5 | max:8000',
            'sector'=>'required',
            'state',
        ];


    }

    public function messages(){
        return [
            'name.required' => 'nombre requerido.',
            'email.required' => 'Correo requerido.',
            'company.required' => 'Nombre de empresa o empleador es requerido.',
            'location.required' => 'Dirección requerido.',
            'phone.required' => 'Dirección requerido.',
            'description.required' => 'Descripción de la empresa es requerida.',
        ];
    }
}
