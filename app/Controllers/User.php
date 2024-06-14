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

        return view('user_list', $data); // Mengirim data ke view
    }

    public function create()
    {
        return view('user_create'); // Menampilkan form tambah pengguna
    }

    public function store()
    {
        $model = new UserModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $model->save($data); // Menyimpan data pengguna

        return redirect()->to('/user'); // Redirect ke halaman daftar pengguna
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

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $model->update($id, $data); // Mengupdate data pengguna

        return redirect()->to('/user'); // Redirect ke halaman daftar pengguna
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id); // Menghapus pengguna berdasarkan ID

        return redirect()->to('/user'); // Redirect ke halaman daftar pengguna
    }
}
