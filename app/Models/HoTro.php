<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoTro extends Model
{
    use HasFactory;

    protected $table = 'hotro'; // Tên bảng phải đúng
    protected $fillable = [
        'HT_Loai', 'HT_NoiDung', 'HT_TrangThai', 'kh_id', 'sp_id'
    ];
     public function donhangs()
    {
        return $this->belongsToMany(DonHang::class, 'donhang_sanpham', 'sp_id', 'dh_id');
        // Or however your relationship is structured
    }
}
