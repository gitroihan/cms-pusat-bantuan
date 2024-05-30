<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;
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
        $kategoriData = $kategoriModel->data_id_parent_null();
        $data['kategori'] = $kategoriData['kategori'];
        $data['id_parents'] = $kategoriData['id_parents'];
        return view('CMS/kategori/kategori',  $data);
    }
    private function generateUniqueSlug($title)
    {
        $slug = url_title($title, '-', true);
        $kategoriModel = new KategoriModel();

        // Cek slug unik
        $count = 0;
        $newSlug = $slug;
        while ($kategoriModel->where('slug', $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }
    public function tambah_kategori()
    {
        $kategoriModel = new KategoriModel();

        // Membuat slug unik
        $namakategori = $this->request->getPost('nama_kategori');
        $slug = $this->generateUniqueSlug($namakategori);

        $image = $this->request->getFile('ikon');
        $path = 'default.png';

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $originalName = $image->getClientName();
            $targetDirectory = ROOTPATH . 'public/uploads/icons';
            $image->move($targetDirectory, $originalName);
            $path = $originalName;
        }


        $session = session();
        $userId = $session->get('user_id');

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
            'ikon' => $path,
            'id_parent' => null,
            'id_user' => $userId,
            'slug' => $slug,
        ];

        $kategoriModel->save($data);

        // Data untuk tabel riwayat
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'tambah',
            'aktivitas' => 'menambah kategori',
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);

        return $this->response->setJSON(['status' => true]);
    }
    public function ubah_kategori($id)
    {
        $kategoriModel = new KategoriModel();

        // Mendapatkan nama kategori di database
        $kategoriLama = $kategoriModel->find($id);
        $namaKategoriLama = $kategoriLama['nama_kategori'];

        // Mendapatkan nama kategori baru
        $namaKategoriBaru = $this->request->getPost('nama_kategori');

        // Membuat slug unik jika nama kategori berubah
        $slug = $namaKategoriLama === $namaKategoriBaru ? $kategoriLama['slug'] : $this->generateUniqueSlug($namaKategoriBaru);

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
            'slug' => $slug
        ];

        $image = $this->request->getFile('ikon');
        if ($image->isValid() && !$image->hasMoved()) {
            $originalName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads/icons', $originalName);
            $data['ikon'] = $originalName;
        }

        // Simpan perubahan ke dalam database
        $kategoriModel->update($id, $data);

        // Data untuk tabel riwayat
        $session = session();
        $userId = $session->get('user_id');
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'ubah',
            'aktivitas' => 'mengubah kategori',
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);

        // Redirect pengguna ke halaman yang sesuai
        return redirect()->to("/cmskategori");
    }
    public function hapus_kategori($id)
    {
        $kategoriModel = new KategoriModel();
        if ($kategoriModel->find($id)) {
            $kategoriModel->delete($id);

            // Data untuk tabel riwayat
            $session = session();
            $userId = $session->get('user_id');
            $riwayatModel = new LogAktivitasModel();
            $alamat_ip = $this->request->getIPAddress();
            $logData = [
                'id_ref' => $userId,
                'log_tipe' => 'hapus',
                'aktivitas' => 'menghapus kategori',
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);

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
        $kategoriQuery = $kategoriModel->where('id_parent', null);

        if ($cari) {
            $kategoriQuery->like('nama_kategori', $cari);
        }

        $kategori = $kategoriQuery->findAll();

        $data['kategori'] = $kategori;
        $data['id_parents'] = [];


        return view('CMS/kategori/kategori',  $data);
    }


    public function index_subkategori($id_kategori)
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $kategoriModel = new KategoriModel();
        $artikelModel = new ArtikelModel();

        $data['data'] = $model->getUserById($userId);
        $subcategoryDetails = $kategoriModel->getSubcategoriesWithDetails($id_kategori);
        $data['subkategori'] = $subcategoryDetails['subcategories'];
        $data['parentIds'] = $subcategoryDetails['parentIds'];
        $data['subkategori_limit'] = array_slice($data['subkategori'], 0, 4);
        $data['total_subkategori'] = count($data['subkategori']);
        $data['id_kat'] = $id_kategori;
        $data['parent_kategori'] = $kategoriModel->where('id', $id_kategori)->first();

        $data['subkategori_has_articles'] = false;
        $data['subkategori_articles'] = [];
        foreach ($data['subkategori'] as $sub) {
            $articles = $artikelModel->where('id_kategori', $sub['id'])->findAll();
            $data['subkategori_articles'][$sub['id']] = count($articles) > 0;
            if (count($articles) > 0) {
                $data['subkategori_has_articles'] = true;
            }
        }

        $data['breadcrumb'] = $this->getBreadcrumb($id_kategori, $kategoriModel);
        $depth = 0;
        $currentCategory = $kategoriModel->find($id_kategori);
        while ($currentCategory && $currentCategory['id_parent'] !== null) {
            $depth++;
            $currentCategory = $kategoriModel->find($currentCategory['id_parent']);
        }
        $data['subkategori_depth'] = $depth;

        return view('CMS/kategori/subkategori', $data);
    }

    private function getBreadcrumb($id_kategori, $kategoriModel)
    {
        $breadcrumb = [];
        while ($id_kategori != null) {
            $kategori = $kategoriModel->find($id_kategori);
            array_unshift($breadcrumb, $kategori);
            $id_kategori = $kategori['id_parent'];
        }
        return $breadcrumb;
    }

    public function tambah_subkategori()
    {
        $kategoriModel = new KategoriModel();

        $image = $this->request->getFile('ikon');
        $path = 'default.png';

        // Membuat slug unik
        $namakategori = $this->request->getPost('nama_kategori');
        $slug = $this->generateUniqueSlug($namakategori);

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $originalName = $image->getClientName();
            $targetDirectory = ROOTPATH . 'public/uploads/icons';
            $image->move($targetDirectory, $originalName);
            $path = $originalName;
        }


        $session = session();
        $userId = $session->get('user_id');

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
            'ikon' => $path,
            'id_parent' => $this->request->getPost('id_parent'),
            'id_user' => $userId,
            'slug' => $slug,
        ];

        $kategoriModel->save($data);

        // Data untuk tabel riwayat
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'tambah',
            'aktivitas' => 'menambah subkategori',
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);

        return $this->response->setJSON(['status' => true]);
    }
    public function ubah_subkategori($id)
    {
        $kategoriModel = new KategoriModel();
        $id_subkategori = $this->request->getPost('id_parent');

        // Mendapatkan nama kategori di database
        $kategoriLama = $kategoriModel->find($id);
        $namaKategoriLama = $kategoriLama['nama_kategori'];

        // Mendapatkan nama kategori baru
        $namaKategoriBaru = $this->request->getPost('nama_kategori');

        // Membuat slug unik jika nama kategori berubah
        $slug = $namaKategoriLama === $namaKategoriBaru ? $kategoriLama['slug'] : $this->generateUniqueSlug($namaKategoriBaru);

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
            'slug' => $slug
        ];

        $image = $this->request->getFile('ikon');
        if ($image->isValid() && !$image->hasMoved()) {
            $originalName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads/icons', $originalName);
            $data['ikon'] = $originalName;
        }

        // Simpan perubahan ke dalam database
        $kategoriModel->update($id, $data);

        // Data untuk tabel riwayat
        $session = session();
        $userId = $session->get('user_id');
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'ubah',
            'aktivitas' => 'mengubah subkategori',
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);

        // Redirect pengguna ke halaman yang sesuai
        return redirect()->to("/cmssubkategori/{$id_subkategori}");
    }

    public function hapus_subkategori($id)
    {
        $kategoriModel = new KategoriModel();
        $id_subkategori = $this->request->getPost('id_parent');
        if ($kategoriModel->find($id)) {
            $kategoriModel->delete($id);

            // Data untuk tabel riwayat
            $session = session();
            $userId = $session->get('user_id');
            $riwayatModel = new LogAktivitasModel();
            $alamat_ip = $this->request->getIPAddress();
            $logData = [
                'id_ref' => $userId,
                'log_tipe' => 'hapus',
                'aktivitas' => 'menghapus subkategori',
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);
            return redirect()->to("/cmssubkategori/{$id_subkategori}")->with('message', 'Kategori berhasil dihapus.');
        } else {
            return redirect()->to('/cmssubkategori')->with('error', 'Kategori tidak ditemukan.');
        }
    }
    public function cari_subkategori()
    {
        $session = session();
        $userId = $session->get('user_id');
        $model = new UserModel();
        $kategoriModel = new KategoriModel();
        $artikelModel = new ArtikelModel();

        $data['data'] = $model->getUserById($userId);

        // Ambil nilai 'id_parent' dan kata kunci pencarian dari query string
        $id_parent = $this->request->getGet('id_parent');
        $cari = $this->request->getGet('cari');

        // Dapatkan subkategori berdasarkan id_parent
        $subkategoriQuery = $kategoriModel->where('id_parent', $id_parent);

        // Jika ada kata kunci pencarian, tambahkan kondisi LIKE
        if ($cari) {
            $subkategoriQuery->like('nama_kategori', $cari);
        }

        $subkategori = $subkategoriQuery->findAll();

        $data['subkategori'] = $subkategori;
        $data['subkategori_limit'] = array_slice($subkategori, 0, 4);
        $data['total_subkategori'] = count($subkategori);
        $data['id_kat'] = $id_parent;
        $data['parent_kategori'] = $kategoriModel->where('id', $id_parent)->first();

        $data['subkategori_has_articles'] = false;
        $data['subkategori_articles'] = [];
        $parentIds = [];
        foreach ($subkategori as $sub) {
            $articles = $artikelModel->where('id_kategori', $sub['id'])->findAll();
            $data['subkategori_articles'][$sub['id']] = count($articles) > 0;
            if (count($articles) > 0) {
                $data['subkategori_has_articles'] = true;
            }
            if ($sub['id_parent']) {
                $parentIds[] = $sub['id_parent'];
            }
        }
        $data['parentIds'] = $parentIds;

        $data['breadcrumb'] = $this->getBreadcrumb($id_parent, $kategoriModel);
        $depth = 0;
        $currentCategory = $kategoriModel->find($id_parent);
        while ($currentCategory && $currentCategory['id_parent'] !== null) {
            $depth++;
            $currentCategory = $kategoriModel->find($currentCategory['id_parent']);
        }
        $data['subkategori_depth'] = $depth;

        return view('CMS/kategori/subkategori', $data);
    }
}
