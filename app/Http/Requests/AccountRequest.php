<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }
    public function messages()
    {
        return [
            'full_name'=> 'Vui lòng nhập họ tên',
            'sex'=> 'Vui lòng nhập giới tính',
            'phone'=> 'Vui lòng nhập số điện thoại',
            'email'=> 'Vui lòng nhập email',
            'password'=> 'Vui lòng nhập mật khẩu',
            'birth'=> 'Vui lòng nhập ngày sinh'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name'=> 'required',
                'sex'=> 'required',
                'phone'=> 'required|max:10',
                'email'=> 'required',
                'password'=> 'required',
                'birth'=> 'required'
        ];
    }
}
