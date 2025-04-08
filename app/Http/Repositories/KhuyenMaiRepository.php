<?php

namespace App\Http\Repositories;

use App\Models\KhuyenMai;

class KhuyenMaiRepository extends BaseRepository{
    protected $model;

    public function __construct(KhuyenMai $model){
        $this->model = $model;
    }

    // Phương thức lấy toàn bộ khuyến mãi từ bảng discounts
    public function all()
    {
        return $this->model->all();  // Trả về tất cả bản ghi trong bảng discounts
    }
}
