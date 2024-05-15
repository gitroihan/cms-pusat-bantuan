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
        $kategoriModel = new KategoriModel();
        $data['data'] = $model->getUserById($userId);
        $data['kategori'] = $kategoriModel->data_id_parent_null();
        return view('CMS/kategori/kategori',  $data);
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
    public function hapus_kategori($id)
    {
        $kategoriModel = new KategoriModel();
        if ($kategoriModel->find($id)) {
            $kategoriModel->delete($id);
            return redirect()->to('/cmskategori')->with('message', 'Kategori berhasil dihapus.');
        } else {
            return redirect()->to('/cmskategori')->with('error', 'Kategori tidak ditemukan.');
        }
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
