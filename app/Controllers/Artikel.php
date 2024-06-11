<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\LayoutModel;
use App\Models\LogAktivitasModel;
use App\Models\TagModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Artikel extends BaseController
{
    public function getArtikelData()
    {
        $request = service('request');
        $db = \Config\Database::connect();
        $builder = $db->table('artikel');

        $builder->select('artikel.*, users.nama as pembuat')
            ->join('users', 'users.id = artikel.id_user', 'left');

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');
        $search = $request->getPost('search')['value'];

        // Total records
        $totalRecords = $builder->countAllResults(false);
        
        $builder->orderBy('tanggal_unggah', 'DESC')
        ->limit($length, $start);


        // Filtered records
        if ($search) {
            $builder->groupStart()
                ->like('judul_artikel', $search)
                ->orLike('users.nama', $search)
                ->orLike('tanggal_unggah', $search)
                ->groupEnd();
        }
        $totalFiltered = $builder->countAllResults(false);

        // Limit and order
        $builder->limit($length, $start);

        $data = $builder->get()->getResultArray();

        $response = [
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFiltered,
            'data' => $data,
        ];

        return $this->response->setJSON($response);
    }

    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/artikel/artikel', ['data' => $data]);
    }
    public function tambah_artikel()
    {
        $session = session();
        $userId = $session->get('user_id');
        $model = new UserModel();
        $data['data'] = $model->getUserById($userId);

        $layoutmodel = new LayoutModel();
        $data['layouts'] = $layoutmodel->findAll();

        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->getKategoriWithoutParent();

        $tagModel = new TagModel();
        $data['tags'] = $tagModel->getAllTags();
        return view('CMS/artikel/tambah_artikel', $data);
    }
    private function generateUniqueSlug($title)
    {
        $slug = url_title($title, '-', true);
        $artikelModel = new ArtikelModel();

        // Cek uniq slug
        $count = 0;
        $newSlug = $slug;
        while ($artikelModel->where('slug', $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }

    public function aksi_tambah_artikel()
    { {
            $session = session();
            $userId = $session->get('user_id');

            $artikelModel = new ArtikelModel();
            $tagModel = new TagModel();

            // Menyimpan data artikel
            $defaultGambarArtikel = 'artikeldefault.jpg';
            $defaultGambar1 = 'artikeldefault.jpg';
            $defaultGambar2 = 'artikeldefault.jpg';

            $gambarArtikel = $this->request->getFile('gambar_artikel');
            $gambar1 = $this->request->getFile('gambar_1');
            $gambar2 = $this->request->getFile('gambar_2');

            // Membuat slug unik
            $judulArtikel = $this->request->getPost('judul_artikel');
            $slug = $this->generateUniqueSlug($judulArtikel);



            $data = [
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'pembuat' => $userId,
                'isi' => $this->request->getPost('isi'),
                'isi2' => $this->request->getPost('isi2'),
                'gambar_artikel' => $gambarArtikel->isValid() ? $gambarArtikel->getName() : $defaultGambarArtikel,
                'gambar_1' => $gambar1->isValid() ? $gambar1->getName() : $defaultGambar1,
                'gambar_2' => $gambar2->isValid() ? $gambar2->getName() : $defaultGambar2,
                'tanggal_unggah' => date('Y-m-d H:i:s'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_layout' => $this->request->getPost('id_layout'),
                'id_user' => $userId,
                'status' => 'draft',
                'slug' => $slug,
            ];
            // Simpan artikel ke database
            $artikelModel->insert($data);
            $artikelId = $artikelModel->insertID();

            // Upload gambar artikel jika ada
            if ($gambarArtikel->isValid()) {
                $gambarArtikel->move(ROOTPATH . 'public/uploads');
            }
            if ($gambar1->isValid()) {
                $gambar1->move(ROOTPATH . 'public/uploads');
            }
            if ($gambar2->isValid()) {
                $gambar2->move(ROOTPATH . 'public/uploads');
            }

            // Mendapatkan tag dari formulir
            $selectedTags = $this->request->getPost('tags');

            // Memastikan bahwa ada tag yang dipilih
            if (!empty($selectedTags)) {
                // Dapatkan semua tag yang ada di database
                $existingTags = $tagModel->getAllTags();

                // Looping untuk setiap tag yang dipilih
                foreach ($selectedTags as $selectedTag) {
                    $tagExists = false;
                    // Periksa apakah tag sudah ada di database
                    foreach ($existingTags as $existingTag) {
                        if ($selectedTag === $existingTag['nama_tag']) {
                            $tagExists = true;
                            // Jika tag sudah ada, tambahkan entri baru ke tabel tag
                            $tagData = [
                                'nama_tag' => $selectedTag,
                                'id_artikel' => $artikelId,
                                'id_user' => $userId
                            ];
                            $tagModel->insert($tagData);
                            break;
                        }
                    }
                    // Jika tag belum ada di database, buat entri baru
                    if (!$tagExists) {
                        $tagData = [
                            'nama_tag' => $selectedTag,
                            'id_artikel' => $artikelId,
                            'id_user' => $userId
                        ];
                        $tagModel->insert($tagData);
                    }
                }
            }

            // Data untuk tabel riwayat
            $riwayatModel = new LogAktivitasModel();
            $alamat_ip = $this->request->getIPAddress();

            // Siapkan deskripsi aktivitas
            $aktivitas = 'menambahkan draft artikel: ' . $data['judul_artikel'];

            $logData = [
                'id_ref' => $artikelId,
                'log_tipe' => 'tambah',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);

            return redirect()->to('/cmsartikel');
        }
    }
    public function aksi_tambah_artikel_publish()
    { {
            $session = session();
            $userId = $session->get('user_id');

            $artikelModel = new ArtikelModel();
            $tagModel = new TagModel();

            // Menyimpan data artikel
            $defaultGambarArtikel = 'artikeldefault.jpg';
            $defaultGambar1 = 'artikeldefault.jpg';
            $defaultGambar2 = 'artikeldefault.jpg';

            $gambarArtikel = $this->request->getFile('gambar_artikel');
            $gambar1 = $this->request->getFile('gambar_1');
            $gambar2 = $this->request->getFile('gambar_2');

            // Membuat slug unik
            $judulArtikel = $this->request->getPost('judul_artikel');
            $slug = $this->generateUniqueSlug($judulArtikel);


            // Menyimpan data artikel
            $data = [
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'pembuat' => $userId,
                'isi' => $this->request->getPost('isi'),
                'isi2' => $this->request->getPost('isi2'),
                'gambar_artikel' => $gambarArtikel->isValid() ? $gambarArtikel->getName() : $defaultGambarArtikel,
                'gambar_1' => $gambar1->isValid() ? $gambar1->getName() : $defaultGambar1,
                'gambar_2' => $gambar2->isValid() ? $gambar2->getName() : $defaultGambar2,
                'tanggal_unggah' => date('Y-m-d H:i:s'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_layout' => $this->request->getPost('id_layout'),
                'id_user' => $userId,
                'status' => 'publish',
                'slug' => $slug,
            ];
            // Simpan artikel ke database
            $artikelModel->insert($data);
            $artikelId = $artikelModel->insertID();

            // Upload gambar artikel jika ada
            if ($gambarArtikel->isValid()) {
                $gambarArtikel->move(ROOTPATH . 'public/uploads');
            }
            if ($gambar1->isValid()) {
                $gambar1->move(ROOTPATH . 'public/uploads');
            }
            if ($gambar2->isValid()) {
                $gambar2->move(ROOTPATH . 'public/uploads');
            }

            // Mendapatkan tag dari formulir
            $selectedTags = $this->request->getPost('tags');

            // Memastikan bahwa ada tag yang dipilih
            if (!empty($selectedTags)) {
                // Dapatkan semua tag yang ada di database
                $existingTags = $tagModel->getAllTags();

                // Looping untuk setiap tag yang dipilih
                foreach ($selectedTags as $selectedTag) {
                    $tagExists = false;
                    // Periksa apakah tag sudah ada di database
                    foreach ($existingTags as $existingTag) {
                        if ($selectedTag === $existingTag['nama_tag']) {
                            $tagExists = true;
                            // Jika tag sudah ada, tambahkan entri baru ke tabel tag
                            $tagData = [
                                'nama_tag' => $selectedTag,
                                'id_artikel' => $artikelId,
                                'id_user' => $userId
                            ];
                            $tagModel->insert($tagData);
                            break;
                        }
                    }
                    // Jika tag belum ada di database, buat entri baru
                    if (!$tagExists) {
                        $tagData = [
                            'nama_tag' => $selectedTag,
                            'id_artikel' => $artikelId,
                            'id_user' => $userId
                        ];
                        $tagModel->insert($tagData);
                    }
                }
            }
            // Data untuk tabel riwayat
            $riwayatModel = new LogAktivitasModel();
            $alamat_ip = $this->request->getIPAddress();

            // Siapkan deskripsi aktivitas
            $aktivitas = 'menambahkan publish artikel: ' . $data['judul_artikel'];

            $logData = [
                'id_ref' => $artikelId,
                'log_tipe' => 'tambah',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);
        }

        return redirect()->to('/tambah_artikel');
    }

    public function detail_artikel($id)
    {
        $session = session();
        $userId = $session->get('user_id');
        $model = new UserModel();
        $data['data'] = $model->getUserById($userId);

        $layoutmodel = new LayoutModel();
        $data['layouts'] = $layoutmodel->findAll();

        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->getKategoriWithoutParent();

        $tagModel = new TagModel();
        $data['tags'] = $tagModel->getAllTags();

        $artikelModel = new ArtikelModel();
        $data['artikel'] = $artikelModel->find($id);
        $allTags = $tagModel->findAll();
        $artikelTags = [];
        foreach ($allTags as $tag) {
            $artikelIds = explode(',', $tag['id_artikel']);
            if (in_array($id, $artikelIds)) {
                $artikelTags[] = $tag;
            }
        }
        $data['artikel_tags'] = $artikelTags;

        return view('CMS/artikel/detail_artikel', $data);
    }
    public function ubah_artikel($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        $artikelModel = new ArtikelModel();
        $tagModel = new TagModel();

        // Mendapatkan data artikel berdasarkan ID
        $artikel = $artikelModel->find($id);

        // Membuat slug unik jika judul artikel diubah
        $judulArtikel = $this->request->getPost('judul_artikel');
        if ($judulArtikel !== $artikel['judul_artikel']) {
            $slug = $this->generateUniqueSlug($judulArtikel);
        } else {
            $slug = $artikel['slug'];
        }

        // Memperbarui data artikel berdasarkan input dari formulir
        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'isi' => $this->request->getPost('isi'),
            'isi2' => $this->request->getPost('isi2'),
            'tanggal_unggah' => date('Y-m-d H:i:s'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_layout' => $this->request->getPost('id_layout'),
            'status' => 'draft',
            'slug' => $slug,
        ];
        // dd($data);

        // Memeriksa apakah ada file gambar yang diunggah dan memperbarui datanya
        $gambarArtikel = $this->request->getFile('gambar_artikel');
        if ($gambarArtikel && $gambarArtikel->isValid()) {
            $data['gambar_artikel'] = $gambarArtikel->getName();
            $gambarArtikel->move(ROOTPATH . 'public/uploads');
        }
        $gambar1 = $this->request->getFile('gambar_1');
        if ($gambar1 && $gambar1->isValid()) {
            $data['gambar_1'] = $gambar1->getName();
            $gambar1->move(ROOTPATH . 'public/uploads');
        }
        $gambar2 = $this->request->getFile('gambar_2');
        if ($gambar2 && $gambar2->isValid()) {
            $data['gambar_2'] = $gambar2->getName();
            $gambar2->move(ROOTPATH . 'public/uploads');
        }

        // Memperbarui artikel di database
        $artikelModel->update($id, $data);

        // Mengelola tag
        $selectedTags = $this->request->getPost('tags') ?? [];
        $existingTags = $tagModel->where('id_artikel', $id)->findAll();

        // Menghapus tag yang tidak lagi terkait
        foreach ($existingTags as $existingTag) {
            if (!in_array($existingTag['nama_tag'], $selectedTags)) {
                $tagModel->delete($existingTag['id']);
            }
        }

        // Menambah tag baru
        foreach ($selectedTags as $selectedTag) {
            $tagExists = $tagModel->where('nama_tag', $selectedTag)->where('id_artikel', $id)->first();
            if (!$tagExists) {
                $tagData = [
                    'nama_tag' => $selectedTag,
                    'id_artikel' => $id,
                    'id_user' => $userId
                ];
                $tagModel->insert($tagData);
            }
        }

        // Data untuk tabel riwayat
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();

        // Tentukan aktivitas berdasarkan perubahan yang dilakukan
        $aktivitas = 'mengubah artikel: ';
        $changes = [];

        if ($data['judul_artikel'] !== $artikel['judul_artikel']) {
            $changes[] = 'judul artikel';
        }
        if ($data['isi'] !== $artikel['isi']) {
            $changes[] = 'paragraf 1';
        }
        if ($data['isi2'] !== $artikel['isi2']) {
            $changes[] = 'paragraf 2';
        }
        if ($data['id_kategori'] !== $artikel['id_kategori']) {
            $changes[] = 'kategori';
        }
        if ($data['id_layout'] !== $artikel['id_layout']) {
            $changes[] = 'layout';
        }
        if ($gambarArtikel && $gambarArtikel->isValid() && $data['gambar_artikel'] !== $artikel['gambar_artikel']) {
            $changes[] = 'gambar artikel';
        }
        if ($gambar1 && $gambar1->isValid() && $data['gambar_1'] !== $artikel['gambar_1']) {
            $changes[] = 'gambar 1';
        }
        if ($gambar2 && $gambar2->isValid() && $data['gambar_2'] !== $artikel['gambar_2']) {
            $changes[] = 'gambar 2';
        }

        if (!empty($changes)) {
            $aktivitas .= implode(', ', $changes);

            $logData = [
                'id_ref' => $id,
                'log_tipe' => 'ubah dan simpan draft',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);
        }else{
            $logData = [
                'id_ref' => $id,
                'log_tipe' => 'draft',
                'aktivitas' => 'memasukan artikel ke draft',
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $riwayatModel->insert($logData);}

        // return redirect()->to('/detail_artikel/' . $id);
        return redirect()->to('/cmsartikel');
    }
    public function ubah_artikel_publish($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        $artikelModel = new ArtikelModel();
        $tagModel = new TagModel();

        // Mendapatkan data artikel berdasarkan ID
        $artikel = $artikelModel->find($id);

        // Membuat slug unik jika judul artikel diubah
        $judulArtikel = $this->request->getPost('judul_artikel');
        if ($judulArtikel !== $artikel['judul_artikel']) {
            $slug = $this->generateUniqueSlug($judulArtikel);
        } else {
            $slug = $artikel['slug'];
        }

        // Memperbarui data artikel berdasarkan input dari formulir
        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'isi' => $this->request->getPost('isi'),
            'isi2' => $this->request->getPost('isi2'),
            'tanggal_unggah' => date('Y-m-d H:i:s'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_layout' => $this->request->getPost('id_layout'),
            'status' => 'publish',
            'slug' => $slug,
        ];
        // dd($data);

        // Memeriksa apakah ada file gambar yang diunggah dan memperbarui datanya
        $gambarArtikel = $this->request->getFile('gambar_artikel');
        if ($gambarArtikel && $gambarArtikel->isValid()) {
            $data['gambar_artikel'] = $gambarArtikel->getName();
            $gambarArtikel->move(ROOTPATH . 'public/uploads');
        }
        $gambar1 = $this->request->getFile('gambar_1');
        if ($gambar1 && $gambar1->isValid()) {
            $data['gambar_1'] = $gambar1->getName();
            $gambar1->move(ROOTPATH . 'public/uploads');
        }
        $gambar2 = $this->request->getFile('gambar_2');
        if ($gambar2 && $gambar2->isValid()) {
            $data['gambar_2'] = $gambar2->getName();
            $gambar2->move(ROOTPATH . 'public/uploads');
        }

        // Memperbarui artikel di database
        $artikelModel->update($id, $data);

        // Mengelola tag
        $selectedTags = $this->request->getPost('tags') ?? [];
        $existingTags = $tagModel->where('id_artikel', $id)->findAll();

        // Menghapus tag yang tidak lagi terkait
        foreach ($existingTags as $existingTag) {
            if (!in_array($existingTag['nama_tag'], $selectedTags)) {
                $tagModel->delete($existingTag['id']);
            }
        }

        // Menambah tag baru
        foreach ($selectedTags as $selectedTag) {
            $tagExists = $tagModel->where('nama_tag', $selectedTag)->where('id_artikel', $id)->first();
            if (!$tagExists) {
                $tagData = [
                    'nama_tag' => $selectedTag,
                    'id_artikel' => $id,
                    'id_user' => $userId
                ];
                $tagModel->insert($tagData);
            }
        }

        // Data untuk tabel riwayat
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();

        // Tentukan aktivitas berdasarkan perubahan yang dilakukan
        $aktivitas = 'mengubah artikel: ';
        $changes = [];

        if ($data['judul_artikel'] !== $artikel['judul_artikel']) {
            $changes[] = 'judul artikel';
        }
        if ($data['isi'] !== $artikel['isi']) {
            $changes[] = 'paragraf 1';
        }
        if ($data['isi2'] !== $artikel['isi2']) {
            $changes[] = 'paragraf 2';
        }
        if ($data['id_kategori'] !== $artikel['id_kategori']) {
            $changes[] = 'kategori';
        }
        if ($data['id_layout'] !== $artikel['id_layout']) {
            $changes[] = 'layout';
        }
        if ($gambarArtikel && $gambarArtikel->isValid() && $data['gambar_artikel'] !== $artikel['gambar_artikel']) {
            $changes[] = 'gambar artikel';
        }
        if ($gambar1 && $gambar1->isValid() && $data['gambar_1'] !== $artikel['gambar_1']) {
            $changes[] = 'gambar 1';
        }
        if ($gambar2 && $gambar2->isValid() && $data['gambar_2'] !== $artikel['gambar_2']) {
            $changes[] = 'gambar 2';
        }

        if (!empty($changes)) {
            $aktivitas .= implode(', ', $changes);

            $logData = [
                'id_ref' => $id,
                'log_tipe' => 'ubah dan publish',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);
        }else{
            $logData = [
                'id_ref' => $id,
                'log_tipe' => 'publish',
                'aktivitas' => 'mempublish artikel',
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $riwayatModel->insert($logData);
        }

        // return redirect()->to('/detail_artikel/' . $id);
        return redirect()->to('/cmsartikel');
    }

    public function hapus_artikel($id)
    {
        $artikelModel = new ArtikelModel();
        $riwayatModel = new LogAktivitasModel();
        $originalData = $artikelModel->find($id);
        if ($originalData) {
            // Hapus artikel dari database
            $artikelModel->delete($id);

            // Data untuk tabel riwayat
            $session = session();
            $userId = $session->get('user_id');
            $alamat_ip = $this->request->getIPAddress();

            // Siapkan deskripsi aktivitas
            $aktivitas = 'menghapus artikel: ' . $originalData['judul_artikel'];

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
        }

        return redirect()->to('/cmsartikel');
    }
}
