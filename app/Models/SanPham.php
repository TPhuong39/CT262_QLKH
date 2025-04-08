<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'id';
    protected $fillable = ['SP_Ten','SP_Loai', 'SP_MoTa', 'SP_Gia', 'SP_HinhAnh', 'SP_TrangThai'];

    public function chitietDonHang()
    {
        return $this->hasMany(ChiTietDonHang::class, 'sp_id', 'id');
    }
    // If you have a different primary key name
    // protected $primaryKey = 'SP_Ma'; // or whatever it actually is
}
