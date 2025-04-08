<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoTro;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HoTroController extends Controller
{
    // Hiển thị danh sách yêu cầu hỗ trợ
    public function index()
    {
        // Lấy các yêu cầu hỗ trợ của khách hàng hiện tại, sắp xếp theo thời gian tạo
        $hotros = HoTro::where('kh_id', Auth::guard('customer')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('khachhang.hotro.index', compact('hotros'));
    }

    // Tạo yêu cầu hỗ trợ mới
    public function create()
    {
        $customerId = Auth::guard('customer')->id();
        $sanphams = SanPham::whereHas('donhangs', function ($query) use ($customerId) {
            $query->where('kh_id', $customerId);
        })->get();

        return view('khachhang.hotro.create', compact('sanphams'));
    }
    // Lưu yêu cầu hỗ trợ
    public function store(Request $request)
    {
        // Debug: Kiểm tra dữ liệu đầu vào
        Log::info('Dữ liệu đầu vào:', $request->all());
        Log::info('User ID:', ['id' => Auth::guard('customer')->id()]);

        try {
            $validated = $request->validate([
                'HT_Loai' => 'required|in:sua_chua,bao_hanh,khac',
                'sp_id' => 'required|exists:sanpham,id',
                'HT_NoiDung' => 'required|string|max:1000',
            ]);

            // Debug: Kiểm tra dữ liệu đã validate
            Log::info('Dữ liệu đã validate:', $validated);

            $hotro = HoTro::create([
                'HT_Loai' => $validated['HT_Loai'],
                'HT_NoiDung' => $validated['HT_NoiDung'],
                'HT_TrangThai' => 'moi',
                'kh_id' => Auth::guard('customer')->id(),
                'sp_id' => $validated['sp_id'],
            ]);

            // Debug: Kiểm tra bản ghi đã tạo
            Log::info('Bản ghi đã tạo:', $hotro->toArray());
            Log::info('ID bản ghi mới:', ['id' => $hotro->id]);

            return redirect()->route('khachhang.hotro.index')
                   ->with('success', 'Gửi yêu cầu hỗ trợ thành công');

        } catch (\Exception $e) {
            Log::error('Lỗi khi tạo yêu cầu hỗ trợ:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
    $hotro = HoTro::where('id', $id)
        ->where('kh_id', Auth::guard('customer')->id())
        ->firstOrFail();

        return view('khachhang.hotro.show', compact('hotro'));
    }
}
