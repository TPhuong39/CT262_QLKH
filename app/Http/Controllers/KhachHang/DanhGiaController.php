<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DanhGiaController extends Controller
{
    public function index()
    {
        $danhgias = DanhGia::where('kh_id', Auth::guard('customer')->id())
            ->with('sanpham')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('khachhang.danhgia.index', compact('danhgias'));
    }

    public function create()
    {
        // Lấy các sản phẩm khách hàng đã mua
        $sanphams = SanPham::whereHas('donhangs', function ($query) {
            $query->where('kh_id', Auth::guard('customer')->id());
        })->get();

        return view('khachhang.danhgia.create', compact('sanphams'));
    }

    public function store(Request $request)
    {
        try {
            // In ra dữ liệu nhận được
            Log::info('Dữ liệu nhận được:', $request->all());

            $request->validate([
                'DG_Loai' => 'required|string|in:Dịch Vụ,Sửa Chữa - Bảo Hành',
                'DG_SoSao' => 'required|integer|between:1,5',
                'DG_NoiDung' => 'required|string',
            ]);

            // Lấy thông tin người dùng hiện tại
            $user = Auth::guard('customer')->user();
            Log::info('Thông tin người dùng:', ['user' => $user]);

            $danhgia = new DanhGia();
            $danhgia->DG_Loai = $request->DG_Loai;
            $danhgia->DG_SoSao = $request->DG_SoSao;
            $danhgia->DG_NoiDung = $request->DG_NoiDung;
            $danhgia->kh_id = $user->id;
            $danhgia->nv_id = 1; // Assuming default value based on your database table

            // Ghi log trước khi lưu
            Log::info('Chuẩn bị lưu đánh giá:', ['danhgia' => $danhgia->toArray()]);

            $result = $danhgia->save();
            Log::info('Kết quả lưu:', ['result' => $result]);

            return redirect()->route('customer.danhgia.index')->with('success', 'Gửi đánh giá thành công');
        } catch (\Exception $e) {
            // Ghi log lỗi
            Log::error('Lỗi khi lưu đánh giá: ' . $e->getMessage());
            // Ghi lại stack trace
            Log::error($e->getTraceAsString());

            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
