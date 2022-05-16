<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'id_user'=> '',
            'document' => 'min:5 | max:11',
            'email'=> '  min:10 | max:50',
           // 'password' => '',
            'name' => 'required | min:4 | max:50',
            'rol_id'=>'required',
            'company' => ' min:4 | max:50',
            'location' => 'min:5 | max:50',
            'phone' => 'max:10',
            'avatar' => 'image',
            'sector'=>'required',
            'description' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'nombre requerido.',
            'sector.required' => 'seleccione un sector'
        ];
    }
}
