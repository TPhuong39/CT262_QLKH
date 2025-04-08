<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use App\Http\Repositories\KhachHangRepository;
use App\Http\Repositories\LoaiKhachHangRepository;
use App\Http\Services\KhachHangService;
use Illuminate\Http\Request;
use App\Http\Requests\KhachHangRequest;
use App\Http\Requests\UpdateKhachHangRequest;
use App\Models\LoaiKhachHang;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    protected $khachhangRepo;
    protected $khachhangSer;
    protected $loaikhRepository;

    public function __construct(
        KhachHangService $khachhangSer,
        KhachHangRepository $khachhangRepo,
        LoaiKhachHangRepository $loaikhRepository,

    ) {
        $this->khachhangSer = $khachhangSer;
        $this->khachhangRepo = $khachhangRepo;
        $this->loaikhRepository = $loaikhRepository;
    }
    public function indexKhachHang(Request $request)
    {
        $khachhangs = KhachHang::with('lkh')->paginate(10);
        return view('khachhangindex', compact('khachhangs'));
    }

    public function createKhachHang()
    {
        // $kh = $this->khachhangRepo->all();
        $loaikhachhangs = $this->loaikhRepository->all();
        $template = 'khachhangcreate';
        $config['method'] = 'create';
        return view('khachhangcreate', compact('template', 'loaikhachhangs', 'config'));
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
    public function storeKhachHang(KhachHangRequest $request)
    {
        $validated = $request->validate([
            'KH_HoTen' => 'required|string|max:255',
            'KH_NgaySinh' => 'required|date',
            'KH_SDT' => 'required|string|max:15',
            'KH_Email' => 'nullable|email',
            'KH_DiaChi' => 'nullable|string|max:255',
            'lkh_id' => 'required|exists:loaikhachhang,id',  // Kiểm tra loại khách hàng có tồn tại
            'KH_MatKhau' => 'required|string|min:6|confirmed',
        ]);

        // Lưu khách hàng mới
        KhachHang::create([
            'KH_HoTen' => $request->KH_HoTen,
            'KH_NgaySinh' => $request->KH_NgaySinh,
            'KH_SDT' => $request->KH_SDT,
            'KH_Email' => $request->KH_Email,
            'KH_DiaChi' => $request->KH_DiaChi,
            'KH_MatKhau' => bcrypt($request->KH_MatKhau),
            'lkh_id' => $request->lkh_id,  // Lưu loại khách hàng
        ]);

        return redirect()->route('khachhang.index')->with('success', 'Thêm khách hàng thành công!');
    }

    public function editKhachHang($id)
    {
        $khachhang = $this->khachhangRepo->findById($id);
        $loaikhachhangs = $this->loaikhRepository->all();
        $template = 'khachhangcreate';
        $config['method'] = 'edit';
        return view('khachhangcreate', compact('template', 'khachhang', 'loaikhachhangs', 'config'));
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

    public function updateKhachHang(UpdateKhachHangRequest $request, $id)
    {
        $request->validate([
            'KH_HoTen' => 'required|string|max:255',
            'KH_NgaySinh' => 'required|date',
            'KH_SDT' => 'required|string|max:15',
            'KH_Email' => 'nullable|email',
            'KH_DiaChi' => 'nullable|string|max:255',
            'lkh_id' => 'required|exists:loaikhachhang,id',
        ]);

        $khachhang = KhachHang::findOrFail($id);

        // Lấy dữ liệu trừ mật khẩu
        $data = $request->only(['KH_HoTen','KH_NgaySinh', 'KH_SDT', 'KH_Email', 'KH_DiaChi', 'lkh_id']);

        // Nếu người dùng có nhập mật khẩu mới thì mã hóa và thêm vào $data
        if ($request->filled('KH_MatKhau')) {
            $data['KH_MatKhau'] = Hash::make($request->KH_MatKhau);
        }

        // Cập nhật dữ liệu
        $khachhang->update($data);

        return redirect()->route('khachhang.index')->with('success', 'Cập nhật khách hàng thành công!');
    }

    public function deleteKhachHang($id)
    {
        $result = $this->khachhangSer->destroy($id);

        if ($result) {
            return redirect()->route('khachhang.index')->with('success', 'Khách hàng đã được xóa.');
        } else {
            return redirect()->route('khachhang.index')->with('error', 'Không tìm thấy khách hàng.');
        }
    }

}
