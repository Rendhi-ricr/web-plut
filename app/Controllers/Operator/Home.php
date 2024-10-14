<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;

class Home extends BaseController {
    public function index() {
        return view('operator/index');
    }
}