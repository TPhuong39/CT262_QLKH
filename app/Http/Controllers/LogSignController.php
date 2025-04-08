<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginStaffRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\KhachHang;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LogSignController extends Controller
{
    public function viewloginCus()
    {
        if (Auth::guard('customer')->id() > 0) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function loginCus(LoginRequest $request)
    {
        $customer = KhachHang::where('KH_Email', $request->input('KH_Email'))->first();

        if ($customer && Hash::check($request->input('KH_MatKhau'), $customer->KH_MatKhau)) {
            Auth::guard('customer')->login($customer);
            return redirect()->route('home')->with('success', 'Đăng nhập thành công.');
        } else {
            return back()->withErrors(['error' => 'Đăng nhập thất bại.']);
        }

        return redirect()->route('customer.login')->with('error', 'Email hoặc Mật khẩu không chính xác.');
    }

    public function logoutCus(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.login');
    }

    public function viewsignupCus()
    {
        return view('signup');
    }

    public function signupCus(SignUpRequest $request)
    {
        DB::beginTransaction();

        try {
            // Lấy dữ liệu từ request
            $data = $request->validated();

            $khachhang = KhachHang::create([
                'KH_HoTen' => $data['KH_HoTen'],
                'KH_SDT' => $data['KH_SDT'],
                'KH_Email' => $data['KH_Email'],
                'KH_MatKhau' => bcrypt($data['KH_MatKhau']),
                'lkh_id' => $data['lkh_id'],
            ]);
            Auth::guard('customer')->login($khachhang);
            DB::commit();
            return redirect()->route('home')->with('success', 'Đăng ký thành công.');
        } catch (\Exception $e) {
            // Nếu có lỗi, hoàn tác giao dịch
            DB::rollBack();
            return back()->withErrors(['error' => 'Đăng ký không thành công.']);
        }
    }

    public function viewloginStaff()
    {
        if (Auth::guard('staff')->id() > 0) {
            return redirect()->route('home');
        }
        return view('loginnhanvien');
    }

    public function loginStaff(LoginStaffRequest $request)
    {
        $staff = NhanVien::where('NV_Email', $request->input('NV_Email'))->first();

        if ($staff && Hash::check($request->input('NV_MatKhau'), $staff->NV_MatKhau)) {
            Auth::guard('staff')->login($staff);
            return redirect()->route('khachhang.index')->with('success', 'Đăng nhập thành công.');
        } else {
            return back()->withErrors(['error' => 'Đăng nhập thất bại.']);
        }

        return redirect()->route('staff.login')->with('error', 'Email hoặc Mật khẩu không chính xác.');
    }

    public function logoutStaff(Request $request)
    {
        Auth::guard('staff')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('staff.login');
    }
}
