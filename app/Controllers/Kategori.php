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
            $path =  $newName;
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
    public function ubah_kategori($id)
    {
        $kategoriModel = new KategoriModel();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori')
        ];

        $image = $this->request->getFile('ikon');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/icons', $newName);
            $data['ikon'] =  $newName;
        }

        // Simpan perubahan ke dalam database
        $kategoriModel->update($id, $data);

        // Redirect pengguna ke halaman yang sesuai
        return redirect()->to("/cmskategori");
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
    public function cari_kategori()
    {
        $session = session();
        $userId = $session->get('user_id');
        $model = new UserModel();

        $kategoriModel = new KategoriModel();

        $data['data'] = $model->getUserById($userId);
        $cari = $this->request->getGet('cari');
        if ($cari) {
            $kategoriModel->like('nama_kategori', $cari);
        }

        $data['kategori'] = $kategoriModel->findAll();

        return view('CMS/kategori/kategori',  $data);
    }


    public function index_subkategori($id_kategori)
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $kategoriModel = new KategoriModel();

        $data['data'] = $model->getUserById($userId);
        $data['subkategori'] = $kategoriModel->where('id_parent', $id_kategori)->findAll(); // Ambil subkategori yang memiliki parent_id sama dengan id_kategori
        $data['subkategori_limit'] = array_slice($data['subkategori'], 0, 4);
        $data['total_subkategori'] = count($data['subkategori']);
        $data['id_kat'] = $id_kategori;
        $data['parent_kategori'] = $kategoriModel->where('id', $id_kategori)->first();

        // Ambil kategori induk
        $parent_category = $kategoriModel->find($id_kategori);
        $data['parent_id'] = $parent_category ? $parent_category['id_parent'] : null;

        return view('CMS/kategori/subkategori', $data);
    }
    public function tambah_subkategori()
    {
        $kategoriModel = new KategoriModel();

        $image = $this->request->getFile('ikon');
        $path = 'default.jpg';

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/icons', $newName);
            $path =  $newName;
        }

        $session = session();
        $userId = $session->get('user_id');

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
            'ikon' => $path,
            'urutan' => 1,
            'id_parent' => $this->request->getPost('id_parent'),
            'id_user' => $userId,
        ];

        $kategoriModel->save($data);

        return $this->response->setJSON(['status' => true]);
    }
    public function ubah_subkategori($id)
    {
        $kategoriModel = new KategoriModel();
        $id_subkategori = $this->request->getPost('id_parent');

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori')
        ];

        $image = $this->request->getFile('ikon');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/icons', $newName);
            $data['ikon'] =  $newName;
        }

        // Simpan perubahan ke dalam database
        $kategoriModel->update($id, $data);

        // Redirect pengguna ke halaman yang sesuai
        return redirect()->to("/cmssubkategori/{$id_subkategori}");
    }

    public function hapus_subkategori($id)
    {
        $kategoriModel = new KategoriModel();
        $id_subkategori = $this->request->getPost('id_parent');
        if ($kategoriModel->find($id)) {
            $kategoriModel->delete($id);
            return redirect()->to("/cmssubkategori/{$id_subkategori}")->with('message', 'Kategori berhasil dihapus.');
        } else {
            return redirect()->to('/cmssubkategori')->with('error', 'Kategori tidak ditemukan.');
        }
    }
    public function cari_subkategori()
{
    $kategoriModel = new KategoriModel();

    // Ambil nilai 'id_parent' dari query string
    $id_subkategori = $this->request->getGet('id_parent');

    // Ambil nilai pencarian dari query string
    $cari = $this->request->getGet('cari');
    $data['subkategori'] = $kategoriModel->where('id_parent', $id_subkategori)->findAll();
    $data['subkategori_limit'] = array_slice($data['subkategori'], 0, 4);
        $data['total_subkategori'] = count($data['subkategori']);

    // Lakukan pencarian jika ada kata kunci pencarian
    if ($cari) {
        $kategoriModel->like('nama_kategori', $cari);
        // Tetapkan URL baru dengan id_subkategori dan parameter pencarian
        $newUrl = base_url("/cmssubkategori/{$id_subkategori}?cari={$cari}");
    } else {
        // Tetapkan URL baru tanpa parameter pencarian
        $newUrl = base_url("/cmssubkategori/{$id_subkategori}");
    }

    // Redirect ke URL baru
    return redirect()->to($newUrl);
}

}
