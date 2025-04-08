<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $guarded = ['id'];
    protected $fillable = ['KH_HoTen','KH_NgaySinh','KH_DiaChi', 'KH_SDT', 'KH_Email', 'KH_MatKhau', 'lkh_id'];
    // Ghi đè phương thức để sử dụng cột KH_Email cho xác thực
    public function getAuthIdentifierName()
    {
        return 'KH_Email'; // Sử dụng cột KH_Email thay vì email
    }

    // Ghi đè phương thức để trả về mật khẩu đã được mã hóa
    public function getAuthPassword()
    {
        return $this->KH_MatKhau; // Trả về mật khẩu đã được mã hóa
    }
    public function lkh()
    {
        return $this->belongsTo(LoaiKhachHang::class, 'lkh_id', 'id');
    }

}
