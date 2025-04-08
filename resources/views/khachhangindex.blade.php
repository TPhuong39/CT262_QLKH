<!DOCTYPE html>
{{-- @toastifyCss --}}
<html>

<head>
    <base href="http://127.0.0.1:8000/khachhang/index">
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
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Quản lý khách hàng</h2>
                    <ol class="breadcrumb" style="margin-bottom: 10px">
                        {{-- <li class="active"><strong>Khách hàng</strong></li> --}}
                    </ol>
                </div>

                <div class="col-lg-1 col-lg-offset-3 p-2"
                    style="border: 1px solid black; padding: 5px; width: 30px; font-size: 2rem; margin-top:30px; margin-right:1px; ">
                    <a id="back-to-home" href="{{ route('home') }}" title="Về trang chủ"><i class="fa fa-home"></i></a>
                </div>
                <div class="col-lg-1 p-2"
                    style="border: 1px solid black; padding: 5px; width: 30px; font-size: 2rem; margin-top:30px; margin-right:1px; ">
                    <a id="select-sche" href="{{ route('khuyenmai.index') }}" title="Khuyến mãi"><i
                            class="fa fa-tags"></i></a>
                </div>
                <div class="col-lg-1 p-2"
                    style="border: 1px solid black; padding: 5px; width: 30px; font-size: 2rem; margin-top:30px; margin-right:1px; ">
                    <a id="select-sche" href="{{ route('danhgiaindex.index') }}" title="Xem đánh giá"><i
                            class="fa fa-star"></i></a>
                            {{-- {{ route('danhgiaindex.index') }} --}}
                </div>
                <div class="col-lg-1 p-2" style="border: 1px solid black; padding: 5px; width: 30px; font-size: 2rem; margin-top:30px;">
                    <a href="{{ route('staff.logout') }}" title="Đăng xuất"><i class="fa fa-sign-out"></i></a>
                </div>

                {{-- <div class="text-right" style="margin: 5px 10px -3px;">
                    <strong><span>Xin chào: {{ Auth::guard('staff')->user()->ten }}</span></strong>
                </div> --}}
            </div>

            <div class="row mt20">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Danh sách khách hàng</h5>
                        </div>

                        <div class="ibox-content">
                            <div class="text-right mb-3">
                                <a href="{{ route('khachhang.create') }}" class="btn btn-danger">
                                    <i class="fa fa-plus mr-1"></i> Thêm mới khách hàng
                                </a>
                            </div>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Ngày Sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Loại khách hàng</th>
                                        <th class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($khachhangs) && $khachhangs->isNotEmpty())
                                        @foreach ($khachhangs as $kh)
                                            <tr>
                                                <td>{{ $kh->id }}</td>
                                                <td>{{ $kh->KH_HoTen }}</td>
                                                <td>{{ $kh->KH_NgaySinh }}</td>
                                                <td>{{ $kh->KH_DiaChi }}</td>
                                                <td>{{ $kh->KH_SDT }}</td>
                                                <td>{{ $kh->KH_Email }}</td>
                                                <td>{{ $kh->lkh?->LKH_TenLoai ?? 'Không xác định' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('khachhang.edit', $kh->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    {{-- {{ route('khachhang.edit', $kh->id) }} --}}
                                                    <form action="{{ route('khachhang.delete', $kh->id) }}" method="POST" style="display:inline;">
                                                        {{-- {{ route('khachhang.delete', $kh->id) }} --}}
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
                                            <td colspan="6" class="text-center">Không có dữ liệu khách hàng.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            {{ $khachhangs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
{{-- @toastifyJs --}}
