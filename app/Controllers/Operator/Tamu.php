<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\TamuModels;
// use App\Models\UserModel;


class Tamu extends BaseController
{
    protected $tamuModel;
    public function __construct()
    {
        $this->tamuModel = new TamuModels();
        // $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['tamu'] = $this->tamuModel->findAll();
        return view("operator/index", $data);
    }



    public function tambah()
    {
        $data = [];
        return view('operator/tambah', $data);
    }

    // public function edit($id_kategori)
    // {
    //     // Mencari item berdasarkan ID yang diberikan
    //     $data = [
    //         'kategori' => $this->kategoriModel->data_kategori($id_kategori),

    //     ];

    //     // Memeriksa apakah form telah di-submit dengan metode POST
    //     if ($this->request->getMethod() === 'post') {


    //         // Mengumpulkan data yang akan diperbarui
    //         $updateData = [
    //             'nama_kategori'   => $this->request->getPost('nama_kategori'),
    //         ];

    //         // Memperbarui data item di database
    //         $this->kategoriModel->update($id_kategori, $updateData);

    //         // Menampilkan pesan sukses
    //         session()->setFlashdata('message', 'Item berhasil diperbarui');
    //         return redirect()->to('/panel/kategori');
    //     }

    //     // Menampilkan view dengan data item dan kategori
    //     return view('admin/kategori/edit', $data);
    // }
}
