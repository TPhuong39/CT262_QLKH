<!DOCTYPE html>
{{-- @toastifyCss --}}
<html>
<head>
    <base href="http://127.0.0.1:8000/khachhang/create">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>

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
                    {{ $config['method'] == 'create' ? 'Thêm mới khách hàng' : 'Chỉnh sửa thông tin khách hàng' }}
                </h2>
                <ol class="breadcrumb" style="margin-bottom: 10px">
                    <li class="active">
                        <strong>
                            {{ $config['method'] == 'create' ? 'Thêm mới khách hàng' : 'Chỉnh sửa thông tin khách hàng' }}
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
                ? route('khachhang.storeKhachHang')
                : route('khachhang.update', $khachhang->id);
        @endphp

        <form action="{{ $url }}" method="POST" class="box" enctype="multipart/form-data">
            @csrf
            {{-- @if ($config['method'] == 'editKhachHang')
                @method('PUT')
            @endif --}}

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="panel-head">
                            <div class="panel-title">Thông tin khách hàng</div>
                            <div class="panel-description">- Nhập thông tin cá nhân</div>
                            <div class="panel-description">- Bắt buộc nhập đối với những trường <i class="text-danger">(*)</i></div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Họ tên<span class="text-danger">(*)</span></label>
                                            <input type="text" name="KH_HoTen" value="{{ old('KH_HoTen', $khachhang->KH_HoTen ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Số điện thoại<span class="text-danger">(*)</span></label>
                                            <input type="text" name="KH_SDT" value="{{ old('KH_SDT', $khachhang->KH_SDT ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Email</label>
                                            <input type="email" name="KH_Email" value="{{ old('KH_Email', $khachhang->KH_Email ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Địa chỉ</label>
                                            <input type="text" name="KH_DiaChi" value="{{ old('KH_DiaChi', $khachhang->KH_DiaChi ?? '') }}" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Mật khẩu<span class="text-danger">(*)</span></label>
                                            <input type="password" name="KH_MatKhau" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Nhập lại mật khẩu<span class="text-danger">(*)</span></label>
                                            <input type="password" name="KH_MatKhau_confirmation" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb15">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="" class="control-label text-left">Loại khách hàng<span class="text-danger">(*)</span></label>
                                            <select name="lkh_id" class="form-control">
                                                <option value="0">Chọn loại khách hàng</option>
                                                @if(isset($loaikhachhangs))
                                                    @foreach($loaikhachhangs as $lkh)
                                                        <option
                                                            {{ old('lkh_id', $khachhang->lkh_id ?? '') == $lkh->id ? 'selected' : '' }}
                                                            value="{{$lkh->id}}">
                                                            {{$lkh->LKH_TenLoai}}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label class="control-label text-left">Ngày sinh</label>
                                            <input type="date" name="KH_NgaySinh" value="{{ old('KH_NgaySinh', $khachhang->KH_NgaySinh ?? '') }}" class="form-control" autocomplete="off">
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
