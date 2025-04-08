<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangRequest extends FormRequest
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
            'KM_Ten' => 'required|string',
            'KM_PhanTramGiam' => 'required|string',
            'KM_NgayBatDau' => 'required|date',
            'KM_NgayKetThuc' => 'required|date',
            'KM_DieuKien' => 'required|string',
            'KM_SoLuong' => 'required|string',
            'sp_id' => 'required|exists:sanpham,id' ,
            'lkh_id' => 'required|exists:loaikhachhang,id', // Mã LKH phải tồn tại trong bảng loaikhachhang
            // 'store_id' => 'required|exists:stores,id',
        ];
    }

    public function messages(): array
    {
        return [
            'KM_Ten.required' => 'Bạn chưa nhập họ tên.',
            'KM_Ten.string' => 'Họ tên phải là dạng ký tự.',
            'KM_PhanTramGiam.required' => 'Bạn chưa nhập phần trăm giảm.',
            'KM_NgayBatDau.required' => 'Bạn chưa nhập ngày bắt đầu.',
            'KM_NgayBatDau.date' => 'Ngày bắt đầu phải là ngày hợp lệ.',
            'KM_NgayKetThuc.required' => 'Bạn chưa nhập ngày kết thúc.',
            'KM_NgayKetThuc.date' => 'Ngày kết thúc phải là ngày hợp lệ.',
            'KM_DieuKien.required' => 'Bạn chưa nhập điều kiện giảm.',
            'KM_SoLuong.required' => 'Bạn chưa nhập số lương.',
            'lkh_id.required' => 'Trường "Loại khách hàng" là bắt buộc.',
            'lkh_id.exists' => 'Mã loại khách hàng không hợp lệ. Vui lòng chọn mã loại khách hàng hợp lệ từ hệ thống.',
            'sp_id.required' => 'Trường "Sản phẩm áp dụng" là bắt buộc.',
            'sp_id.exists' => 'Mã sản phẩm không hợp lệ. Vui lòng chọn mã sản phẩm hợp lệ từ hệ thống.',
        ];
    }
}
