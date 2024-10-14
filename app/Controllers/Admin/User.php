<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

// use App\Models\UserModel;

class User extends BaseController
{

    protected $usermodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
        // $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['user'] = $this->usermodel->findAll();
        return view("admin/user/index", $data);
    }
}
