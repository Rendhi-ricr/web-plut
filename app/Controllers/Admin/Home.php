<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController {
    public function index() {
        $data['total_umkm'] = count(model('UmkmModel')->findAll());
        $data['total_perkembangan'] = count(model('UmkmPerkembanganModel')->findAll());
        $data['total_kegiatan'] = count(model('KegiatanModel')->findAll());
        $data['total_tamu'] = count(model('BukuTamuModel')->findAll());
        $data['total_user'] = count(model('UserModel')->findAll());
        return view('admin/index', $data);
    }
}