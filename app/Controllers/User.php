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
        $riwayatModel = new LogAktivitasModel();
        $user = $model->where('username', $username)->first();


        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set([
                'user_id' => $user['id'],
                'logged_in' => true
            ]);

            // Data untuk tabel riwayat
            $alamat_ip = $this->request->getIPAddress();
            $logData = [
                'id_ref' => $user['id'],
                'log_tipe' => 'login',
                'aktivitas' => 'login',
                'alamat_ip' => $alamat_ip,
                'id_user' => $user['id'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);

            return redirect()->to('/cmshome');
        } else {
            session()->setFlashdata('error', 'username atau password salah.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $riwayatModel = new LogAktivitasModel();

        // Ambil user ID dari sesi
        $userId = $session->get('user_id');
        $username = $session->get('username');

        // Data untuk tabel riwayat
        $alamat_ip = $this->request->getIPAddress();
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'logout',
            'aktivitas' => 'logout',
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);
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
        $username = $this->request->getPost('username');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $alamat_ip = $this->request->getIPAddress();

        // Validasi data
        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            'nama' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Mendapatkan data user lama dari database
        $userLama = $model->find($userId);
        $usernameLama = $userLama['username'];
        $namaLama = $userLama['nama'];
        $emailLama = $userLama['email'];

        // Update data user
        $data = [
            'username' => $username,
            'nama' => $nama,
            'email' => $email,
        ];

        // Mulai transaksi
        $db = \Config\Database::connect();
        $db->transStart();

        // Update data user
        $model->update($userId, $data);

        // Menyiapkan deskripsi aktivitas yang lebih detail
        $aktivitas = "mengubah informasi profile: ";
        if ($usernameLama !== $username) {
            $aktivitas .= "username dari '{$usernameLama}' menjadi '{$username}', ";
        }
        if ($namaLama !== $nama) {
            $aktivitas .= "nama dari '{$namaLama}' menjadi '{$nama}', ";
        }
        if ($emailLama !== $email) {
            $aktivitas .= "email dari '{$emailLama}' menjadi '{$email}', ";
        }
        $aktivitas = rtrim($aktivitas, ', ');

        // Data untuk tabel riwayat
        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'Update Profile',
            'aktivitas' => $aktivitas,
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);

        // Selesaikan transaksi
        $db->transComplete();

        $session->set([
            'username' => $username,
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
        $model = new UserModel();
        $riwayatModel = new LogAktivitasModel();

        // Proses unggahan foto profil
        if ($fotoProfile->isValid() && !$fotoProfile->hasMoved()) {
            $newName = $fotoProfile->getClientName(); // Nama file yang unik
            // Pindahkan file ke direktori uploads
            $fotoProfile->move(ROOTPATH  . 'uploads', $newName);

            // Ambil nama file foto lama dari database untuk log
            $userLama = $model->find($userId);
            $fotoLama = $userLama['foto_profile'];

            // Simpan nama file ke basis data
            $model = new UserModel();
            $data['foto_profile'] = $newName;

            // Mulai transaksi
            $db = \Config\Database::connect();
            $db->transStart();

            // Update data pengguna dengan foto profil yang baru
            if ($model->update($userId, $data)) {
                // Menyiapkan deskripsi aktivitas yang lebih detail
                $aktivitas = "mengubah foto profil dari '{$fotoLama}' menjadi '{$newName}'";

                // Data untuk tabel riwayat
                $alamat_ip = $this->request->getIPAddress();
                $logData = [
                    'id_ref' => $userId,
                    'log_tipe' => 'Update Foto Profile',
                    'aktivitas' => $aktivitas,
                    'alamat_ip' => $alamat_ip,
                    'id_user' => $userId,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                // Simpan log ke tabel riwayat
                $riwayatModel->insert($logData);

                // Selesaikan transaksi
                $db->transComplete();

                return redirect()->to('/ubah_profile')->with('success', 'Foto profil berhasil diubah.');
            } else {
                // Rollback transaksi jika update gagal
                $db->transRollback();
                return redirect()->to('/ubah_profile')->with('error', 'Gagal mengubah foto profil.');
            }
        } else {
            // Jika unggahan foto tidak valid, kembalikan pesan error
            return redirect()->to('/ubah_profile')->with('error', 'Unggahan foto profil tidak valid.');
        }
    }
    public function editpassword()
    {
        header('Content-Type: application/json');
        $users = new UserModel();
        $riwayatModel = new LogAktivitasModel();
        $session = session();
        $userId = $session->get('user_id');

        $id = $this->request->getPost('id');
        $password = $this->request->getPost('password');
        $passwordBaru = $this->request->getPost('password-baru');

        $response = [];

        if (empty($id) || empty($password) || empty($passwordBaru)) {
            $response['status'] = false;
            $response['message'] = 'Data tidak lengkap';
            echo json_encode($response);
            return;
        }

        $user = $users->cekpassword($id, $password);

        if ($user) {
            $pwbaru = $users->ubahpassword($passwordBaru);

            $users->save([
                'id' => $id,
                'password' => $pwbaru
            ]);

            // Data untuk tabel riwayat
            $alamat_ip = $this->request->getIPAddress();
            $logData = [
                'id_ref' => $userId,
                'log_tipe' => 'ubah password',
                'aktivitas' => 'mengubah password',
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);

            $response['status'] = true;
            $response['message'] = 'Password berhasil diubah';
        } else {
            $response['status'] = false;
            $response['message'] = 'Password lama tidak cocok';
        }

        echo json_encode($response);
    }
}
