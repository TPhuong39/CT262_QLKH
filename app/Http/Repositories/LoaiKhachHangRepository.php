<?php

namespace App\Http\Repositories;

use App\Models\LoaiKhachHang ;

class LoaiKhachHangRepository extends BaseRepository{
    protected $model;
    public function __construct(LoaiKhachHang $model){
        $this->model = $model;
    }
}
