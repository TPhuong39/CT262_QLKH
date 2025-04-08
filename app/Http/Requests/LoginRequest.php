<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'KH_Email' => 'required|string|email|max:191',
            'KH_MatKhau' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'KH_Email.required' => 'Bạn chưa nhập email.',
            'KH_Email.string' => 'Email phải là dạng ký tự.',
            'KH_Email.email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'KH_Email.max' => 'Độ dài email tối đa là 191 ký tự.',
            'KH_MatKhau.required' => 'Bạn chưa nhập vào mật khẩu.',
        ];
    }
}
