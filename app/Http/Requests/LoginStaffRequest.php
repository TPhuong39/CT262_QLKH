<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginStaffRequest extends FormRequest
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
    public function rules()
    {
        return [
            'NV_Email' => 'required|string|email|max:191',
            'NV_MatKhau' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'NV_Email.required' => 'Bạn chưa nhập email.',
            'NV_Email.string' => 'Email phải là dạng ký tự.',
            'NV_Email.email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'NV_Email.max' => 'Độ dài email tối đa là 191 ký tự.',
            'NV_MatKhau.required' => 'Bạn chưa nhập vào mật khẩu.',
        ];
    }
}
