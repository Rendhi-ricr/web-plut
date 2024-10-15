<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UmkmModel;
use App\Models\UserModel;

class Auth extends BaseController {
    public function login_view() {
        //

        return view('auth/login');
    }

    public function register_view() {
        //

        return view('auth/register');
    }

    public function register_umkm_view() {
        //

        if (!session()->get('registered')) {
            return redirect()->to('register');
        }
        return view('auth/register-umkm');
    }

    public function login() {
        //
        $userModel = new UserModel();

        // Check the validation
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];
        $message = [
            'email' => [
                'required' => 'Email tidak boleh kosong.',
                'valid_email' => 'Email tidak valid.',
            ],
            'password' => [
                'required' => 'Password tidak boleh kosong.',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the email and password from the form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Check if the email exists in the database
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // Check if the password is correct
            if (password_verify($password, $user->password)) {
                // Set the session data for the user
                $this->session->set([
                    'id_user' => $user->id_user,
                    'role' => $user->role,
                    'logged_in' => TRUE,
                ]);

                // Check the role
                if ($user->role == 'admin') {
                    return redirect()->to('admin');
                } elseif ($user->role == 'umkm') {
                    return redirect()->to('umkm');
                } elseif ($user->role == 'operator') {
                    return redirect()->to('operator');
                } elseif ($user->role == 'developer') {
                    return redirect()->to('developer');
                }
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Email tidak ditemukan!');
            return redirect()->back()->withInput();
        }
    }

    public function register() {
        //
        $userModel = new UserModel();
        $umkmModel = new UmkmModel();

        // Check the validation
        $rules = [
            'nik' => 'required|is_unique[t_umkm.nik_pemilik]|min_length[16]|max_length[16]',
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[t_users.email]',
            'password' => 'required|min_length[8]|matches[password_confirm]',
            'password_confirm' => 'required|matches[password]',
        ];
        $message = [
            'nik' => [
                'required' => 'NIK tidak boleh kosong.',
                'is_unique' => 'NIK sudah terdaftar.',
                'min_length' => 'NIK harus 16 karakter.',
                'max_length' => 'NIK harus 16 karakter.',
            ],
            'nama' => [
                'required' => 'Nama tidak boleh kosong.',
            ],
            'email' => [
                'required' => 'Email tidak boleh kosong.',
                'valid_email' => 'Email tidak valid.',
                'is_unique' => 'Email sudah terdaftar.',
            ],
            'password' => [
                'required' => 'Password tidak boleh kosong.',
                'min_length' => 'Password minimal 8 karakter.',
                'matches' => 'Password tidak sama.',
            ],
            'password_confirm' => [
                'required' => 'Konfirmasi password tidak boleh kosong.',
                'matches' => 'Konfirmasi password tidak sama.',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->withInput();
        }

        // insert data to t_umkm
        $umkmModel->save([
            'nik_pemilik' => $this->request->getPost('nik'),
            'nama_pemilik' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        ]);

        //get last insert id
        $last_id = $umkmModel->getInsertID();

        // insert data to t_users
        $userModel->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => 'umkm',
            'kode_umkm' => $last_id,
        ]);

        if ($umkmModel && $userModel) {
            session()->setFlashdata('success', 'Pendaftaran berhasil! Silahkan lanjutkan pengisian data UMKM.');
            session()->set('registered', $last_id);
            return redirect()->to('register-umkm');
        } else {
            session()->setFlashdata('error', 'Pendaftaran gagal! Silahkan coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function register_umkm() {
        //
        $umkmModel = new UmkmModel();

        // Check the validation
        $rules = [
            'umkm' => 'required',
            'jenis_usaha' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
        ];
        $message = [
            'umkm' => [
                'required' => 'Nama UMKM tidak boleh kosong.',
            ],
            'jenis_usaha' => [
                'required' => 'Jenis usaha tidak boleh kosong.',
            ],
            'alamat' => [
                'required' => 'Alamat tidak boleh kosong.',
            ],
            'desa_kelurahan' => [
                'required' => 'Desa / Kelurahan tidak boleh kosong.',
            ],
            'kecamatan' => [
                'required' => 'Kecamatan tidak boleh kosong.',
            ],
            'kode_pos' => [
                'required' => 'Kode Pos tidak boleh kosong.',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $last_id = session()->get('registered');

        // insert data to t_umkm
        $umkmModel->update($last_id, [
            'nama_umkm' => $this->request->getPost('umkm'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
            'alamat' => $this->request->getPost('alamat'),
            'desa' => $this->request->getPost('desa_kelurahan'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'email' => $this->request->getPost('email'),
            'telp' => $this->request->getPost('telepon'),
        ]);

        if ($umkmModel) {
            session()->remove('registered');
            return redirect()->to('login')->with('success', 'Pendaftaran berhasil! Silahkan login.');
        } else {
            session()->setFlashdata('error', 'Pendaftaran gagal! Silahkan coba lagi.');
            return redirect()->back()->withInput();
        }
    }

    public function skip() {
        session()->destroy();
        return redirect()->to('login')->with('success', 'Pendaftaran berhasil! Silahkan login.');
    }

    public function logout() {
        //
        // Destroy the session
        session()->remove('registered');
        // Redirect to the login page
        session()->setFlashdata('message', 'Anda telah keluar dari aplikasi.');
        return redirect()->to("login")->with('message', 'Anda telah keluar dari sistem.');
    }

    public function forgot_password() {
        //
    }

    public function reset_password() {
        //
    }

    public function change_password() {
        //
    }
}