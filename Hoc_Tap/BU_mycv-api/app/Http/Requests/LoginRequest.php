<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
       return [
            'email'    => 'required',
            'password' => 'required',
       ];
    }

    public function messages()
    {
        return [
            'email.required' => "Vui lòng nhập tài khoản",
            'password.required' => "Vui lòng nhập mật khẩu",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json([ 'code' => '422', 'data' => $errors  ]));
    }
}
