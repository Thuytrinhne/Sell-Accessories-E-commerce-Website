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
            'price' => 'bail|required|numeric|min:0',
            'discount_price' => 'bail|required|numeric|min:0',
            'quantity' => 'bail|required|integer|min:1',    
            'name' => 'bail|required',    
            'SKU' => 'bail|required',   
            'image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg' 
        ];
    }
    public function messages()
    {
        return [
            'discount_price.required' => ':attribute bắt buộc phải nhập!',
            'discount_price.numeric' => ':attribute phải là một số!',
            'discount_price.min' => ':attribute phải lớn hơn hoặc bằng 0!',
            'price.required' => ':attribute bắt buộc phải nhập!',
            'price.numeric' => ':attribute phải là một số!',
            'price.min' => ':attribute phải lớn hơn hoặc bằng 0!',
            'quantity.integer' => ':attribute phải là số nguyên dương!',
            'quantity.min' => ':attribute phải lớn hơn 0!',
            'image.mimes' => ':attribute chỉ nhập ảnh định dạng jpeg, png, jpg, gif, svg!',
            'name' => ':attribute ko đc bỏ trống !',
            'SKU' => ':attribute ko đc bỏ trống !',
            
        ];
    }
    public function attributes()
    {
        return [
            'discount_price' => 'Giá discount',
            'price' => 'Giá sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'SKU' => "Mã sku",
            'image' => 'Ảnh',
            'name' => 'Variation',
            
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
