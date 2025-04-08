<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danhgia';

    protected $fillable = [
        'DG_Loai', 'DG_SoSao', 'DG_NoiDung', 'kh_id', 'sp_id', 'nv_id'
    ];

    // Thêm timestamps nếu bạn có sử dụng
    public $timestamps = true;

    // Mối quan hệ với KhachHang
    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'kh_id');
    }

    // Mối quan hệ với SanPham
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'sp_id');
    }
    
    public function nhanvien()
{
    return $this->belongsTo(NhanVien::class, 'nv_id');
}
}
