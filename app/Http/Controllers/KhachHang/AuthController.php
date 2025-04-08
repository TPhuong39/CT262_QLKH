<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Xác thực thông tin đăng nhập
        $credentials = $request->validate([
            'KH_Email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra thông tin đăng nhập
        if (Auth::guard('khachhang')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('khachhang.home')); // Điều hướng sau khi đăng nhập thành công
        }

        // Trả lại lỗi nếu đăng nhập không thành công
        return back()->withErrors([
            'KH_Email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function showLoginForm()
    {
        // Trả về view ở thư mục mới: resources/views/auth/login.blade.php
        return view('auth.login');
    }
}

