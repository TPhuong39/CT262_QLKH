@extends('khachhang.layouts.app')

@section('title', 'Yêu cầu hỗ trợ')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Yêu cầu hỗ trợ</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('customer.hotro.store') }}">
            @csrf

            <div class="mb-3">
                <label for="HT_Loai" class="form-label">Loại hỗ trợ</label>
                <select class="form-select" id="HT_Loai" name="HT_Loai" required>
                    <option value="">-- Chọn loại hỗ trợ --</option>
                    <option value="sua_chua">Sửa chữa</option>
                    <option value="bao_hanh">Bảo hành</option>
                    <option value="khac">Khác</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="HT_NoiDung" class="form-label">Thông tin sản phẩm cần sửa chữa - bảo hành:</label>
                <textarea class="form-control" id="HT_NoiDung" name="HT_NoiDung" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
        </form>
    </div>
</div>
@endsection
