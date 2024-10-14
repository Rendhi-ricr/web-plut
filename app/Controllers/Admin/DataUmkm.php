<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UmkmModel;

// use App\Models\UserModel;

class DataUmkm extends BaseController
{

    protected $umkmModel;

    public function __construct()
    {
        $this->umkmModel = new UmkmModel();
        // $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['umkm'] = $this->umkmModel->findAll();
        return view("admin/umkm/index", $data);
    }

    public function hapus($id)
    {
        $res = $this->umkmModel->delete($id);
        if ($res) {
            return redirect()->to('admin/umkm')->with('success', 'Data berhasil di hapus! ');
        } else {
            return redirect()->to('admin/umkm')->with('error', 'Data gagal di hapus! ');
        }
    }
}
