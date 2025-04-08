<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table = 'khuyenmai';
    protected $fillable = ['KM_Ten','KM_PhanTramGiam', 'KM_NgayBatDau', 'KM_NgayKetThuc', 'KM_DieuKien', 'KM_SoLuong', 'lkh_id', 'sp_id'];
    public function sp()
    {
        return $this->belongsTo(SanPham::class, 'sp_id', 'id');
    }
    public function lkh()
    {
        return $this->belongsTo(LoaiKhachHang::class, 'lkh_id', 'id');
    }
}
