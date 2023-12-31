<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

class ProductUpdateRequest extends FormRequest
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
            'name_product' => 'bail|required|max:50',
            'default_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg',
            

        ];
    }
    public function messages()
    {
        return [
            'name_product.required' => ':attribute bắt buộc phải nhập !',
            'name_product.unique' => ':attribute đã tồn tại !',
            'name_product.max' => ':attribute tối đa :max ký tự !',
            'default_image.required' => ':attribute phải nhập !!',
            'default_image.mimes' => ':attribute chỉ đc nhập jpeg, jpg, gif, svg !!'

        ];
    }
    public function attributes()
    {
        return [
            'name_product' => 'Tên sản phẩm',
            'default_image' => 'Ảnh sản phẩm'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count()>0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra, Vui lòng kiểm tra lại!!!');
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
