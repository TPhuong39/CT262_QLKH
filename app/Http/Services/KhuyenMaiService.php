<?php

namespace App\Http\Services;

use App\Models\KhuyenMai;
use App\Models\LoaiKhachHang;
use App\Models\SanPham;
use App\Http\Repositories\KhuyenMaiRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KhuyenMaiService
{
    protected $khuyenmaiRepo;

    public function __construct(KhuyenMaiRepository $khuyenmaiRepo)
    {
        $this->khuyenmaiRepo = $khuyenmaiRepo;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $khuyenmai = KhuyenMai::create([
                'KM_Ten' => $request->KM_Ten,
                'KM_PhanTramGiam' => $request->KM_PhanTramGiam,
                'KM_NgayBatDau' => $request->KM_NgayBatDau,
                'KM_NgayKetThuc' => $request->KM_NgayKetThuc,
                'KM_DieuKien' => $request->KM_DieuKien,
                'KM_SoLuong' => $request->KM_SoLuong,
                'sp_id' => $request->sp_id,
                'lkh_id' => $request->lkh_id,
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $khuyenmai = KhuyenMai::findOrFail($id);

            $khuyenmai->update([
                'KM_Ten' => $request->KM_Ten,
                'KM_PhanTramGiam' => $request->KM_PhanTramGiam,
                'KM_NgayBatDau' => $request->KM_NgayBatDau,
                'KM_NgayKetThuc' => $request->KM_NgayKetThuc,
                'KM_DieuKien' => $request->KM_DieuKien,
                'KM_SoLuong' => $request->KM_SoLuong,
                'sp_id' => $request->sp_id,
                'lkh_id' => $request->lkh_id,
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return false;
        }
    }

    public function destroy($id)
    {
        // Kiểm tra nếu khách hàng tồn tại
        $khuyenmai = KhuyenMai::find($id);

        if ($khuyenmai) {
            // Xóa khách hàng
            $khuyenmai->destroy($id);
            return true;
        }

        return false; // Trả về false nếu không tìm thấy khách hàng
    }
}
