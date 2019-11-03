<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassUserRequest extends FormRequest
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
            'email' => 'required|email|Regex:/[.][a-z]{2,6}$/i',
            'pass' => 'min:6|max:16',
            'name'=>'required',
            'image'=>'image',
            'date'=>'required',
            'active'=>'required'
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Vui lòng điền email',
            'email.email' => 'Vui lòng điền đúng định dạng email',
            'email.regex' => 'Vui lòng điền đúng định dạng email',
            'pass.min' => 'mật khẩu tối thiểu 6 ký tự',
            'pass.max' => 'Mật khẩu tối đa 16 ký tự',
            'name.required'=>'Vui lòng điền',
            'date.required'=>'Vui lòng điền',
            'image.image' =>'Yêu cầu đúng định dạng image',
            'active.required'=>'Vui lòng chọn'
        ];
    }
}
