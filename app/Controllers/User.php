<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        $model = new UserModel(); // Inisialisasi model
        $data['users'] = $model->findAll(); // Mengambil semua data pengguna

        return view('user_list', $data); // Menampilkan halaman daftar pengguna
    }

    public function create()
    {
        return view('user_create'); // Menampilkan form tambah pengguna
    }

    public function store()
    {
        $model = new UserModel();

        // Ambil data dari form
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Simpan data pengguna
        if ($model->save($data)) {
            // Jika berhasil disimpan, kirim respons JSON success
            return $this->response->setJSON(['success' => true]);
        } else {
            // Jika gagal disimpan, kirim respons JSON error
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id); // Mengambil data pengguna berdasarkan ID

        return view('user_edit', $data); // Menampilkan form edit pengguna
    }

    public function update($id)
    {
        $model = new UserModel();

        // Ambil data dari form
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Update data pengguna
        $model->update($id, $data);

        return redirect()->to('/user'); // Redirect ke halaman daftar pengguna
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id); // Menghapus pengguna berdasarkan ID

        return redirect()->to('/user'); // Redirect ke halaman daftar pengguna
    }
}
