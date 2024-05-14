<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/kategori/kategori', ['data' => $data]);
    }
    public function tambah_kategori()
    {
        $kategoriModel = new KategoriModel();

        $image = $this->request->getFile('ikon');
        $path = 'default.jpg';

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/icons', $newName);
            $path = 'uploads/icons/' . $newName;
        }

        $session = session();
        $userId = $session->get('user_id');

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
            'ikon' => $path,
            'urutan' => 1,
            'id_parent' => null,
            'id_user' => $userId,
        ];

        $kategoriModel->save($data);

        return $this->response->setJSON(['status' => true]);
    }
    public function kategori2()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/kategori/kategori2', ['data' => $data]);
    }
}
