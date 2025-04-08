<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class DonHangController extends Controller
{
    // public function index()
    // {
    //     if (!Auth::guard('customer')->check()) {
    //         return redirect()->route('khachhang.dangnhap')->with('error', 'Bạn chưa đăng nhập!');
    //     }

    //     $khachhangId = Auth::guard('customer')->id();

    //     // Enable SQL query logging
    //     DB::enableQueryLog();

    //     $donhangs = DonHang::with(['chitietDonHang.sanpham'])
    //         ->where('kh_id', $khachhangId)
    //         ->orderByDesc('DH_NgayDat')
    //         ->get();

    //     // Log the actual SQL queries
    //     $queries = DB::getQueryLog();
    //     Log::info('SQL Queries: ' . json_encode($queries));

    //     // Debug: Count items in each order
    //     foreach ($donhangs as $donhang) {
    //         Log::info("Order #{$donhang->id} has {$donhang->chitietDonHang->count()} items");
    //     }

    //     return view('khachhang.donhang.index', compact('donhangs'));
    // }
    // public function test()
    // {
    //     $khachhangId = 1;

    //     // Direct SQL query to check orders
    //     $orders = DB::select("SELECT * FROM donhang WHERE kh_id = ?", [$khachhangId]);
    //     echo "<h2>Direct SQL Query Results</h2>";
    //     echo "<p>Found " . count($orders) . " orders</p>";

    //     // Check order details
    //     foreach ($orders as $order) {
    //         echo "<h3>Order #{$order->id}</h3>";
    //         echo "<p>Date: {$order->DH_NgayDat}, Total: {$order->DH_TongTien}</p>";

    //         // Get order details
    //         $details = DB::select("SELECT * FROM chitietdonhang WHERE dh_id = ?", [$order->id]);
    //         echo "<p>Found " . count($details) . " order items</p>";

    //         foreach ($details as $detail) {
    //             $product = DB::select("SELECT * FROM sanpham WHERE id = ?", [$detail->sp_id]);
    //             if (count($product) > 0) {
    //                 echo "<p>Product: {$product[0]->SP_Ten}, Quantity: {$detail->CTDH_SoLuong}</p>";
    //             } else {
    //                 echo "<p>Product not found (ID: {$detail->sp_id})</p>";
    //             }
    //         }
    //     }

    //     exit;
    // }
    // public function authCheck()
    // {
    //     if (Auth::guard('customer')->check()) {
    //         $customer = Auth::guard('customer')->user();
    //         echo "<h2>Customer is authenticated</h2>";
    //         echo "<p>ID: " . $customer->id . "</p>";
    //         echo "<p>Name: " . $customer->KH_HoTen . "</p>";

    //         // Check if this customer has orders
    //         $orderCount = DonHang::where('kh_id', $customer->id)->count();
    //         echo "<p>Order count: " . $orderCount . "</p>";
    //     } else {
    //         echo "<h2>Customer is NOT authenticated</h2>";
    //     }
    //     exit;
    // }

    // public function show($id)
    // {
    //     if (!Auth::guard('customer')->check()) {
    //         return redirect()->route('khachhang.dangnhap')->with('error', 'Bạn chưa đăng nhập!');
    //     }

    //     $khachhangId = Auth::guard('customer')->id();

    //     $donhang = DonHang::with(['chitietDonHang.sanpham'])
    //         ->where('id', $id)  // Use 'id' not 'dh_id'
    //         ->where('kh_id', $khachhangId)
    //         ->first();

    //     if (!$donhang) {
    //         return redirect()->route('khachhang.donhang.index')
    //             ->with('error', 'Không tìm thấy thông tin đơn hàng');
    //     }

    //     return view('khachhang.donhang.show', compact('donhang'));
    // }


    public function lichSuDonHang()
    {
        // Lấy thông tin khách hàng từ guard 'customer'
        $user = Auth::guard('customer')->user();

        // Nếu chưa đăng nhập, chuyển hướng về trang login
        if (!$user) {
            return redirect()->route('customer.login')->with('error', 'Bạn cần đăng nhập để xem lịch sử đơn hàng.');
        }

        // Lấy các đơn hàng thuộc về khách hàng hiện tại, kèm chi tiết và sản phẩm
        $donhangs = DonHang::with(['chitietDonHang.sanpham'])
            ->where('kh_id', $user->id)
            ->orderByDesc('DH_NgayDat')
            ->get();

        // Trả về view cùng dữ liệu
        return view('khachhang.donhang.index', compact('donhangs'));
    }
}
