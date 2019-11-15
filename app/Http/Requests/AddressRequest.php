<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'name' =>'required',
            // required|Regex:/(^([\-]+)([0-9]{1,2})[%]$|^([\-]+)([\d]+)$)/i',
            'phone' => 'required',
            'address'=>'required',
            
           
        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'không được để trống',
            
            'phone.required'  => 'không được để trống',
            
            'address.required'  => 'Vui lòng chọn',
            
        ];
    }
}
