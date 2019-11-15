<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
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
            'value' =>['required', 'Regex:/(^([\-]+)([0-9]{1,2})[%]$|^([\-]+)([\d]+)$)/i'] ,
            // required|Regex:/(^([\-]+)([0-9]{1,2})[%]$|^([\-]+)([\d]+)$)/i',
            'type' => 'required',
            'target'=>'required',
            'date'=>'required',
            'stocks'=>'required'
           
        ];

    }
    public function messages()
    {
        return [
            'value.required' => 'không được để trống',
            'value.regex' => 'Vui lòng nhập đúng theo -10% hoặc -10000',
            'type.required'  => 'vui long nhập trương trinh sale',
            'target.required'  => 'Vui lòng chọn',
            'date.required'  => 'Vui lòng chọn',
            'stocks.required'=>'vui long nhập'
        ];
    }
}
