<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;
use DateTime;

class Tamu extends BaseController {

    protected $tamuModel;

    public function __construct() {
        $this->tamuModel = new BukuTamuModel();
        // $this->userModel = new UserModel();
    }

    public function index() {
        $data['tamu'] = $this->tamuModel->findAll();
        return view("operator/buku_tamu/index", $data);
    }

    public function tambah() {
        $data = [];
        return view('operator/buku_tamu/tambah', $data);
    }

    public function simpan() {
        // get current date and time with timezone Asia/Jakarta
        $currentDateTime = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new \DateTimeZone('Asia/Jakarta'));
        $currentDate = $currentDateTime->format('Y-m-d');
        $currentTime = $currentDateTime->format('H:i:s');

        $data = [
            'layanan' => $this->request->getPost('layanan'),
            'kategori_layanan' => $this->request->getPost('kategori_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal_kedatangan' => $currentDate,
            'jam_kedatangan' => $currentTime,
        ];

        $res = $this->tamuModel->insert($data);

        if ($res) {
            return redirect()->to('/operator/buku-tamu')->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->to('/operator/buku-tamu')->with('error', 'Data gagal disimpan.');
        }
    }

    public function edit($id) {
        $data['tamu'] = $this->tamuModel->find($id);
        return view('operator/buku_tamu/edit', $data);
    }

    public function update($id) {
        $data = [
            'layanan' => $this->request->getPost('layanan'),
            'kategori_layanan' => $this->request->getPost('kategori_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $res = $this->tamuModel->update($id, $data);

        if ($res) {
            return redirect()->to('/operator/buku-tamu')->with('success', 'Data berhasil di perbaharui.');
        } else {
            return redirect()->to('/operator/buku-tamu')->with('error', 'Data gagal di perbaharui.');
        }
    }

    public function hapus($id) {

        // delete file
        $oldFile = $this->tamuModel->find($id)->foto;
        if (file_exists('uploads/foto_tamu/' . $oldFile)) {
            deleteDirectory('uploads/foto_tamu/' . $oldFile);
        }

        $res = $this->tamuModel->delete($id);

        if ($res) {
            return redirect()->to('/operator/buku-tamu')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to('/operator/buku-tamu')->with('error', 'Data gagal dihapus.');
        }
    }

    public function selesai() {
        $currentDateTime = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new \DateTimeZone('Asia/Jakarta'));
        $currentDate = $currentDateTime->format('Y-m-d');
        $currentTime = $currentDateTime->format('H:i:s');

        $id = $this->request->getPost('id_buku_tamu');

        $data = [
            'tanggal_pulang' => $currentDate,
            'jam_pulang' => $currentTime,
        ];

        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/foto_tamu', $newName);
            $data['foto'] = $newName;
        }

        $res = $this->tamuModel->update($id, $data);

        if ($res) {
            return redirect()->to('/operator/buku-tamu')->with('success', 'Layanan tamu sudah selesai.');
        } else {
            return redirect()->to('/operator/buku-tamu')->with('error', 'Data gagal di perbaharui.');
        }
    }
}