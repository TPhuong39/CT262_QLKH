<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table = 'chitietdonhang';
    protected $fillable = ['dh_id', 'sp_id', 'CTDH_SoLuong'];
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'sp_id', 'id');
    }

    public function donhang()
    {
        return $this->belongsTo(DonHang::class, 'dh_id', 'id');
    }
}
