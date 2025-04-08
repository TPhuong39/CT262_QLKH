<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KhachHang;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function __construct()
    {
        // Sửa thành guard 'customer' thay vì 'khachhang'
        $this->middleware('auth:customer');
    }

    public function index()
    {
        $khachhang = Auth::guard('customer')->user();

        if (!$khachhang) {
            return redirect()->route('khachhang.login');
        }

        return view('khachhang.profile.index', compact('khachhang'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $validated = $request->validate([
            'KH_HoTen' => 'required|string|max:255',
            'KH_Email' => 'required|email|unique:khachhang,KH_Email,'.$user->id,
            'KH_SDT' => 'required|string|max:15',
            'KH_DiaChi' => 'required|string',
            'KH_NgaySinh' => 'required|date',
        ]);
        DB::table('khachhang')->where('id', $user->id)->update($validated);
        return redirect()->route('customer.profile')->with('success', 'Cập nhật thành công');
    }
}
