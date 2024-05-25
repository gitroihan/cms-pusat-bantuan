<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\BannerModel;
use App\Models\HeadertentangkamiModel;
use App\Models\KategoriModel;
use App\Models\KontakModel;
use App\Models\LogAktivitasModel;
use App\Models\TentangkamiModel;
use App\Models\TiketModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function dashboard()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $modelkategori = new KategoriModel();
        $modelartikel = new ArtikelModel();
        $modeltiket = new TiketModel();
        $data['data'] = $model->getUserById($userId);
        $data['kategori'] = $modelkategori->countAllResults(); ;
        $data['artikel'] = $modelartikel->countAllResults();
        $data['tiket'] = $modeltiket->countAllResults();


        return view('CMS/dashboard',  $data);
    }
    public function kontak()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $kontakmodel = new KontakModel();
        $data['data'] = $model->getUserById($userId);
        $data['kontak'] = $kontakmodel->findAll();

        return view('CMS/kontak', $data);
    }
    public function ubah_kontak()
    {
        $kontakmodel = new kontakmodel();

        $id = $this->request->getPost('id');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nomor'),
            'alamat' => $this->request->getPost('alamat'),
            'link_whatsapp' => $this->request->getPost('whatsapp'),
            'link_instagram' => $this->request->getPost('instagram')
        ];

        // Simpan perubahan ke dalam database
        $kontakmodel->update($id, $data);
        session()->setFlashdata('kontak_updated', true);
        // Data untuk tabel riwayat
        $session = session();
        $userId = $session->get('user_id');
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'ubah',
            'aktivitas' => 'mengubah informasi kontak',
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);

        return redirect()->to('/cmskontak');
    }
    public function content()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $bannermodel = new BannerModel();
        $data['data'] = $model->getUserById($userId);
        $data['banner'] = $bannermodel->findAll();
        // dd($data);

        return view('CMS/content', $data);
    }
    public function ubah_content($id)
    {
        $bannermodel = new BannerModel();

        $data = [
            'teks' => $this->request->getPost('teks'),
        ];

        $image = $this->request->getFile('gambar');
        if ($image->isValid() && !$image->hasMoved()) {
            $originalName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads/', $originalName);
            $data['gambar'] = $originalName;
        }

        // Simpan perubahan ke dalam database
        $bannermodel->update($id, $data);
        
        return redirect()->to("/cmscontent");
    }
    public function histori()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data['data'] = $model->getUserById($userId);

        $riwayatModel = new LogAktivitasModel();
        $data['logs'] = $riwayatModel->semua_data();
        return view('CMS/histori', $data);
    }
    public function getRiwayatData()
    {
        $request = \Config\Services::request();
        $logModel = new LogAktivitasModel();

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');
        $searchValue = $request->getPost('search')['value'];

        $totalRecords = $logModel->countAll();
        $totalRecordwithFilter = $logModel->like('id_ref', $searchValue)
            ->orLike('log_tipe', $searchValue)
            ->orLike('aktivitas', $searchValue)
            ->orLike('alamat_ip', $searchValue)
            ->orLike('id_user', $searchValue)
            ->orLike('updated_at', $searchValue)
            ->countAllResults();

        $records = $logModel->like('id_ref', $searchValue)
            ->orLike('log_tipe', $searchValue)
            ->orLike('aktivitas', $searchValue)
            ->orLike('alamat_ip', $searchValue)
            ->orLike('id_user', $searchValue)
            ->orLike('updated_at', $searchValue)
            ->orderBy('id', 'DESC')
            ->findAll($length, $start);

        $data = [];
        foreach ($records as $record) {
            $data[] = [
                'id_ref' => $record['id_ref'],
                'log_tipe' => $record['log_tipe'],
                'aktivitas' => $record['aktivitas'],
                'alamat_ip' => $record['alamat_ip'],
                'id_user' => $record['id_user'],
                'updated_at' => $record['updated_at']
            ];
        }

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordwithFilter,
            "data" => $data
        ];

        return $this->response->setJSON($response);
    }

}
