<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Hash;
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
       
         if ($this->filled('oldPass')) {
            $rules['oldPass'] = ['bail', 'required', function ($attribute, $value, $fail) {
                        $passHash = Hash::make($value);
                       if (!(Auth::user()->password === $passHash) ) {
                           $fail('Mật khẩu cũ không chính xác!');
                      }
                    }];
        }
         
        $rules = [
            'password' => 'bail|required|min:6|same:confirmPass',
            'confirmPass' => 'bail|required',
        ];
        return $rules;
    }
    
    public function messages()
    {
        return [
            'oldPass.required' => 'Trường này bắt buộc phải nhập !',
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
