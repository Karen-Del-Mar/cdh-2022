<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'gender' => 'required',
            'eps' => 'required',
            'blood_type' => 'required',
            'birthday' => 'required',
            'career' => 'required',
            'average' => 'required',
            'semester' => 'required',
            'job_skills' => 'required',
            // 'basic_tools'=> 'required',
            'office_tools'=> 'required',
            'languages'=> 'required',
        ];
    }
    public function messages(){
        return [
            'gender.required' => 'Es necesario ingresar el campo del genero', 
            'blood_typer.required' => 'Es necesario seleccionar un tipo sanguineo', 
            'eps.required' => 'Es necesario ingresar el campo de la EPS',
        ];
    }
}
