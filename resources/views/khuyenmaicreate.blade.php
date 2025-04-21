<!DOCTYPE html>
{{-- @toastifyCss --}}
<html>
<head>
    <base href="http://127.0.0.1:8000/khuyenmai/create">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khuyến mãi</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <div class="gray-bg">

        {{-- Header --}}
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>
                    {{ $config['method'] == 'create' ? 'Thêm mới khuyến mãi' : 'Chỉnh sửa thông tin khuyến mãi' }}
                </h2>
                <ol class="breadcrumb" style="margin-bottom: 10px">
                    <li class="active">
                        <strong>
                            {{ $config['method'] == 'create' ? 'Thêm mới khuyến mãi' : 'Chỉnh sửa thông tin khuyến mãi' }}
                        </strong>
                    </li>
                </ol>
            </div>
        </div>

        {{-- Hiển thị lỗi --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
        $url = $config['method'] == 'create'
            ? route('khuyenmai.storeKhuyenMai')
            : route('khuyenmai.update', $khuyenmai->id ?? 0); // thêm fallback tránh lỗi
        @endphp

        <form action="{{ $url }}" method="POST" class="box" enctype="multipart/form-data">
            @csrf
            {{-- @if ($config['method'] == 'editKhuyenMai')
                @method('PUT')
            @endif --}}
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="panel-head">
                            <div class="panel-title">Thông tin khuyến mãi</div>
                            <div class="panel-description">- Nhập thông tin khuyến mãi</div>
                            <div class="panel-description">- Bắt buộc nhập đối với những trường <i class="text-danger">(*)</i></div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Tên khuyến mãi<span class="text-danger">(*)</span></label>
                                            <input type="text" name="KM_Ten" value="{{ old('KM_Ten', $khuyenmai->KM_Ten ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Phần trăm giảm<span class="text-danger">(*)</span></label>
                                            <input type="text" name="KM_PhanTramGiam" value="{{ old('KM_PhanTramGiam', $khuyenmai->KM_PhanTramGiam ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Ngày bắt đầu</label>
                                            <input type="date" name="KM_NgayBatDau"
                                                    value="{{ old('KM_NgayBatDau', isset($khuyenmai->KM_NgayBatDau) ? date('Y-m-d', strtotime($khuyenmai->KM_NgayBatDau)) : '') }}"
                                                    class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Ngày kết thúc</label>
                                            <input type="date" name="KM_NgayKetThuc"
                                            value="{{ old('KM_NgayKetThuc', isset($khuyenmai->KM_NgayKetThuc) ? date('Y-m-d', strtotime($khuyenmai->KM_NgayKetThuc)) : '') }}"
                                            class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Điều kiện</label>
                                            <input type="text" name="KM_DieuKien" value="{{ old('KM_DieuKien', $khuyenmai->KM_DieuKien ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Số lượng</label>
                                            <input type="number" name="KM_SoLuong" value="{{ old('KM_SoLuong', $khuyenmai->KM_SoLuong ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Sản phẩm<span class="text-danger">(*)</span></label>
                                            <select name="sp_id" class="form-control">
                                                <option value="0">Chọn sản phẩm</option>
                                                @foreach($sanphams as $sp)
                                                    <option value="{{ $sp->id }}" {{ old('sp_id', $khuyenmai->sp_id ?? '') == $sp->id ? 'selected' : '' }}>
                                                        {{ $sp->SP_Ten }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Loại khách hàng<span class="text-danger">(*)</span></label>
                                            <select name="lkh_id" class="form-control">
                                                <option value="0">Chọn loại khách hàng</option>
                                                @foreach($loaikhachhangs as $lkh)
                                                    <option value="{{ $lkh->id }}" {{ old('lkh_id', $khuyenmai->lkh_id ?? '') == $lkh->id ? 'selected' : '' }}>
                                                        {{ $lkh->LKH_TenLoai }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right mb15">
                    <button class="btn btn-primary" type="submit" name="send" value="send">Lưu</button>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>
{{-- @toastifyJs --}}
