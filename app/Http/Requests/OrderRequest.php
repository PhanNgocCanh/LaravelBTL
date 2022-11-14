<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required','sdt' => 'required|max:10',
            'address' => 'required','date' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc phải nhập',
            'sdt.required' => 'Số điện thoại phải nhập',
            'sdt.max' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Địa chỉ bắt buộc phải nhập',
            'date.required' => 'Phải chọn ngày giao'
        ];
    }
}
