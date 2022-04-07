<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'id_student' => 'required',
            'id_employer' => 'required',
            'start_date' => 'required',
            'final_date' => '',
            'payment' => 'required',
            'job' => 'required',
            'description' => 'required'
        ];
    }

    public function messages(){
        return [
            'start_date.required' => 'La fecha de inicio es requerida', 
            'payment.required' => 'Es necesario especificar el pago', 
            'job.required' => 'Es necesario especificar el pago', 
            'description.required' => 'Es necesario ingresar la descripción del contrato', 
        ];
    }
}
