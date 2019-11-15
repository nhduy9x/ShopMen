<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebRequest extends FormRequest
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
            'hotline' => 'required|min:10|max:11',
            'image' => 'image',
            'logo_text'=>'required'
            'choose_logo'=>'required',
            'address'=>'required',
            'email' => 'required|email|Regex:/[.][a-z]{2,6}$/i',
        ];
    }
    public function messages()
    {
        return [
        
        ];
    }
}
