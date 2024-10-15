<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;

class Kegiatan extends BaseController {
    protected $kegiatanModel;

    public function __construct() {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index() {
        $data['kegiatan'] = $this->kegiatanModel->findAll();
        return view("admin/kegiatan/index", $data);
    }

    public function tambah() {
        return view('admin/kegiatan/tambah');
    }

    public function simpan() {
        //

        // validasi
        $rules = [
            'tanggal_kegiatan' => 'required',
            'jenis_kategori_layanan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'hasil_kegiatan' => 'permit_empty',
            'rencana_tindak_lanjut' => 'required',
            'foto_kegiatan' => 'uploaded[foto_kegiatan]|max_size[foto_kegiatan,2048]|is_image[foto_kegiatan]',
            'penanggung_jawab_kegiatan' => 'required',
        ];
        $message = [
            'tanggal_kegiatan' => [
                'required' => 'Tanggal kegiatan wajib diisi',
            ],
            'jenis_kategori_layanan' => [
                'required' => 'Jenis kategori layanan wajib diisi',
            ],
            'deskripsi_kegiatan' => [
                'required' => 'Deskripsi kegiatan wajib diisi',
            ],
            'rencana_tindak_lanjut' => [
                'required' => 'Rencana tindak lanjut wajib diisi',
            ],
            'penanggung_jawab_kegiatan' => [
                'required' => 'Penanggung jawab kegiatan wajib diisi',
            ],
            'foto_kegiatan' => [
                'uploaded' => 'Foto kegiatan wajib diisi',
                'max_size' => 'Ukuran foto kegiatan maksimal 2MB',
                'is_image' => 'File yang diupload bukan gambar',
            ],
        ];
        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'jenis_kategori_layanan' => $this->request->getPost('jenis_kategori_layanan'),
            'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
            'hasil_kegiatan' => $this->request->getPost('hasil_kegiatan'),
            'rencana_tindak_lanjut' => $this->request->getPost('rencana_tindak_lanjut'),
            'penanggung_jawab_kegiatan' => $this->request->getPost('penanggung_jawab_kegiatan'),
        ];

        // ambil file foto
        $foto = $this->request->getFile('foto_kegiatan');
        $namaFoto = $foto->getRandomName();

        // pindahkan file foto
        if ($foto->isValid() && !$foto->hasMoved()) {
            $folderFoto = 'kegiatan/';
            $foto->move('uploads/' . $folderFoto, $namaFoto);
            $data['foto_kegiatan'] = $folderFoto . $namaFoto;
        }

        $res = $this->kegiatanModel->insert($data);

        if ($res) {
            return redirect()->to(base_url('admin/kegiatan'))->with('success', 'Data kegiatan berhasil disimpan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Data kegiatan gagal disimpan');
        }

    }

    public function edit($id) {
        $data['kegiatan'] = $this->kegiatanModel->find($id);
        return view('admin/kegiatan/edit', $data);
    }

    public function update($id) {
        //

        // validasi
        $rules = [
            'tanggal_kegiatan' => 'required',
            'jenis_kategori_layanan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'hasil_kegiatan' => 'permit_empty',
            'rencana_tindak_lanjut' => 'required',
            'foto_kegiatan' => 'max_size[foto_kegiatan,2048]|is_image[foto_kegiatan]',
            'penanggung_jawab_kegiatan' => 'required',
        ];
        $message = [
            'tanggal_kegiatan' => [
                'required' => 'Tanggal kegiatan wajib diisi',
            ],
            'jenis_kategori_layanan' => [
                'required' => 'Jenis kategori layanan wajib diisi',
            ],
            'deskripsi_kegiatan' => [
                'required' => 'Deskripsi kegiatan wajib diisi',
            ],
            'rencana_tindak_lanjut' => [
                'required' => 'Rencana tindak lanjut wajib diisi',
            ],
            'penanggung_jawab_kegiatan' => [
                'required' => 'Penanggung jawab kegiatan wajib diisi',
            ],
            'foto_kegiatan' => [
                'max_size' => 'Ukuran foto kegiatan maksimal 2MB',
                'is_image' => 'File yang diupload bukan gambar',
            ],
        ];
        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'jenis_kategori_layanan' => $this->request->getPost('jenis_kategori_layanan'),
            'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
            'hasil_kegiatan' => $this->request->getPost('hasil_kegiatan'),
            'rencana_tindak_lanjut' => $this->request->getPost('rencana_tindak_lanjut'),
            'penanggung_jawab_kegiatan' => $this->request->getPost('penanggung_jawab_kegiatan'),
        ];

        // ambil file foto
        $foto = $this->request->getFile('foto_kegiatan');

        // delete foto lama
        $kegiatan = $this->kegiatanModel->find($id);

        if ($foto->isValid() && !$foto->hasMoved()) {
            if (file_exists('uploads/' . $kegiatan->foto_kegiatan)) {
                deleteDirectory('uploads/' . $kegiatan->foto_kegiatan);
            }
            $folderFoto = 'kegiatan/';
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/' . $folderFoto, $namaFoto);
            $data['foto_kegiatan'] = $folderFoto . $namaFoto;
        }

        $res = $this->kegiatanModel->update($id, $data);

        if ($res) {
            return redirect()->to(base_url('admin/kegiatan'))->with('success', 'Data kegiatan berhasil diupdate');
        } else {
            return redirect()->back()->withInput()->with('error', 'Data kegiatan gagal diupdate');
        }
    }

    public function hapus($id) {
        $kegiatan = $this->kegiatanModel->find($id);

        if (file_exists('uploads/' . $kegiatan->foto_kegiatan)) {
            deleteDirectory('uploads/' . $kegiatan->foto_kegiatan);
        }

        $res = $this->kegiatanModel->delete($id);

        if ($res) {
            return redirect()->to(base_url('admin/kegiatan'))->with('success', 'Data kegiatan berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data kegiatan gagal dihapus');
        }
    }

}