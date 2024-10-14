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

    public function tambah()
    {
        return view('admin/user/tambah');
    }

    public function simpan()
    {

        //
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[t_users.email]',
            'sandi' => 'required|min_length[8]|matches[sandi_konfirmasi]',
            'sandi_konfirmasi' => 'required|matches[sandi]',
            'role' => 'required',
        ];
        $message = [
            'nama' => [
                'required' => 'Nama tidak boleh kosong.',
            ],
            'email' => [
                'required' => 'Email tidak boleh kosong.',
                'valid_email' => 'Email tidak valid.',
                'is_unique' => 'Email sudah terdaftar.',
            ],
            'sandi' => [
                'required' => 'Sandi tidak boleh kosong.',
                'min_length' => 'Sandi minimal 8 karakter.',
                'matches' => 'Sandi tidak sama.',
            ],
            'sandi_konfirmasi' => [
                'required' => 'Konfirmasi Sandi tidak boleh kosong.',
                'matches' => 'Konfirmasi Sandi tidak sama.',
            ],
            'role' => [
                'required' => 'Role tidak boleh kosong.',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->withInput();
        }

        $res = $this->usermodel->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('sandi'), PASSWORD_BCRYPT),
            'role' => $this->request->getPost('role'),
        ]);

        if ($res) {
            return redirect()->to('admin/user')->with('success', 'Data berhasil di tambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data gagal di tambahkan!');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->usermodel->find($id);

        return view('admin/user/edit', $data);
    }

    public function update($id)
    {

        //
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[t_users.email,id_user, ' . $id . ']',
            'role' => 'required',
        ];
        $message = [
            'nama' => [
                'required' => 'Nama tidak boleh kosong.',
            ],
            'email' => [
                'required' => 'Email tidak boleh kosong.',
                'valid_email' => 'Email tidak valid.',
                'is_unique' => 'Email sudah terdaftar.',
            ],
            'role' => [
                'required' => 'Role tidak boleh kosong.',
            ],
        ];

        if (!$this->validate($rules, $message)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->withInput();
        }

        $res = $this->usermodel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ]);

        if ($this->request->getVar('sandi') && $this->request->getVar('sandi_konfirmasi')) {
            $rules = [
                'sandi' => 'required|min_length[8]|matches[sandi_konfirmasi]',
                'sandi_konfirmasi' => 'required|matches[sandi]',
            ];
            $message = [
                'sandi' => [
                    'required' => 'Sandi tidak boleh kosong.',
                    'min_length' => 'Sandi minimal 8 karakter.',
                    'matches' => 'Sandi tidak sama.',
                ],
                'sandi_konfirmasi' => [
                    'required' => 'Konfirmasi Sandi tidak boleh kosong.',
                    'matches' => 'Konfirmasi Sandi tidak sama.',
                ],
            ];

            if (!$this->validate($rules, $message)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->withInput();
            }

            $res = $this->usermodel->update($id, [
                'password' => password_hash($this->request->getPost('sandi'), PASSWORD_BCRYPT),
            ]);
        }

        if ($res) {
            return redirect()->to('admin/user')->with('success', 'Data berhasil di perbaharui!');
        } else {
            return redirect()->back()->with('error', 'Data gagal di perbaharui!');
        }
    }

    public function hapus($id)
    {
        $find = $this->usermodel->find($id);
        $res = false;

        if ($find) {
            $res = $this->usermodel->delete($id);
        }

        if ($res) {
            return redirect()->to('admin/user')->with('success', 'Data berhasil di hapus!');
        } else {
            return redirect()->back()->with('error', 'Data gagal di hapus!');
        }
    }
}
