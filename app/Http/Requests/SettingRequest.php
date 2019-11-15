<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'email' => 'required|Regex:/[.][a-z]{2,6}$/i|email',
            'hotline' => 'required|min:6|max:16',
            'logo_text'=>'required',
            'image'=>'image',
           
            'address'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng điền email',
            'email.email' => 'Vui lòng điền đúng định dạng email',
            'email.regex' => 'Vui lòng điền đúng định dạng email',
            'address.required' => 'ko de trong',
            'image.image'  => 'Yêu cầu định dạng file ảnh',
            'choose_logo.required'  => 'ko de trong',
            'logo_text.required'  => 'ko de trong',
            'hotline.required'  => 'ko de trong',
            'hotline.min'  => 'min:10',
            'hotline.max'  => 'max:11',
        ];
    }
}
