<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User_AddressRequest extends FormRequest
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
            'full_name' => 'bail|required',
            'phone' => 'bail|required|min:9',
            'city' => 'bail|required',
            'district' => 'bail|required',
            'village' => 'bail|required',
            'detail_address' => 'bail|required',
        
        ];
    }
    public function messages()
    {
        return [
            'full_name.required' => ':attribute bắt buộc phải nhập !',
            'phone.required' => ':attribute bắt buộc phải nhập !',
            'city.required' => ':attribute bắt buộc phải nhập !',
            'district.required' => ':attribute bắt buộc phải nhập !',
            'village.required' => ':attribute bắt buộc phải nhập !',
            'detail_address.required' => ':attribute bắt buộc phải nhập !',

        ];
    }
    public function attributes()
    {
        return [
            'full_name' => 'Tên người nhận hàng',
            'phone' => 'Số điện thoại',
            'city' => 'Tỉnh/ Thành phố',
            'district' => 'Quận/ Huyện',
            'village' => 'Phường/ Xã',
            'detail_address' => 'Địa chỉ nhận hàng',

        ];
    }
   
   
}
