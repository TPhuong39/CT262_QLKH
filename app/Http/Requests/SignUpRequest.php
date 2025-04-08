<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'KH_HoTen' => 'required|string',
            'KH_Email' => 'required|string|email|unique:khachhang,KH_Email|max:191',
            'KH_MatKhau' => 'required|string|min:6',
            'KH_SDT' => 'required|string|size:10',
            'lkh_id' => 'required|exists:loaikhachhang,id',
        ];
    }

    public function messages(): array
    {
        return [
            'KH_HoTen.required' => 'Bạn chưa nhập họ và tên.',
            'KH_HoTen.string' => 'Họ và tên phải là dạng ký tự.',
            'KH_Email.required' => 'Bạn chưa nhập email.',
            'KH_Email.string' => 'Email phải là dạng ký tự.',
            'KH_Email.email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'KH_Email.unique' => 'Email đã tồn tại. Hãy chọn email khác.',
            'KH_Email.max' => 'Độ dài email tối đa là 191 ký tự.',
            'KH_MatKhau.required' => 'Bạn chưa nhập vào mật khẩu.',
            'KH_MatKhau.min' => 'Mật khẩu phải có ít nhất 6 kí tự.',
            'KH_SDT.required' => 'Bạn chưa nhập số điện thoại.',
            'KH_SDT.size' => 'Số điện thoại phải có đúng 10 chữ số.',
        ];
    }
}
