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
            'txtName'=>'required',
            'txtMail'=>'required|unique:users,email',
            'txtPass'=>'required|min:8',
            'txtRPass'=>'same:txtPass',
        ];
    }

    public function messages(){
        return [
        'txtName.required'=>'Input Username, please!',
        'txtMail.required'=>'Input E-mail, please!',
        'txtMail.unique'=>'E-mail existed',
        'txtPass.required'=>'Input Password, please!',
        'txtPass.min'=>'Minimum 8 charater',
        ];
    }
}
