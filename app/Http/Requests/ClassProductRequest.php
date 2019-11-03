<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassProductRequest extends FormRequest
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
            'name' => 'required|min:6|max:50',
            // 'image' => 'image',
            'price'=>'required',
            'stocks'=>'required',
            'source'=>'required',
            'category_id'=>'required',
            'short_desc'=>'required',
            'description'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'ko de trong',
            'name.min' => 'it nhat 6 ky tu',
            'name.max' => 'it lon nhat 50 ky tu',
            'short_desc.required'  => 'ko de trong',
            // 'image.image'  => 'Yêu cầu định dạng file ảnh',
            'price.required'  => 'ko de trong',
            'stocks.required'  => 'ko de trong',
            'source.required'  => 'ko de trong',
            'description.required'  => 'ko de trong',
            'category_id.required'  => 'vui long chon'

        ];
    }
}
