<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;
// use App\Models\UmkmPerkembanganModel;

class Kegiatan extends BaseController
{
    protected $kegiatanModel;
    public function __construct()
    {
        // $this->perkembanganModel = new UmkmPerkembanganModel();
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data['kegiatan'] = $this->kegiatanModel->findAll();
        return view("admin/kegiatan/index", $data);
    }

    public function tambah()
    {
        return view('admin/kegiatan/tambah');
    }
}
