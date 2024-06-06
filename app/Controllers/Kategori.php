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
        $artikelModel = new ArtikelModel();
        $data['data'] = $model->getUserById($userId);
        $kategoriData = $kategoriModel->data_id_parent_null();
        $data['kategori'] = $kategoriData['kategori'];
        $data['id_parents'] = $kategoriData['id_parents'];
        $data['subkategori_has_articles'] = false;
        $data['subkategori_articles'] = [];
        foreach ($data['kategori'] as $sub) {
            $articles = $artikelModel->where('id_kategori', $sub['id'])->findAll();
            $data['subkategori_articles'][$sub['id']] = count($articles) > 0;
            if (count($articles) > 0) {
                $data['subkategori_has_articles'] = true;
            }
        }
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

        // Mengambil ID kategori yang baru saja disimpan
        $newKategoriId = $kategoriModel->insertID();

        // Menyiapkan deskripsi aktivitas yang lebih detail
        $aktivitas = "menambah kategori: {$data['nama_kategori']} dengan deskripsi: {$data['deskripsi_kategori']} dan ikon: {$path}";

        $logData = [
            'id_ref' => $newKategoriId,
            'log_tipe' => 'tambah',
            'aktivitas' => $aktivitas,
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
        $deskripsiKategoriLama = $kategoriLama['deskripsi_kategori'];
        $ikonLama = $kategoriLama['ikon'];

        // Mendapatkan nama kategori baru
        $namaKategoriBaru = $this->request->getPost('nama_kategori');
        $deskripsiKategoriBaru = $this->request->getPost('deskripsi_kategori');

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

        // Menyiapkan deskripsi aktivitas yang lebih detail
        $aktivitas = "mengubah kategori: ";

        if ($namaKategoriLama !== $namaKategoriBaru) {
            $aktivitas .= "nama dari '{$namaKategoriLama}' menjadi '{$namaKategoriBaru}', ";
        }
        if ($deskripsiKategoriLama !== $deskripsiKategoriBaru) {
            $aktivitas .= "deskripsi dari '{$deskripsiKategoriLama}' menjadi '{$deskripsiKategoriBaru}', ";
        }
        if (isset($data['ikon'])) {
            $aktivitas .= "ikon dari '{$ikonLama}' menjadi '{$data['ikon']}'";
        }

        $aktivitas = rtrim($aktivitas, ', '); // Menghapus koma terakhir jika ada

        $logData = [
            'id_ref' => $id,
            'log_tipe' => 'ubah',
            'aktivitas' => $aktivitas,
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
        $kategori = $kategoriModel->find($id);

        if ($kategori) {
            // Simpan data kategori sebelum dihapus untuk keperluan log
            $namaKategori = $kategori['nama_kategori'];

            // Hapus kategori dari database
            $kategoriModel->delete($id);

            // Data untuk tabel riwayat
            $session = session();
            $userId = $session->get('user_id');
            $riwayatModel = new LogAktivitasModel();
            $alamat_ip = $this->request->getIPAddress();

            // Menyiapkan deskripsi aktivitas yang lebih detail
            $aktivitas = "menghapus kategori: {$namaKategori}";

            $logData = [
                'id_ref' => $id,
                'log_tipe' => 'hapus',
                'aktivitas' => $aktivitas,
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
        // $data['subkategori_limit'] = array_slice($data['subkategori'], 0, 4);
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
        $kategoriId = $kategoriModel->getInsertID();

        // Data untuk tabel riwayat
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();

        // Menyiapkan deskripsi aktivitas yang lebih detail
        $aktivitas = "menambah subkategori: {$namakategori}";

        $logData = [
            'id_ref' => $kategoriId,
            'log_tipe' => 'tambah',
            'aktivitas' => $aktivitas,
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

        // Mendapatkan data kategori lama
        $kategoriLama = $kategoriModel->find($id);
        $namaKategoriLama = $kategoriLama['nama_kategori'];
        $deskripsiKategoriLama = $kategoriLama['deskripsi_kategori'];
        $ikonLama = $kategoriLama['ikon'];

        // Mendapatkan data kategori baru dari formulir
        $namaKategoriBaru = $this->request->getPost('nama_kategori');
        $deskripsiKategoriBaru = $this->request->getPost('deskripsi_kategori');
        $gambarBaru = $this->request->getFile('ikon');

        // Membuat slug unik jika nama kategori berubah
        $slug = $namaKategoriLama === $namaKategoriBaru ? $kategoriLama['slug'] : $this->generateUniqueSlug($namaKategoriBaru);


        // Menyiapkan deskripsi aktivitas yang lebih detail
        $aktivitas = "mengubah subkategori: ";

        if ($namaKategoriLama !== $namaKategoriBaru) {
            $aktivitas .= "nama dari '{$namaKategoriLama}' menjadi '{$namaKategoriBaru}', ";
        }
        if ($deskripsiKategoriLama !== $deskripsiKategoriBaru) {
            $aktivitas .= "deskripsi dari '{$deskripsiKategoriLama}' menjadi '{$deskripsiKategoriBaru}', ";
        }
        if ($gambarBaru->isValid() && !$gambarBaru->hasMoved()) {
            $aktivitas .= "ikon dari '{$ikonLama}' menjadi '{$gambarBaru->getClientName()}'";
        }

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
            'slug' => $slug
        ];

        // Jika ada gambar baru yang diunggah, simpan gambar baru
        if ($gambarBaru->isValid() && !$gambarBaru->hasMoved()) {
            $namaGambarBaru = $gambarBaru->getClientName();
            $gambarBaru->move(ROOTPATH . 'public/uploads/icons', $namaGambarBaru);
            $data['ikon'] = $namaGambarBaru;

            // Hapus gambar lama jika ada perubahan gambar
            // if ($ikonLama != 'default.png') {
            //     unlink(ROOTPATH . 'public/uploads/icons/' . $ikonLama);
            // }
        }

        // Simpan perubahan ke dalam database
        $kategoriModel->update($id, $data);

        // Data untuk tabel riwayat
        $session = session();
        $userId = $session->get('user_id');
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();

        // Simpan log ke tabel riwayat
        $logData = [
            'id_ref' => $id,
            'log_tipe' => 'ubah',
            'aktivitas' => $aktivitas,
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $riwayatModel->insert($logData);

        // Redirect pengguna ke halaman yang sesuai
        return redirect()->to("/cmssubkategori/{$id_subkategori}");
    }

    public function hapus_subkategori($id)
    {
        $kategoriModel = new KategoriModel();
        $id_subkategori = $this->request->getPost('id_parent');

        // Mendapatkan data kategori lama sebelum dihapus
        $kategoriLama = $kategoriModel->find($id);
        if ($kategoriLama) {
            $namaKategoriLama = $kategoriLama['nama_kategori'];
            $deskripsiKategoriLama = $kategoriLama['deskripsi_kategori'];
            $ikonLama = $kategoriLama['ikon'];

            // Menghapus kategori dari database
            $kategoriModel->delete($id);

            // Data untuk tabel riwayat
            $session = session();
            $userId = $session->get('user_id');
            $riwayatModel = new LogAktivitasModel();
            $alamat_ip = $this->request->getIPAddress();

            // Menyiapkan deskripsi aktivitas yang lebih detail
            $aktivitas = "menghapus subkategori: ";
            $aktivitas .= "nama '{$namaKategoriLama}', ";
            $aktivitas .= "deskripsi '{$deskripsiKategoriLama}', ";
            $aktivitas .= "ikon '{$ikonLama}'";

            // Simpan log ke tabel riwayat
            $logData = [
                'id_ref' => $id,
                'log_tipe' => 'hapus',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
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
