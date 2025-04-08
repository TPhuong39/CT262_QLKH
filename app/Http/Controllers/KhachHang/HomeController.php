<?php

namespace App\Http\Controllers\KhachHang;  // Thêm dấu gạch chéo

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()  // Thêm method index
    {
        return view('khachhang.home');
    }
}
