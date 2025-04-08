<?php

namespace App\Http\Services;

use App\Models\KhachHang;
use App\Models\LoaiKhachHang;
use App\Http\Repositories\KhachHangRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KhachHangService
{
    protected $khachhangRepo;

    public function __construct(KhachHangRepository $khachhangRepo)
    {
        $this->khachhangRepo = $khachhangRepo;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $khachhang = $this->khachhangRepo->create([
                'KH_HoTen' => $request->KH_HoTen,
                'KH_NgaySinh' => $request->KH_NgaySinh,
                'KH_DiaChi' => $request->KH_DiaChi,
                'KH_SDT' => $request->KH_SDT,
                'KH_Email' => $request->KH_Email,
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
            $khachhang = KhachHang::findOrFail($id);

            $khachhang->update([
                'KH_HoTen' => $request->KH_HoTen,
                'KH_NgaySinh' => $request->KH_NgaySinh,
                'KH_DiaChi' => $request->KH_DiaChi,
                'KH_SDT' => $request->KH_SDT,
                'KH_Email' => $request->KH_Email,
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
        $khachhang = KhachHang::find($id);

        if ($khachhang) {
            // Xóa khách hàng
            $khachhang->destroy($id);
            return true;
        }

        return false; // Trả về false nếu không tìm thấy khách hàng
    }
}
