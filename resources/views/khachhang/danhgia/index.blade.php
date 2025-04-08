{{-- @extends('khachhang.layouts.app')

@section('title', 'Tạo đánh giá')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Đánh Giá</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('customer.danhgia.store') }}">
            @csrf

            <div class="mb-3">
                <label for="DG_Loai" class="form-label">Loại đánh giá</label>
                <select class="form-select" id="DG_Loai" name="DG_Loai" required>
                    <option value="">-- Chọn loại đánh giá --</option>
                    <option value="dich_vu">Chăm sóc khách hàng</option>
                    <option value="sua_chua">Sửa chữa - Bảo hành</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="DG_SoSao" class="form-label">Đánh giá (Sao)</label>
                <select class="form-select" id="DG_SoSao" name="DG_SoSao" required>
                    <option value="">-- Chọn số sao --</option>
                    <option value="1">1 sao</option>
                    <option value="2">2 sao</option>
                    <option value="3">3 sao</option>
                    <option value="4">4 sao</option>
                    <option value="5">5 sao</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="DG_NoiDung" class="form-label">Nội dung đánh giá</label>
                <textarea class="form-control" id="DG_NoiDung" name="DG_NoiDung" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
            </div>
        </form>
    </div>
</div>
@endsection --}}



@extends('khachhang.layouts.app')

@section('title', 'Tạo đánh giá')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Đánh Giá</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('customer.danhgia.store') }}">
            @csrf

            <div class="mb-3">
                <label for="DG_Loai" class="form-label">Loại đánh giá</label>
                <select class="form-select" id="DG_Loai" name="DG_Loai" required>
                    <option value="">-- Chọn loại đánh giá --</option>
                    <option value="Dịch Vụ">Chăm sóc khách hàng</option>
                    <option value="Sửa Chữa - Bảo Hành">Sửa Chữa - Bảo Hành</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="DG_SoSao" class="form-label">Đánh giá (Sao)</label>
                <select class="form-select" id="DG_SoSao" name="DG_SoSao" required>
                    <option value="">-- Chọn số sao --</option>
                    <option value="1">1 sao</option>
                    <option value="2">2 sao</option>
                    <option value="3">3 sao</option>
                    <option value="4">4 sao</option>
                    <option value="5">5 sao</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="DG_NoiDung" class="form-label">Nội dung đánh giá</label>
                <textarea class="form-control" id="DG_NoiDung" name="DG_NoiDung" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
            </div>
        </form>
    </div>
</div>
@endsection
