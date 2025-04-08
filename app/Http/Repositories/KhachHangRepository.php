<?php

namespace App\Http\Repositories;

use App\Models\KhachHang;

class KhachHangRepository extends BaseRepository{
    protected $model;
    public function __construct(KhachHang $model){
        $this->model = $model;
    }
}
