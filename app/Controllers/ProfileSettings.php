<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileSettings extends BaseController {
    public function index() {
        return view('settings/index');
    }

    public function update_profil() {
        $user = new UserModel();

        $id = $user->getLoginData()->id_user;

        // Validasi
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[t_users.email,id_user,' . $id . ']',
            'foto' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama lengkap harus diisi',
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah terdaftar',
            ],
            'foto' => [
                'max_size' => 'Ukuran gambar terlalu besar',
                'is_image' => 'File yang diupload bukan gambar',
                'mime_in' => 'File yang diupload bukan gambar',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to('/settings#account')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        ];

        $file = $this->request->getFile('foto');

        if ($file->getError() == 4) {
            $namaFile = $user->getLoginData()->foto;
        } else {
            if ($user->getLoginData()->foto != 'foto_profil/default.jpg') {
                if (file_exists('uploads/' . $user->getLoginData()->foto)) {
                    deleteDirectory('uploads/' . $user->getLoginData()->foto);
                }
            }
            $namaFile = $file->getRandomName();
            $file->move('uploads/foto_profil', $namaFile);

            $data['foto'] = 'foto_profil/' . $namaFile;
        }

        $res = $user->update($id, $data);

        if ($res) {
            return redirect()->to('/settings#account')->with('success', 'Profil berhasil diupdate');
        } else {
            return redirect()->to('/settings#account')->with('error', 'Profil gagal diupdate')->withInput();
        }

    }

    public function update_sandi() {
        $user = new UserModel();

        $id = $user->getLoginData()->id_user;

        // Validasi
        $rules = [
            'current_password' => 'required|checkOldPassword[' . $id . ']',
            'password' => 'required|min_length[8]|matches[password_confirm]',
            'password_confirm' => 'required|matches[password]',
        ];

        $message = [
            'current_password' => [
                'required' => 'Password saat ini harus diisi',
                'checkOldPassword' => 'Password saat ini salah',
            ],
            'password' => [
                'required' => 'Password baru harus diisi',
                'min_length' => 'Password minimal 8 karakter',
                'matches' => 'Password tidak sama dengan konfirmasi password',
            ],
            'password_confirm' => [
                'required' => 'Konfirmasi password harus diisi',
                'matches' => 'Konfirmasi password tidak sama dengan password',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->to('/settings#password')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        ];

        $res = $user->update($id, $data);

        if ($res) {
            return redirect()->to('/settings#password')->with('success', 'Password berhasil diupdate');
        } else {
            return redirect()->to('/settings#password')->with('error', 'Password gagal diupdate')->withInput();
        }
    }
}