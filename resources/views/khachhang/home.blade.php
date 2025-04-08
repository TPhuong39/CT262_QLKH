@extends('khachhang.layouts.app')

@section('title', 'Trang chủ khách hàng')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Xin chào, {{ Auth::guard('customer')->user() ? Auth::guard('customer')->user()->KH_HoTen : 'Khách' }}</h3>
    </div>
    <div class="card-body">
        <p>Đây là trang quản lý dành cho khách hàng</p>

        @auth('customer')
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin</h5>
                        <p class="card-text">Cập nhật thông tin cá nhân</p>
                        <a href="{{ route('customer.profile') }}" class="btn btn-light">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Đơn hàng</h5>
                        <p class="card-text">Xem lịch sử mua hàng</p>
                        <a href="{{ route('customer.donhang.index') }}" class="btn btn-light">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Hỗ trợ</h5>
                        <p class="card-text">Yêu cầu hỗ trợ, bảo hành</p>
                        <a href="{{ route('customer.hotro.index') }}" class="btn btn-light">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Đánh giá</h5>
                        <p class="card-text">Đánh giá sản phẩm, dịch vụ</p>
                        <a href="{{ route('customer.danhgia.index') }}" class="btn btn-light">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-warning">
            <p>Vui lòng <a href="{{ route('khachhang.login') }}">đăng nhập</a> để sử dụng đầy đủ chức năng</p>
        </div>
        @endauth
    </div>
</div>
@endsection
