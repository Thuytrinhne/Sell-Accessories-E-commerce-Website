<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'bail|required|unique:user|email',
            'otp' => 'bail|required|min:6',
            'password' => 'bail|required|min:6',
            'full_name' => 'bail|required|max:100',
            'sex' => 'required',
            'birth'  => 'required'
        ];
    }
    public function messages()
    {
        return [
            'full_name.required' => ':attribute bắt buộc phải nhập !',

            'email.required' => ':attribute bắt buộc phải nhập !',
            'email.email' => ':attribute không đúng định dạng !',

            'otp.required' => ':attribute bắt buộc phải nhập !',
            'password.required' => ':attribute bắt buộc phải nhập !',
            'name_category.unique' => ':attribute đã tồn tại !',
            'name_category.max' => ':attribute tối đa :max ký tự !',
        ];
    }
    public function attributes()
    {
        return [
            'full_name' => 'Họ tên',
            'otp'=>'Otp',
            'email'=> 'Email',
            'sex' => 'Giới tính',
            'birth'  => 'Ngày sinh',
            'password' => 'Mật khẩu'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count()>0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra, Vui lòng kiểm tra lại !!!');
            }
        });
    }
    // xử lý dữ liệu đầu vào trước khi xác thực 
    protected function prepareForValidation()
    {
        $this->merge([
            
        ]);
    }
    protected function failedAuthorization()
    {
        throw new AuthorizationException();
    }
}
