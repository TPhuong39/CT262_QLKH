<?php

namespace App\Http\Controllers;
use App\Models\DanhGia;
use Illuminate\Http\Request;

class XemDanhGiaController extends Controller
{
    public function indexDG()
    {
        // Lấy tất cả đánh giá kèm thông tin khách hàng và sản phẩm (nếu có)
        $danhgias = DanhGia::with(['khachhang', 'sanpham', 'nhanvien'])->paginate(10);

        // Trả về view và truyền dữ liệu đánh giá
        return view('danhgiaindex', compact('danhgias'));
    }
}
