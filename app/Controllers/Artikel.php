<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\LayoutModel;
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
    public function aksi_tambah_artikel()
    { {
            $session = session();
            $userId = $session->get('user_id');

            $artikelModel = new ArtikelModel();
            $tagModel = new TagModel();

            // Menyimpan data artikel
            $data = [
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'pembuat' => $userId,
                'isi' => $this->request->getPost('isi'),
                'isi2' => $this->request->getPost('isi2'),
                'gambar_artikel' => $this->request->getFile('gambar_artikel')->getName(),
                'gambar_1' => $this->request->getFile('gambar_1')->getName(),
                'gambar_2' => $this->request->getFile('gambar_2')->getName(),
                'tanggal_unggah' => date('Y-m-d H:i:s'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_layout' => $this->request->getPost('id_layout'),
                'id_user' => $userId,
                'status' => 'draft',
            ];
            // Simpan artikel ke database
            $artikelModel->insert($data);
            $artikelId = $artikelModel->insertID();

            // Upload gambar artikel jika ada
            if ($this->request->getFile('gambar_artikel')->isValid()) {
                $this->request->getFile('gambar_artikel')->move(ROOTPATH . 'public/uploads');
            }
            if ($this->request->getFile('gambar_1')->isValid()) {
                $this->request->getFile('gambar_1')->move(ROOTPATH . 'public/uploads');
            }
            if ($this->request->getFile('gambar_2')->isValid()) {
                $this->request->getFile('gambar_2')->move(ROOTPATH . 'public/uploads');
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
        }

        return redirect()->to('/tambah_artikel');
    }
    public function aksi_tambah_artikel_publish()
    { {
            $session = session();
            $userId = $session->get('user_id');

            $artikelModel = new ArtikelModel();
            $tagModel = new TagModel();

            // Menyimpan data artikel
            $data = [
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'pembuat' => $userId,
                'isi' => $this->request->getPost('isi'),
                'isi2' => $this->request->getPost('isi2'),
                'gambar_artikel' => $this->request->getFile('gambar_artikel')->getClientName(),
                'gambar_1' => $this->request->getFile('gambar_1')->getClientName(),
                'gambar_2' => $this->request->getFile('gambar_2')->getClientName(),
                'tanggal_unggah' => date('Y-m-d H:i:s'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_layout' => $this->request->getPost('id_layout'),
                'id_user' => $userId,
                'status' => 'publish',
            ];
            // Simpan artikel ke database
            $artikelModel->insert($data);
            $artikelId = $artikelModel->insertID();

            // Upload gambar artikel jika ada
            if ($this->request->getFile('gambar_artikel')->isValid()) {
                $this->request->getFile('gambar_artikel')->move(ROOTPATH . 'public/uploads');
            }
            if ($this->request->getFile('gambar_1')->isValid()) {
                $this->request->getFile('gambar_1')->move(ROOTPATH . 'public/uploads');
            }
            if ($this->request->getFile('gambar_2')->isValid()) {
                $this->request->getFile('gambar_2')->move(ROOTPATH . 'public/uploads');
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

        // Memperbarui data artikel berdasarkan input dari formulir
        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'isi' => $this->request->getPost('isi'),
            'isi2' => $this->request->getPost('isi2'),
            'tanggal_unggah' => date('Y-m-d H:i:s'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_layout' => $this->request->getPost('id_layout'),
            'status' => 'draft',
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
        $selectedTags = $this->request->getPost('tags')?? [];
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

        // Memperbarui data artikel berdasarkan input dari formulir
        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'isi' => $this->request->getPost('isi'),
            'isi2' => $this->request->getPost('isi2'),
            'tanggal_unggah' => date('Y-m-d H:i:s'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_layout' => $this->request->getPost('id_layout'),
            'status' => 'publish',
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
        $selectedTags = $this->request->getPost('tags')?? [];
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

        // return redirect()->to('/detail_artikel/' . $id);
        return redirect()->to('/cmsartikel');
    }

    public function hapus_artikel($id)
    {
        $artikelModel = new ArtikelModel();
        $artikelModel->delete($id);

        return redirect()->to('/cmsartikel');
    }
}
