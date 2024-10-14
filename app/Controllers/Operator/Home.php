<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data['total_tamu'] = count(model('BukuTamuModel')->findAll());
        $data['total_tamu_proses'] = count(model('BukuTamuModel')->where('foto is null')->findAll());
        $data['total_tamu_selesai'] = count(model('BukuTamuModel')->where('foto is not null')->findAll());
        return view('operator/index', $data);
    }
}
