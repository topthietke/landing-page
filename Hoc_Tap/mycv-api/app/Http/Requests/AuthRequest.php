<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'    => 'required',
            'password' => 'required',
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email' => 'Email của bạn không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu của bạn',
            'password.min' => 'Độ dài mật khẩu phải lớn hơn 8',
        ];
    }
}
