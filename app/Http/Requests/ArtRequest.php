<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtRequest extends FormRequest
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
            'txtTitle'=>'required|unique:articles,title',
            'txtSum'=>'required',
            'txtEditor'=>'required',

        ];
    }

    public function messages(){
        return [
            'txtTitle.required'=>'Input Title, Please!',
            'txtTitle.unique'=>'Title existed',
            'txtSum.required'=>'Input Summary, Please!',
            'txtEditor.required'=>'Input Content, Please!',

        ];
    }
}
