<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\BannerModel;
use App\Models\HeadertentangkamiModel;
use App\Models\KategoriModel;
use App\Models\KontakModel;
use App\Models\LogAktivitasModel;
use App\Models\PrivacyPolicyModel;
use App\Models\TentangkamiModel;
use App\Models\TermsAndConditionModel;
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
        $data['kategori'] = $modelkategori->countAllResults();;
        $data['artikel'] = $modelartikel->countAllResults();
        $data['tiket'] = $modeltiket->countAllResults();


        return view('CMS/dashboard',  $data);
    }

    //kontak
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
    public function cmsubah_kontak()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $kontakmodel = new KontakModel();
        $data['data'] = $model->getUserById($userId);
        $data['kontak'] = $kontakmodel->findAll();

        return view('CMS/ubah_kontak', $data);
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

    //banner
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

    //privacy
    public function privacy()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $privacymodel = new PrivacyPolicyModel();
        $data['data'] = $model->getUserById($userId);
        $data['privacy'] = $privacymodel->findAll();

        return view('CMS/privacy_policy/privacy_policy', $data);
    }
    public function cmsubah_privacy()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $privacymodel = new PrivacyPolicyModel();
        $data['data'] = $model->getUserById($userId);
        $data['privacy'] = $privacymodel->findAll();

        return view('CMS/privacy_policy/privacy_policy_ubah', $data);
    }
    public function ubah_privacy()
    {
        $privacymodel = new PrivacyPolicyModel();

        $id = $this->request->getPost('id');
        $data = [
            'isi' => $this->request->getPost('isi')
        ];

        // Simpan perubahan ke dalam database
        $privacymodel->update($id, $data);

        return redirect()->to('/cmsprivacy');
    }

    //terms_and_condition
    public function terms_and_condition()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $termsmodel = new TermsAndConditionModel();
        $data['data'] = $model->getUserById($userId);
        $data['terms'] = $termsmodel->findAll();

        return view('CMS/terms_and_condition/terms_and_condition', $data);
    }
    public function cmsubah_terms_and_condition()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $termsmodel = new TermsAndConditionModel();
        $data['data'] = $model->getUserById($userId);
        $data['terms'] = $termsmodel->findAll();

        return view('CMS/terms_and_condition/terms_and_condition_ubah', $data);
    }
    public function ubah_terms_and_condition()
    {
        $termsmodel = new TermsAndConditionModel();

        $id = $this->request->getPost('id');
        $data = [
            'isi' => $this->request->getPost('isi')
        ];

        // Simpan perubahan ke dalam database
        $termsmodel->update($id, $data);

        return redirect()->to('/cmsterms_and_condition');
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
        $db = \Config\Database::connect();
        $builder = $db->table('log_aktivitas');

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');
        $searchValue = $request->getPost('search')['value'];

        // Join dengan tabel users untuk mendapatkan nama pengguna
        $builder->select('log_aktivitas.*, users.nama as nama_user')
            ->join('users', 'users.id = log_aktivitas.id_user', 'left');

        // Total records
        $totalRecords = $builder->countAllResults(false);

        // Filtered records
        if ($searchValue) {
            $builder->groupStart()
                ->like('log_aktivitas.id_ref', $searchValue)
                ->orLike('log_aktivitas.log_tipe', $searchValue)
                ->orLike('log_aktivitas.aktivitas', $searchValue)
                ->orLike('log_aktivitas.alamat_ip', $searchValue)
                ->orLike('users.nama', $searchValue)  // search by user name
                ->orLike('log_aktivitas.updated_at', $searchValue)
                ->groupEnd();
        }
        $totalRecordwithFilter = $builder->countAllResults(false);

        // Limit and order
        $builder->orderBy('log_aktivitas.id', 'DESC')
            ->limit($length, $start);

        $data = $builder->get()->getResultArray();

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordwithFilter,
            "data" => $data
        ];

        return $this->response->setJSON($response);
    }
}
