<?php

namespace App\Controllers\Umkm;

use App\Controllers\BaseController;

class Home extends BaseController {
    public function index() {
        //
        return view('umkm/index');
    }
}