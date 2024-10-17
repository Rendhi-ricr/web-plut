<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;

// use App\Models\UserModel;

class Tamu extends BaseController
{

    protected $bukutamuModel;

    public function __construct()
    {
        $this->bukutamuModel = new BukuTamuModel();
        // $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['tamu'] = $this->bukutamuModel->getTamu();
        return view("admin/tamu/index", $data);
    }
}