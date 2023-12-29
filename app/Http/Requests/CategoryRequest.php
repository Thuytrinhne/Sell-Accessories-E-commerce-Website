<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

class CategoryRequest extends FormRequest
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
            'name_category' => 'bail|required|unique:category|max:100',
            'image_category' => 'bail|required',
            
        ];
    }
    public function messages()
    {
        return [
            'name_category.required' => ':attribute bắt buộc phải nhập !',
            'image_category.required' => ':attribute bắt buộc phải nhập !',
            'name_category.unique' => ':attribute đã tồn tại !',
            'name_category.max' => ':attribute tối đa :max ký tự !',
        ];
    }
    public function attributes()
    {
        return [
            'name_category' => 'Tên danh mục',
            'image_category' => 'Ảnh danh mục'
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
