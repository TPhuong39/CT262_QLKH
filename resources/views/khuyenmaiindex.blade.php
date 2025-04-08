<!DOCTYPE html>
{{-- @toastifyCss --}}
<html>

<head>
    <base href="http://127.0.0.1:8000/khuyenmai/index">
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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Quản lý khuyến mãi</h2>
                    <ol class="breadcrumb" style="margin-bottom: 10px">
                        {{-- <li class="active"><strong>Khách hàng</strong></li> --}}
                    </ol>
                </div>

                <div class="col-lg-1 col-lg-offset-3 p-2"
                    style="border: 1px solid black; padding: 5px; width: 30px; font-size: 2rem; margin-top:30px; margin-right:5px; ">
                    <a id="back-to-home" href="{{ route('khachhang.index') }}" title="Khách hàng"><i class="fa fa-users"></i></a>
                </div>
                <div class="col-lg-1 p-2" style="border: 1px solid black; padding: 5px; width: 30px; font-size: 2rem; margin-top:30px;">
                    <a href="{{ route('staff.logout') }}" title="Đăng xuất"><i class="fa fa-sign-out"></i></a>
                </div>
                {{-- <div class="col-lg-1 p-2"
                    style="border: 1px solid black; padding: 5px; width: 30px; font-size: 2rem; margin-top:30px; margin-right:5px; ">
                    <a id="select-sche" href="#" title="Khuyến mãi"><i
                            class="fa fa-tags"></i></a>
                </div> --}}

                {{-- {{ route('logout') }} --}}
                {{-- <div class="text-right" style="margin: 5px 10px -3px;">
                    <strong><span>Xin chào: {{ Auth::guard('staff')->user()->ten }}</span></strong>
                </div> --}}
            </div>

            <div class="row mt20">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Danh sách khuyến mãi</h5>
                        </div>

                        <div class="ibox-content">
                            <div class="text-right mb-3">
                                <a href="{{ route('khuyenmai.create') }}" class="btn btn-danger">
                                    <i class="fa fa-plus mr-1"></i> Thêm mới khuyến mãi
                                </a>
                            </div>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khuyến mãi</th>
                                        <th>Phần trăm giảm</th>
                                        <th>Ngày/Giờ bắt đầu</th>
                                        <th>Ngày/Giờ kết thúc</th>
                                        <th>Điều kiện</th>
                                        <th>Số lượng</th>
                                        <th>Loại khách hàng</th>
                                        <th>Sản phẩm áp dụng</th>
                                        <th class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($khuyenmais) && $khuyenmais->isNotEmpty())
                                        @foreach ($khuyenmais as $km)
                                            <tr>
                                                <td>{{ $km->id }}</td>
                                                <td>{{ $km->KM_Ten }}</td>
                                                <td>{{ $km->KM_PhanTramGiam }}%</td>
                                                <td>{{ $km->KM_NgayBatDau }}</td>
                                                <td>{{ $km->KM_NgayKetThuc }}</td>
                                                <td>{{ $km->KM_DieuKien }}</td>
                                                <td>{{ $km->KM_SoLuong }}</td>
                                                <td>{{ $km->lkh?->LKH_TenLoai ?? 'Không xác định' }}</td>
                                                <td>{{ $km->sp?->SP_Ten ?? 'Không xác định' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('khuyenmai.edit', $km->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    {{-- {{ route('khuyenmai.edit', $km->id) }}0 --}}
                                                    <form action="{{ route('khuyenmai.delete', $km->id) }}" method="POST" style="display:inline;">
                                                        {{-- {{ route('khuyenmai.delete', $km->id) }} --}}
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">Không có dữ liệu.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            {{ $khuyenmais->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
{{-- @toastifyJs --}}
