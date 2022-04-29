<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
            'emitter' => 'required',
            'receiver' => 'required',
        ];
    }

    public function messages(){
        return [
            'q1.required' => 'Por favor responda la primera pregunta.',
            'q2.required' => 'Por favor responda la segunda pregunta.',
            'q3.required' => 'Por favor responda la tercera pregunta.',
            'q4.required' => 'Por favor responda la cuarta pregunta.',
            'q5.required' => 'Por favor responda la quinta pregunta.',
        ];
    }
}
