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
                'gambar_artikel' => $this->request->getFile('gambar_artikel')->getName(),
                'gambar_1' => $this->request->getFile('gambar_1')->getName(),
                'gambar_2' => $this->request->getFile('gambar_2')->getName(),
                'tanggal_unggah' => date('Y-m-d H:i:s'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_layout' => $this->request->getPost('id_layout'),
                'id_user' => $userId,
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

            // Menangani tag
            $tags = $this->request->getPost('tags');

            if (!empty($tags) && is_array($tags)) {
                foreach ($tags as $tag) {
                    // Periksa apakah tag sudah ada di database
                    $existingTag = $tagModel->where('nama_tag', $tag)->first();

                    if (!$existingTag) {
                        // Jika tag tidak ada, simpan tag baru
                        $tagData = [
                            'nama_tag' => $tag,
                            'id_user' => $userId,
                            'id_artikel' => $artikelId  // Menyimpan ID artikel langsung
                        ];
                        $tagModel->insert($tagData);
                    } else {
                        // Jika tag sudah ada, tambahkan ID artikel ke kolom id_tags_artikel
                        $existingTagIds = explode(',', $existingTag['id_artikel']);
                        if (!in_array($artikelId, $existingTagIds)) {
                            // Jika ID artikel belum ada di kolom id_tags_artikel, tambahkan
                            $existingTagIds[] = $artikelId;
                            $updatedIdTags = implode(',', $existingTagIds);
                            $tagModel->update($existingTag['id'], ['id_artikel' => $updatedIdTags]);
                        }
                    }
                }
            }

            return redirect()->to('/tambah_artikel');
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

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul_artikel' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            'id_layout' => 'required'
        ]);
        // dd($validation);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Menyimpan data artikel
        $data = [
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'isi' => $this->request->getPost('isi'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_layout' => $this->request->getPost('id_layout'),
            'id_user' => $userId,
        ];

        // Upload gambar artikel jika ada
        if ($this->request->getFile('gambar_artikel')->isValid()) {
            $data['gambar_artikel'] = $this->request->getFile('gambar_artikel')->getName();
            $this->request->getFile('gambar_artikel')->move(ROOTPATH . 'public/uploads');
        }
        if ($this->request->getFile('gambar_1')->isValid()) {
            $data['gambar_1'] = $this->request->getFile('gambar_1')->getName();
            $this->request->getFile('gambar_1')->move(ROOTPATH . 'public/uploads');
        }
        if ($this->request->getFile('gambar_2')->isValid()) {
            $data['gambar_2'] = $this->request->getFile('gambar_2')->getName();
            $this->request->getFile('gambar_2')->move(ROOTPATH . 'public/uploads');
        }

        // Update artikel di database
        $artikelModel->update($id, $data);

        // Menangani tag
        $tags = $this->request->getPost('tags');

        if (!empty($tags) && is_array($tags)) {
            // Perbarui tag yang ada dengan menghapus ID artikel dari kolom id_artikel
            $existingTags = $tagModel->findAll();
            foreach ($existingTags as $existingTag) {
                $tagArtikelIds = explode(',', $existingTag['id_artikel']);
                if (($key = array_search($id, $tagArtikelIds)) !== false) {
                    unset($tagArtikelIds[$key]);
                    $updatedIdTags = implode(',', $tagArtikelIds);
                    $tagModel->update($existingTag['id'], ['id_artikel' => $updatedIdTags]);
                }
            }

            // Tambahkan ID artikel ke tag yang dipilih
            foreach ($tags as $tag) {
                $existingTag = $tagModel->where('nama_tag', $tag)->first();

                if (!$existingTag) {
                    // Jika tag tidak ada, simpan tag baru
                    $tagData = [
                        'nama_tag' => $tag,
                        'id_user' => $userId,
                        'id_artikel' => $id  // Menyimpan ID artikel langsung
                    ];
                    $tagModel->insert($tagData);
                } else {
                    // Jika tag sudah ada, tambahkan ID artikel ke kolom id_artikel
                    $existingTagIds = explode(',', $existingTag['id_artikel']);
                    if (!in_array($id, $existingTagIds)) {
                        // Jika ID artikel belum ada di kolom id_artikel, tambahkan
                        $existingTagIds[] = $id;
                        $updatedIdTags = implode(',', $existingTagIds);
                        $tagModel->update($existingTag['id'], ['id_artikel' => $updatedIdTags]);
                    }
                }
            }
        }

        return redirect()->to('/cmsartikel')->with('success', 'Artikel berhasil diubah.');
    }
    public function hapus_artikel($id)
    {
        $artikelModel = new ArtikelModel();
        $artikelModel->delete($id);

        return redirect()->to('/cmsartikel');
    }
}
