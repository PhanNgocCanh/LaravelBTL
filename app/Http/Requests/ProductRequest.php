<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'masp' => 'required|unique:SanPham','tensp' => 'required','gia' => 'required|integer',
            'anh' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'masp.required' => 'Mã sản phẩm phải nhập',
            'masp.unique' => 'Mã sản phẩm đã tồn tại trên hệ thống',
            'tensp.required' => 'Tên sản phẩm phải nhập',            
            'gia.required' => 'Giá phải nhập',
            'gia.integer' => 'Giá phải là số',
            'anh.required' => 'Phải chọn ảnh sản phẩm'
        ];
    }
}
