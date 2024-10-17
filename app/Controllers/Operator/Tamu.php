<?php

namespace App\Controllers\Operator;

use DateTime;
use App\Models\UmkmModel;
use App\Models\BukuTamuModel;
use App\Controllers\BaseController;

class Tamu extends BaseController {

    protected $tamuModel, $umkmModel;

    public function __construct() {
        $this->tamuModel = new BukuTamuModel();
        $this->umkmModel = new UmkmModel();
    }

    public function index() {
        $data['tamu'] = $this->tamuModel->getTamu();
        return view("operator/buku_tamu/index", $data);
    }

    public function tambah() {
        $data = ['umkm' => $this->umkmModel->where("nama_umkm is not null and nama_umkm != ''")->findAll()];
        return view('operator/buku_tamu/tambah', $data);
    }

    /*
    * To-Do
    * Hapus tanggal keluar
    * Kategori tamu (umkm, umum)
    * Nama UMKM
    * Nama tamu
    */

    public function simpan() {
        // get current date and time with timezone Asia/Jakarta
        $currentDateTime = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new \DateTimeZone('Asia/Jakarta'));
        $currentDate = $currentDateTime->format('Y-m-d');
        $currentTime = $currentDateTime->format('H:i:s');

        $data = [
            'kategori_tamu' => $this->request->getPost('kategori_tamu'),
            'layanan' => $this->request->getPost('layanan'),
            'nama_tamu' => $this->request->getPost('nama_tamu'),
            'kategori_layanan' => $this->request->getPost('kategori_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal_bertamu' => $currentDate,
            'jam_kedatangan' => $currentTime,
            'kode_umkm' => ($this->request->getPost('nama_umkm') == '') ? null : $this->request->getPost('nama_umkm'),
        ];

        // dd($data);

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
        $currentTime = $currentDateTime->format('H:i:s');

        $id = $this->request->getPost('id_buku_tamu');

        $data = [
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