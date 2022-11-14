<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tensp' => 'required','gia' => 'required|integer',
            'anh' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tensp.required' => 'Tên sản phẩm phải nhập',            
            'gia.required' => 'Giá phải nhập',
            'gia.integer' => 'Giá phải là số',
            'anh.required' => 'Phải chọn ảnh sản phẩm'
        ];
    }
}
