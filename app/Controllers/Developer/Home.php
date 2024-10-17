<?php

namespace App\Controllers\Developer;

use App\Controllers\BaseController;
use CodeIgniter\CodeIgniter;

class Home extends BaseController {
    public function index() {
        $data['total_umkm'] = count(model('UmkmModel')->findAll());
        $data['total_perkembangan'] = count(model('UmkmPerkembanganModel')->findAll());
        $data['total_tamu'] = count(model('BukuTamuModel')->findAll());
        $data['total_user'] = count(model('UserModel')->findAll());
        $data['total_kegiatan'] = count(model('KegiatanModel')->findAll());
        $data['total_tamu_proses'] = count(model('BukuTamuModel')->where('foto is null')->findAll());
        $data['total_tamu_selesai'] = count(model('BukuTamuModel')->where('foto is not null')->findAll());
        $data['CI_VERSION'] = CodeIgniter::CI_VERSION;
        $data['phpVersion'] = PHP_VERSION;
        $data['totalMemory'] = number_format(memory_get_peak_usage() / 1024 / 1024, 3);
        $data['totalMemoryReal'] = number_format(memory_get_peak_usage(true) / 1024 / 1024, 3);
        $data['totalMemoryUsage'] = number_format(memory_get_usage() / 1024 / 1024, 3);
        $data['startTime'] = $_SERVER['REQUEST_TIME_FLOAT'];
        $data['totalTime'] = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
        $data['segmentDuration'] = $this->roundTo($data['totalTime'] / 7);
        $data['segmentCount'] = (int) ceil($data['totalTime'] / $data['segmentDuration']);

        return view('developer/index', $data);
    }

    private function roundTo($number, $to = 2) {
        return round($number, $to);
    }
}