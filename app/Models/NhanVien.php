<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVien extends Authenticatable
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $guarded = ['id'];
    protected $fillable = ['NV_HoTen', 'NV_SDT', 'NV_Email', 'NV_MatKhau'];
    // Ghi đè phương thức để sử dụng cột KH_Email cho xác thực
    public function getAuthIdentifierName()
    {
        return 'NV_Email'; // Sử dụng cột KH_Email thay vì email
    }

    // Ghi đè phương thức để trả về mật khẩu đã được mã hóa
    public function getAuthPassword()
    {
        return $this->NV_MatKhau; // Trả về mật khẩu đã được mã hóa
    }
}
