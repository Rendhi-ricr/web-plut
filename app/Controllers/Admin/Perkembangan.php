<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PerkembanganModels;
use App\Models\UmkmModels;


class Perkembangan extends BaseController
{
    protected $perkembanganModel, $umkmModel;
    public function __construct()
    {
        $this->perkembanganModel = new PerkembanganModels();
        $this->umkmModel = new UmkmModels();
    }

    public function index()
    {
        $data['perkembangan'] = $this->perkembanganModel->getAll();
        return view("admin/perkembangan/index", $data);
    }



    // public function tambah()
    // {
    //     $data = [];
    //     if ($this->request->getMethod() === 'post') {

    //         $kategoriModel = new KategoriModel();
    //         // $klasifikasi = $this->request->getPost('klasifikasi');
    //         // $kodeGedung = $gedungModel->generateKodeGedung($klasifikasi);
    //         $storeData = [
    //             // 'kode_gedung'   => $kodeGedung,
    //             'nama_kategori'   => $this->request->getPost('nama_kategori'),
    //             // 'keterangan'   => $this->request->getPost('keterangan'),

    //         ];
    //         $kategoriModel->insert($storeData);

    //         //flash message
    //         session()->setFlashdata('message', 'Faq berhasil disimpan');
    //         return redirect()->to('/panel/kategori');
    //     }
    //     return view('admin/kategori/tambah', $data);
    // }

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
