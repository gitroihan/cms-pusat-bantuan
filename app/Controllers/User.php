<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use function password_verify;


class User extends BaseController
{
    public function index()
    {
        return view('CMS/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->where('nama', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set([
                'user_id' => $user['id'],
                'logged_in' => true
            ]);

            return redirect()->to('/cmshome');
        } else {
            session()->setFlashdata('error', 'username atau password salah.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove(['user_id', 'username', 'logged_in']);

        return redirect()->to('/login');
    }

    // profile
    public function lihat_profile()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);

        return view('CMS/profile', ['data' => $data]);
    }
    public function ubah_profile()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);

        return view('CMS/profile_edit', ['data' => $data]);
    }
    public function simpan_profile()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $riwayatModel = new LogAktivitasModel();
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $alamat_ip = $this->request->getIPAddress();

        // Validasi data
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data user
        $data = [
            'nama' => $nama,
            'email' => $email,
        ];

        // Mulai transaksi
        $db = \Config\Database::connect();
        $db->transStart();

        // Update data user
        $model->update($userId, $data);

        // Data untuk tabel riwayat
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'Update Profile',
            'aktivitas' => 'mengubah informasi profile',
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);

        // Selesaikan transaksi
        $db->transComplete();

        $session->set([
            'nama' => $nama,
            'email' => $email,
        ]);

        if ($model->update($userId, $data)) {
            return redirect()->to('/lihat_profile')->with('message', 'Profile updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Failed to update profile');
        }
    }
    public function ubah_foto()
    {
        $session = session();
        $userId = $session->get('user_id');
        $fotoProfile = $this->request->getFile('foto_profile');

        // Proses unggahan foto profil
        if ($fotoProfile->isValid() && !$fotoProfile->hasMoved()) {
            $newName = $fotoProfile->getClientName(); // Nama file yang unik
            // Pindahkan file ke direktori uploads
            $fotoProfile->move(ROOTPATH  . 'uploads', $newName);

            // Simpan nama file ke basis data
            $model = new UserModel();
            $data['foto_profile'] = $newName;

            // Update data pengguna dengan foto profil yang baru
            if ($model->update($userId, $data)) {
                // Redirect ke halaman profil dengan pesan sukses
                return redirect()->to('/ubah_profile')->with('success', 'Foto profil berhasil diubah.');
            } else {
                // Jika gagal update, kembalikan pesan error
                return redirect()->to('/ubah_profile')->with('error', 'Gagal mengubah foto profil.');
            }
        } else {
            // Jika unggahan foto tidak valid, kembalikan pesan error
            return redirect()->to('/ubah_profile')->with('error', 'Unggahan foto profil tidak valid.');
        }
    }
}
