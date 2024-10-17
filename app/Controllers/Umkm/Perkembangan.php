<?php

namespace App\Controllers\Umkm;

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
        $id_umkm = model('UserModel')->getLoginData()->kode_umkm;
        $data['perkembangan'] = $this->perkembanganModel->joinUmkm($id_umkm);
        return view("umkm/perkembangan/index", $data);
    }

    public function tambah() {
        $id_umkm = model('UserModel')->getLoginData()->kode_umkm;
        $data['umkm'] = $this->umkmModel->find($id_umkm);
        return view('umkm/perkembangan/tambah', $data);
    }

    public function simpan() {
        $id_umkm = model('UserModel')->getLoginData()->kode_umkm;

        // validate request
        $rules = [
            'tahun' => 'required|numeric|exact_length[4]',
            'omzet' => 'required|numeric',
            'asset' => 'required|numeric',
            'produk_unggulan' => 'required|alpha_numeric_punct',
            'jumlah_tenaga_kerja' => 'required|numeric',
            'foto_produk' => 'uploaded[foto_produk]|max_size[foto_produk,1024]|is_image[foto_produk]|mime_in[foto_produk,image/jpg,image/jpeg,image/png]',
        ];

        $message = [
            'tahun' => [
                'required' => 'Tahun wajib diisi',
                'numeric' => 'Tahun hanya boleh berisi angka',
                'exact_length' => 'Tahun harus berisi 4 digit',
            ],
            'omzet' => [
                'required' => 'Omzet wajib diisi',
                'numeric' => 'Omzet hanya boleh berisi angka',
            ],
            'asset' => [
                'required' => 'Asset wajib diisi',
                'numeric' => 'Asset hanya boleh berisi angka',
            ],
            'produk_unggulan' => [
                'required' => 'Produk Unggulan wajib diisi',
                'alpha_numeric_punct' => 'Produk Unggulan hanya boleh berisi huruf, angka, tanda baca, dan spasi',
            ],
            'jumlah_tenaga_kerja' => [
                'required' => 'Jumlah Tenaga Kerja wajib diisi',
                'numeric' => 'Jumlah Tenaga Kerja hanya boleh berisi angka',
            ],
            'foto_produk' => [
                'uploaded' => 'Foto Produk wajib diisi',
                'max_size' => 'Ukuran Foto Produk maksimal 1MB',
                'is_image' => 'Foto Produk harus berupa gambar',
                'mime_in' => 'Foto Produk harus berupa gambar dengan format jpg, jpeg, atau png',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'kode_umkm' => $id_umkm,
            'tahun' => $this->request->getPost('tahun'),
            'omzet' => $this->request->getPost('omzet'),
            'asset' => $this->request->getPost('asset'),
            'produk_unggulan' => $this->request->getPost('produk_unggulan'),
            'jumlah_tenaga_kerja' => $this->request->getPost('jumlah_tenaga_kerja'),
        ];

        $file = $this->request->getFile('foto_produk');

        $folder = 'umkm/' . $id_umkm . '/foto_produk/';

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/' . $folder, $newName);
            $data['foto_produk'] = $folder . $newName;
        }

        $res = $this->perkembanganModel->insert($data);

        if ($res) {
            return redirect()->to(base_url('umkm/perkembangan'))->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Data gagal disimpan');
        }
    }

    public function edit($id_perkembangan) {
        $data['perkembangan'] = $this->perkembanganModel->getPerkembanganById($id_perkembangan);
        return view('umkm/perkembangan/edit', $data);
    }

    public function update($id_perkembangan) {
        $id_umkm = model('UserModel')->getLoginData()->kode_umkm;
        // validate request
        $rules = [
            'tahun' => 'required|numeric|exact_length[4]',
            'omzet' => 'required|numeric',
            'asset' => 'required|numeric',
            'produk_unggulan' => 'required|alpha_numeric_space',
            'jumlah_tenaga_kerja' => 'required|numeric',
            'foto_produk' => 'max_size[foto_produk,1024]|is_image[foto_produk]|mime_in[foto_produk,image/jpg,image/jpeg,image/png]',
        ];

        $message = [
            'tahun' => [
                'required' => 'Tahun wajib diisi',
                'numeric' => 'Tahun hanya boleh berisi angka',
                'exact_length' => 'Tahun harus berisi 4 digit',
            ],
            'omzet' => [
                'required' => 'Omzet wajib diisi',
                'numeric' => 'Omzet hanya boleh berisi angka',
            ],
            'asset' => [
                'required' => 'Asset wajib diisi',
                'numeric' => 'Asset hanya boleh berisi angka',
            ],
            'produk_unggulan' => [
                'required' => 'Produk Unggulan wajib diisi',
                'alpha_numeric_punct' => 'Produk Unggulan hanya boleh berisi huruf, angka, dan spasi',
            ],
            'jumlah_tenaga_kerja' => [
                'required' => 'Jumlah Tenaga Kerja wajib diisi',
                'numeric' => 'Jumlah Tenaga Kerja hanya boleh berisi angka',
            ],
            'foto_produk' => [
                'max_size' => 'Ukuran Foto Produk maksimal 1MB',
                'is_image' => 'Foto Produk harus berupa gambar',
                'mime_in' => 'Foto Produk harus berupa gambar dengan format jpg, jpeg, atau png',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tahun' => $this->request->getPost('tahun'),
            'omzet' => $this->request->getPost('omzet'),
            'asset' => $this->request->getPost('asset'),
            'produk_unggulan' => $this->request->getPost('produk_unggulan'),
            'jumlah_tenaga_kerja' => $this->request->getPost('jumlah_tenaga_kerja'),
        ];

        $oldFile = $this->perkembanganModel->find($id_perkembangan)->foto_produk;

        $file = $this->request->getFile('foto_produk');

        $folder = 'umkm/' . $id_umkm . '/foto_produk/';

        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists('uploads/' . $oldFile)) {
                deleteDirectory('uploads/' . $oldFile);
            }
            $newName = $file->getRandomName();
            $file->move('uploads/' . $folder, $newName);
            $data['foto_produk'] = $folder . $newName;
        }

        $res = $this->perkembanganModel->update($id_perkembangan, $data);

        if ($res) {
            return redirect()->to(base_url('umkm/perkembangan'))->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->withInput()->with('error', 'Data gagal diupdate');
        }
    }

    public function hapus($id_perkembangan) {
        $res = $this->perkembanganModel->delete($id_perkembangan);

        // delete file
        $oldFile = $this->perkembanganModel->find($id_perkembangan)->foto_produk;
        if (file_exists('uploads/' . $oldFile)) {
            deleteDirectory('uploads/' . $oldFile);
        }

        if ($res) {
            return redirect()->to(base_url('umkm/perkembangan'))->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to(base_url('umkm/perkembangan'))->with('error', 'Data gagal dihapus');
        }
    }

}