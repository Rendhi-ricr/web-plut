<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UmkmModel;
use App\Models\UmkmPerkembanganModel;

class Perkembangan extends BaseController {
    protected $perkembanganModel, $umkmModel;
    public function __construct() {
        $this->perkembanganModel = new UmkmPerkembanganModel();
        $this->umkmModel = new UmkmModel();
    }

    public function index() {
        $data['perkembangan'] = $this->perkembanganModel->getAllPerkembangan();
        return view("admin/perkembangan/index", $data);
    }

}