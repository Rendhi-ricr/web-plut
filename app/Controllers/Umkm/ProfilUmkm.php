<?php

namespace App\Controllers\Umkm;

use App\Controllers\BaseController;
use App\Models\UmkmModel;

class ProfilUmkm extends BaseController {

    protected $umkmModel;

    public function __construct() {
        $this->umkmModel = new UmkmModel();

    }

    public function index() {
        $data['umkm'] = $this->umkmModel->find(model('UserModel')->getLoginData()->kode_umkm);

        return view("umkm/profil-umkm/index", $data);
    }

    public function update() {
        $id_umkm = model('UserModel')->getLoginData()->kode_umkm;

        // validate request
        $rules = [
            'nama_umkm' => 'alpha_numeric_space|permit_empty',
            'alamat' => 'alpha_numeric_space|permit_empty',
            'desa_kel' => 'alpha_space|permit_empty',
            'kecamatan' => 'alpha_space|permit_empty',
            'kode_pos' => 'numeric|exact_length[5]|permit_empty',
            'telp' => 'numeric|permit_empty',
            'email' => 'valid_email|permit_empty',
            'nik_pemilik' => 'required|numeric|exact_length[16]|is_unique[t_umkm.nik_pemilik,kode_umkm,' . $id_umkm . ']',
            'nama_pemilik' => 'required|alpha_space',
            'alamat_pemilik' => 'required|alpha_numeric_space',
            'pendidikan_terakhir' => 'required|alpha_space',
            'tahun_beroperasi' => 'required|numeric|exact_length[4]|permit_empty',
            'jenis_usaha' => 'required|alpha_space|permit_empty',
            'wilayah_pemasaran' => 'permit_empty|alpha_space',
            'media_pemasaran' => 'permit_empty|alpha_space',
            'jumlah_modal_sendiri' => 'numeric|permit_empty',
            'jumlah_modal_pinjaman' => 'numeric|permit_empty',

        ];
        $message = [
            'nama_umkm' => [
                'alpha_numeric_space' => 'Nama UMKM hanya boleh berisi huruf, angka, dan spasi',
            ],
            'alamat' => [
                'alpha_numeric_space' => 'Alamat hanya boleh berisi huruf, angka, dan spasi',
            ],
            'desa_kel' => [
                'alpha_space' => 'Desa/Kelurahan hanya boleh berisi huruf dan spasi',
            ],
            'kecamatan' => [
                'alpha_space' => 'Kecamatan hanya boleh berisi huruf dan spasi',
            ],
            'kode_pos' => [
                'numeric' => 'Kode Pos harus berupa angka',
                'exact_length' => 'Kode Pos harus terdiri dari 5 angka',
            ],
            'telp' => [
                'numeric' => 'Nomor Telepon harus berupa angka',
            ],
            'email' => [
                'valid_email' => 'Email tidak valid',
            ],
            'nik_pemilik' => [
                'required' => 'NIK Pemilik wajib diisi',
                'numeric' => 'NIK Pemilik harus berupa angka',
                'exact_length' => 'NIK Pemilik harus terdiri dari 16 angka',
                'is_unique' => 'NIK Pemilik sudah terdaftar',
            ],
            'nama_pemilik' => [
                'required' => 'Nama Pemilik wajib diisi',
                'alpha_space' => 'Nama Pemilik hanya boleh berisi huruf dan spasi',
            ],
            'alamat_pemilik' => [
                'required' => 'Alamat Pemilik wajib diisi',
                'alpha_numeric_space' => 'Alamat Pemilik hanya boleh berisi huruf, angka, dan spasi',
            ],
            'pendidikan_terakhir' => [
                'required' => 'Pendidikan Terakhir wajib diisi',
                'alpha_space' => 'Pendidikan Terakhir hanya boleh berisi huruf dan spasi',
            ],
            'tahun_beroperasi' => [
                'required' => 'Tahun Beroperasi wajib diisi',
                'numeric' => 'Tahun Beroperasi harus berupa angka',
                'exact_length' => 'Tahun Beroperasi harus terdiri dari 4 angka',
            ],
            'jenis_usaha' => [
                'required' => 'Jenis Usaha wajib diisi',
                'alpha_space' => 'Jenis Usaha hanya boleh berisi huruf dan spasi',
            ],
            'wilayah_pemasaran' => [
                'alpha_space' => 'Wilayah Pemasaran hanya boleh berisi huruf dan spasi',
            ],
            'media_pemasaran' => [
                'alpha_space' => 'Media Pemasaran hanya boleh berisi huruf dan spasi',
            ],
            'jumlah_modal_sendiri' => [
                'numeric' => 'Jumlah Modal Sendiri harus berupa angka',
            ],
            'jumlah_modal_pinjaman' => [
                'numeric' => 'Jumlah Modal Pinjaman harus berupa angka',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->to('/umkm/profil-umkm')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_umkm' => $this->request->getPost('nama_umkm'),
            'alamat' => $this->request->getPost('alamat'),
            'desa' => $this->request->getPost('desa_kel'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
            'nik_pemilik' => $this->request->getPost('nik_pemilik'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'alamat_pemilik' => $this->request->getPost('alamat_pemilik'),
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'tahun_beroperasi' => $this->request->getPost('tahun_beroperasi'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'wilayah_pemasaran' => $this->request->getPost('wilayah_pemasaran'),
            'media_pemasaran' => $this->request->getPost('media_pemasaran'),
            'jumlah_modal_sendiri' => $this->request->getPost('jumlah_modal_sendiri'),
            'jumlah_modal_pinjaman' => $this->request->getPost('jumlah_modal_pinjaman'),
        ];

        $res = $this->umkmModel->update($id_umkm, $data);

        if ($res) {
            return redirect()->to('/umkm/profil-umkm')->with('success', 'Data berhasil di perbaharui.');
        } else {
            return redirect()->to('/umkm/profil-umkm')->with('error', 'Data gagal di perbaharui.')->withInput();
        }
    }

    public function uploadFile() {
        //
        $id_umkm = model('UserModel')->getLoginData()->kode_umkm;
        $files = $this->request->getFiles();

        $folder = 'umkm/' . $id_umkm . '/dokumen/';

        foreach ($files as $key => $item) {
            if ($key == 'dok_nib') {
                if ($item != null && $item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move('uploads/' . $folder, $newName);
                    $data['dokumen_nib'] = $folder . $newName;
                }
            } else if ($key == 'dok_pirt') {
                if ($item != null && $item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move('uploads/' . $folder, $newName);
                    $data['dokumen_pirt'] = $folder . $newName;
                }
            } else if ($key == 'dok_halal') {
                if ($item != null && $item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move('uploads/' . $folder, $newName);
                    $data['dokumen_halal'] = $folder . $newName;
                }
            } else if ($key == 'dok_npwp') {
                if ($item != null && $item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move('uploads/' . $folder, $newName);
                    $data['dokumen_npwp'] = $folder . $newName;
                }
            } else if ($key == 'dok_lh') {
                if ($item != null && $item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move('uploads/' . $folder, $newName);
                    $data['dokumen_lh'] = $folder . $newName;
                }
            } else if ($key == 'dok_lain') {
                if ($item != null && $item->isValid() && !$item->hasMoved()) {
                    $newName = $item->getRandomName();
                    $item->move('uploads/' . $folder, $newName);
                    $data['dokumen_lainnya'] = $folder . $newName;
                }
            }

            if ($item->getName() != null) {
                $this->umkmModel->update($id_umkm, $data);
            }

        }

        return redirect()->to('/umkm/profil-umkm')->with('success', 'Dokumen berhasil diunggah.');

    }

    public function hapusFile($file_path) {
        $id_umkm = model('UserModel')->getLoginData()->kode_umkm;
        $umkm = $this->umkmModel->find($id_umkm);

        $folder = 'umkm/' . $id_umkm . '/dokumen/';
        $filePath = $folder . $file_path;

        if ($umkm->dokumen_nib == $filePath) {
            $this->umkmModel->update($id_umkm, ['dokumen_nib' => null]);
        } else if ($umkm->dokumen_pirt == $filePath) {
            $this->umkmModel->update($id_umkm, ['dokumen_pirt' => null]);
        } else if ($umkm->dokumen_halal == $filePath) {
            $this->umkmModel->update($id_umkm, ['dokumen_halal' => null]);
        } else if ($umkm->dokumen_npwp == $filePath) {
            $this->umkmModel->update($id_umkm, ['dokumen_npwp' => null]);
        } else if ($umkm->dokumen_lh == $filePath) {
            $this->umkmModel->update($id_umkm, ['dokumen_lh' => null]);
        } else if ($umkm->dokumen_lainnya == $filePath) {
            $this->umkmModel->update($id_umkm, ['dokumen_lainnya' => null]);
        }

        if (file_exists($filePath)) {
            deleteDirectory('uploads/' . $filePath);
        }

        return redirect()->to('/umkm/profil-umkm')->with('success', 'Dokumen berhasil dihapus.');

    }

}