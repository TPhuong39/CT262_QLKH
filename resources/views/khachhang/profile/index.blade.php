@extends('khachhang.layouts.app')

@section('title', 'Thông tin cá nhân')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Thông tin cá nhân</h3>
    </div>
    <div class="card-body">
        @if($khachhang)
        <form method="POST" action="{{ route('customer.profile.update') }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="KH_HoTen" class="form-label">Họ tên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="KH_HoTen" name="KH_HoTen"
                        value="{{ old('KH_HoTen', $khachhang->KH_HoTen ?? '') }}" required>
                    @error('KH_HoTen')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="KH_Email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="KH_Email" name="KH_Email"
                        value="{{ old('KH_Email', $khachhang->KH_Email ?? '') }}" required>
                    @error('KH_Email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="KH_SDT" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="KH_SDT" name="KH_SDT"
                        value="{{ old('KH_SDT', $khachhang->KH_SDT ?? '') }}" required>
                    @error('KH_SDT')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="KH_NgaySinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" id="KH_NgaySinh" name="KH_NgaySinh"
                        value="{{ old('KH_NgaySinh', $khachhang->KH_NgaySinh ?? '') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="KH_DiaChi" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                <textarea class="form-control" id="KH_DiaChi" name="KH_DiaChi"
                    rows="3" required>{{ old('KH_DiaChi', $khachhang->KH_DiaChi ?? '') }}</textarea>
                @error('KH_DiaChi')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('customer.home') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Quay lại
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Cập nhật
                </button>
            </div>
        </form>
        @else
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle me-2"></i>Không tìm thấy thông tin khách hàng.
        </div>
        @endif
    </div>
</div>
@endsection
