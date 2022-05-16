<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
            'id_employer'=>'',
            'job'=>'required',
            'profile'=>'required',
            'payment'=>'required',
            'availability'=>'required', /** Horario */
            'hidden'=>'',
            'state'=>'',
            'limit_date'=>'',
            'places'=>''
        ];
    }
    public function messages(){
        return [
            'job.required' => 'El campo nombre de la vacante es requerido.',
        ];
    }
}
