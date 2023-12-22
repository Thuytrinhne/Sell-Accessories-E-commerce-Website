<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

class ItemRequest extends FormRequest
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
            'price' => 'bail|required',
            'quantity' => 'bail|required',    
            'name' => 'bail|required',    
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg' 
        ];
    }
    public function messages()
    {
        return [
            'price.required' => ':attribute bắt buộc phải nhập !',
            'quantity.required' => ':attribute bắt buộc phải nhập !',
            'name.required' => ':attribute bắt buộc phải nhập !',
            'image.required' => ':attribute bắt buộc phải nhập !',
            'image.mimes' => ':attribute chỉ nhập ảnh định dạng jpeg,png,jpg,gif,svg!!!',
        ];
    }
    public function attributes()
    {
        return [
            'price' => 'Giá sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'image' => 'Ảnh',
            'name' => 'Variation'
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
