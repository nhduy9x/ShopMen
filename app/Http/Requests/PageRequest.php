<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'required',
            'images' => 'image',
            'content'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'ko de trong',
            'images.image'  => 'Yêu cầu định dạng file ảnh',
            'content.required'  => 'ko de trong'
        ];
    }
}
