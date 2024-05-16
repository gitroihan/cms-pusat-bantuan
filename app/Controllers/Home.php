<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\LogAktivitasModel;
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
        $data = $model->getUserById($userId);

        return view('CMS/dashboard', ['data' => $data]);
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
}
