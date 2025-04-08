<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKhachHangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'KH_HoTen' => 'required|string',
            'KH_DiaChi' => 'required|string',
            'KH_NgaySinh' => 'required|date',
            'KH_SDT' => 'required|string',
            'KH_Email' => 'required|string',
            'lkh_id' => 'required|exists:loaikhachhang,id', // Mã LKH phải tồn tại trong bảng loaikhachhang
            // 'store_id' => 'required|exists:stores,id',
        ];
    }

    public function messages(): array
    {
        return [
            'KH_HoTen.required' => 'Bạn chưa nhập họ tên.',
            'KH_HoTen.string' => 'Họ tên phải là dạng ký tự.',
            'KH_NgaySinh.date' => 'Ngày sinh phải là ngày hợp lệ.',
            'KH_DiaChi.required' => 'Bạn chưa nhập địa chỉ.',
            'KH_DiaChi.string' => 'Địa chỉ phải là dạng ký tự.',
            'KH_SDT.required' => 'Bạn chưa nhập số điện thoại.',
            'KH_Email.required' => 'Bạn chưa nhập email.',
            'lkh_id.required' => 'Trường "Loại khách hàng" là bắt buộc.',
            'lkh_id.exists' => 'Mã loại khách hàng không hợp lệ. Vui lòng chọn mã loại khách hàng hợp lệ từ hệ thống.',
        ];
    }
}
