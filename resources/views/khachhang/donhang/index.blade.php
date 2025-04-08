@extends('khachhang.layouts.app')

@section('title', 'Lịch sử đơn hàng')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Lịch sử giao dịch</h3>
    </div>
    <div class="card-body">
        <!-- Debug information -->
        <div class="alert alert-info">
            {{-- <p>Đang thử nghiệm hiển thị dữ liệu...</p> --}}
            <p>Số lượng đơn hàng: {{ $donhangs->count() }}</p>
            <p>User ID: {{ Auth::guard('customer')->id() ?? 'Not logged in' }}</p>
        </div>

        @if($donhangs->isEmpty())
            <div class="alert alert-warning">
                Bạn chưa có đơn hàng nào.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Phương thức thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach($donhangs as $donhang)
                            <!-- Debug for each order -->
                            {{-- <tr>
                                <td colspan="5" class="bg-light">
                                    Order ID: {{ $donhang->id }} -
                                    Order Date: {{ $donhang->DH_NgayDat }} -
                                    Order Items: {{ $donhang->chitietDonHang->count() }}
                                </td>
                            </tr> --}}

                            @foreach($donhang->chitietDonHang as $chitiet)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>
                                        @if($chitiet->sanpham)
                                            {{ $chitiet->sanpham->SP_Ten }}
                                        @else
                                            <span class="text-danger">Sản phẩm không tồn tại (ID: {{ $chitiet->sp_id }})</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($chitiet->sanpham)
                                            {{ $chitiet->sanpham->SP_MoTa }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($donhang->DH_NgayDat)->format('d/m/Y H:i') }}</td>
                                    <td class="text-right">{{ number_format($donhang->DH_TongTien, 0, ',', '.') }} VND</td>
                                    <td class="text-right">{{ $donhang->DH_TrangThai }}</td>
                                    {{-- <td>
                                        @switch($donhang->DH_TrangThai)
                                            @case(0)
                                                <span class="badge badge-warning">Chưa thanh toán</span>
                                                @break
                                            @case(1)
                                                <span class="badge badge-success">Đã thanh toán</span>
                                                @break
                                            @default
                                                <span class="badge badge-secondary">Không xác định</span>
                                        @endswitch
                                    </td> --}}
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
