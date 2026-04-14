<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CvProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'title'     => ['required', 'string', 'max:255'],
            'dob'       => ['nullable', 'string', 'max:20'],
            'phone'     => ['nullable', 'string', 'max:20'],
            'email'     => ['nullable', 'string', 'email', 'max:255'],
            'address'   => ['nullable', 'string', 'max:255'],
            'avatar'    => ['nullable', 'string', 'max:255'],
            'objective' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name'      => 'Họ và tên',
            'title'     => 'Chức danh',
            'dob'       => 'Ngày sinh',
            'phone'     => 'Số điện thoại',
            'email'     => 'Email',
            'address'   => 'Địa chỉ',
            'avatar'    => 'Ảnh đại diện',
            'objective' => 'Mục tiêu nghề nghiệp',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => ':attribute không được để trống.',
            'name.string'       => ':attribute phải là chuỗi ký tự.',
            'name.max'          => ':attribute không được vượt quá 255 ký tự.',

            'title.required'    => ':attribute không được để trống.',
            'title.string'      => ':attribute phải là chuỗi ký tự.',
            'title.max'         => ':attribute không được vượt quá 255 ký tự.',

            'dob.string'        => ':attribute phải là chuỗi ký tự.',
            'dob.max'           => ':attribute không được vượt quá 20 ký tự.',

            'phone.string'      => ':attribute phải là chuỗi ký tự.',
            'phone.max'         => ':attribute không được vượt quá 20 ký tự.',

            'email.string'      => ':attribute phải là chuỗi ký tự.',
            'email.email'       => ':attribute không đúng định dạng.',
            'email.max'         => ':attribute không được vượt quá 255 ký tự.',

            'address.string'    => ':attribute phải là chuỗi ký tự.',
            'address.max'       => ':attribute không được vượt quá 255 ký tự.',

            'avatar.string'     => ':attribute phải là chuỗi ký tự.',
            'avatar.max'        => ':attribute không được vượt quá 255 ký tự.',

            'objective.string'  => ':attribute phải là chuỗi ký tự.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ.',
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}