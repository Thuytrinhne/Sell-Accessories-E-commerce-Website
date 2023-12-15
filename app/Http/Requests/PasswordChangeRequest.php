<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
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
            'oldPass' =>'require',
            'password' => 'bail|required|min:6|same:confirmPass',
            'confirmPass' => 'bail|required',
          
        ];
    }
    public function messages()
    {
        return [

            'password.min' => 'Mật khẩu ít nhất có 6 ký tự !',
            'password.required' => 'Trường này bắt buộc phải nhập !',
            'confirmPass.required' => 'Trường này bắt buộc phải nhập !',
            'password.same' => 'Mật khẩu không trùng khớp !',
        ];
    }
   
  
    protected function failedAuthorization()
    {
        throw new AuthorizationException();
    }
}
