<?php

namespace App\Http\Controllers;
use App\Models\KhuyenMai;
use App\Models\LoaiKhachHang;
use App\Models\SanPham;
use App\Http\Repositories\KhuyenMaiRepository;
use App\Http\Repositories\LoaiKhachHangRepository;
use App\Http\Repositories\SanPhamRepository;
use App\Http\Services\KhuyenMaiService;
use Illuminate\Http\Request;
use App\Http\Requests\KhuyenMaiRequest;
use App\Http\Requests\UpdateKhuyenMaiRequest;


class KhuyenMaiController extends Controller
{
    // protected $khuyenmaiRepo;
    protected $khuyenmaiSer;
    // protected $loaikhRepository;
    // protected $spRepository;

    public function __construct(
        KhuyenMaiService $khuyenmaiSer,
        // KhuyenMaiRepository $khuyenmaiRepo,
        // LoaiKhachHangRepository $loaikhRepository,
        // SanPhamRepository $spRepository,

    ) {
        $this->khuyenmaiSer = $khuyenmaiSer;
        // $this->khuyenmaiRepo = $khuyenmaiRepo;
        // $this->loaikhRepository = $loaikhRepository;
        // $this->spRepository = $spRepository;
    }
    public function indexKhuyenMai(Request $request)
    {
        $khuyenmais = KhuyenMai::with(['sp', 'lkh'])->paginate(10);
        return view('khuyenmaiindex', compact('khuyenmais'));
    }

    public function createKhuyenMai()
    {
        $sanphams = SanPham::all();
        $loaikhachhangs = LoaiKhachHang::all();
        $template = 'khuyenmaicreate';
        $config['method'] = 'create';
        return view('khuyenmaicreate', compact('template', 'sanphams', 'loaikhachhangs', 'config'));
    }

    // public function storeKhachHang(KhachHangRequest $request)
    // {
    //     if ($this->khachhangSer->create($request)) {
    //         toastify()->success('Thêm mới bản ghi thành công.');
    //     } else {
    //         toastify()->error('Thêm mới bản ghi không thành công.');
    //     }
    //     return redirect()->route('khachhang.index');
    // }
    public function storeKhuyenMai(Request $request)
    {
        $request->validate([
            'KM_Ten' => 'required|string|max:255',
            'KM_PhanTramGiam' => 'required|numeric|min:0|max:100',
            'KM_NgayBatDau' => 'required|date',
            'KM_NgayKetThuc' => 'required|date|after_or_equal:KM_NgayBatDau',
            'KM_DieuKien' => 'nullable|string|max:255',
            'KM_SoLuong' => 'required|integer|min:1',
            'sp_id' => 'required|exists:sanpham,id',
            'lkh_id' => 'required|exists:loaikhachhang,id',
        ]);

        $this->khuyenmaiSer->create($request);

        return redirect()->route('khuyenmai.index')->with('success', 'Thêm khuyến mãi thành công!');
    }

    public function editKhuyenMai($id)
    {
        $khuyenmai = KhuyenMai::findOrFail($id);
        $sanphams = SanPham::all();
        $loaikhachhangs = LoaiKhachHang::all();
        $template = 'khuyenmaicreate';
        $config['method'] = 'edit';
        return view('khuyenmaicreate', compact('template', 'khuyenmai', 'sanphams', 'loaikhachhangs', 'config'));
    }
    // public function updateKhachHang(UpdateKhachHangRequest $request, $id)
    // {
    //     if ($this->khachhangSer->update($request, $id)) {
    //         toastify()->success('Cập nhật bản ghi thành công.');
    //     } else {
    //         toastify()->error('Cập nhật  bản ghi không thành công.');
    //     }
    //     return redirect()->route('khachhang.index');
    // }

    public function updateKhuyenMai(Request $request, $id)
    {
        $request->validate([
            'KM_Ten' => 'required|string|max:255',
            'KM_PhanTramGiam' => 'required|numeric|min:0|max:100',
            'KM_NgayBatDau' => 'required|date',
            'KM_NgayKetThuc' => 'required|date|after_or_equal:KM_NgayBatDau',
            'KM_DieuKien' => 'nullable|string|max:255',
            'KM_SoLuong' => 'required|integer|min:1',
            'sp_id' => 'required|exists:sanpham,id',
            'lkh_id' => 'required|exists:loaikhachhang,id',
        ]);

        $this->khuyenmaiSer->update($request, $id);

        return redirect()->route('khuyenmai.index')->with('success', 'Cập nhật khuyến mãi thành công!');
    }

    public function deleteKhuyenMai($id)
    {
        $result = $this->khuyenmaiSer->destroy($id);

        if ($result) {
            return redirect()->route('khuyenmai.index')->with('success', 'Xóa khuyến mãi thành công!');
        } else {
            return redirect()->route('khuyenmai.index')->with('error', 'Không tìm thấy khuyến mãi!');
        }
    }

}
