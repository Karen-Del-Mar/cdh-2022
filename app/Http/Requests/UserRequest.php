<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required | min:4 | max:50',
            'rol_id'=>'required',
            'phone' => 'max:10',
            'avatar' => 'image'
        ];
    }
}
