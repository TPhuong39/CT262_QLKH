<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';
    protected $fillable = [
        'DH_NgayDat',
        'DH_TongTien',
        'DH_TrangThai',
        'kh_id',
    ];
    // Explicitly define the primary key if it's not 'id'
    protected $primaryKey = 'id';
    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'kh_id', 'id');
    }
    public function chitietDonHang()
    {
        return $this->hasMany(ChiTietDonHang::class, 'dh_id', 'id');
    }
}
