<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HeadertentangkamiModel;
use App\Models\LogAktivitasModel;
use App\Models\TentangkamiModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class TentangKami extends BaseController
{
    public function tentang_kami()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data['data'] = $model->getUserById($userId);

        helper(['form']);
        $about = new TentangkamiModel();
        $headabout = new HeadertentangkamiModel();
        $data['tentang'] = $about->findAll();
        $data['head'] = $headabout->findAll();
        return view('CMS/tentang_kami', $data);
    }
    public function ubahheadtentangkami()
    {
        $head = new HeadertentangkamiModel();
        $id = $this->request->getPost('id');
        $originalData = $head->find($id);

        // Siapkan data yang akan diubah
        $data = [
            'judul_banner' => $this->request->getPost('judul_banner'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $image = $this->request->getFile('gambar');
        $path = $originalData['gambar'];  // Default to the original image path
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $path = $newName;
            $data['gambar'] = $path;
        }

        // Simpan perubahan ke dalam database
        $head->update($id, $data);

        // Data untuk tabel riwayat
        $session = session();
        $userId = $session->get('user_id');
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();

        // Tentukan aktivitas berdasarkan perubahan yang dilakukan
        $aktivitas = 'mengubah header Tentang Kami: ';
        $changes = [];

        if ($data['judul_banner'] !== $originalData['judul_banner']) {
            $changes[] = 'judul banner';
        }
        if ($data['deskripsi'] !== $originalData['deskripsi']) {
            $changes[] = 'deskripsi';
        }
        if (isset($data['gambar']) && $data['gambar'] !== $originalData['gambar']) {
            $changes[] = 'gambar';
        }

        if (!empty($changes)) {
            $aktivitas .= implode(', ', $changes);

            $logData = [
                'id_ref' => $userId,
                'log_tipe' => 'ubah',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);
        }
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function tambahtentangkami()
    {
        $aboutus = new TentangkamiModel();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        // Simpan data ke database
        $aboutus->save($data);

        // Data untuk tabel riwayat
        $session = session();
        $userId = $session->get('user_id');
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();

        // Siapkan deskripsi aktivitas
        $aktivitas = 'menambahkan entri Tentang Kami: ' . $data['judul'];

        $logData = [
            'id_ref' => $userId,
            'log_tipe' => 'tambah',
            'aktivitas' => $aktivitas,
            'alamat_ip' => $alamat_ip,
            'id_user' => $userId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan log ke tabel riwayat
        $riwayatModel->insert($logData);
        return redirect()->back();
    }

    public function ubahtentangkami()
    {
        $aboutus = new TentangkamiModel();
        $id = $this->request->getPost('id');
        $originalData = $aboutus->find($id);

        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        $aboutus->update($id, $data);

        // Data untuk tabel riwayat
        $session = session();
        $userId = $session->get('user_id');
        $riwayatModel = new LogAktivitasModel();
        $alamat_ip = $this->request->getIPAddress();

        // Tentukan aktivitas berdasarkan perubahan yang dilakukan
        $aktivitas = 'mengubah entri Tentang Kami: ';
        $changes = [];

        if ($data['judul'] !== $originalData['judul']) {
            $changes[] = 'judul';
        }
        if ($data['deskripsi'] !== $originalData['deskripsi']) {
            $changes[] = 'deskripsi';
        }

        if (!empty($changes)) {
            $aktivitas .= implode(', ', $changes);

            $logData = [
                'id_ref' => $userId,
                'log_tipe' => 'ubah',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);
        }

        return redirect()->back();
    }

    public function hapustentangkami()
    {
        $id = $this->request->getPost('id');
        $aboutus = new TentangkamiModel();
        // Dapatkan data asli sebelum dihapus
        $originalData = $aboutus->find($id);

        if ($originalData) {
            // Hapus data dari database
            $aboutus->where('id', $id)->delete();

            // Data untuk tabel riwayat
            $session = session();
            $userId = $session->get('user_id');
            $riwayatModel = new LogAktivitasModel();
            $alamat_ip = $this->request->getIPAddress();

            // Siapkan deskripsi aktivitas
            $aktivitas = 'menghapus entri Tentang Kami: ' . $originalData['judul'];

            $logData = [
                'id_ref' => $userId,
                'log_tipe' => 'hapus',
                'aktivitas' => $aktivitas,
                'alamat_ip' => $alamat_ip,
                'id_user' => $userId,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Simpan log ke tabel riwayat
            $riwayatModel->insert($logData);
        }
        return redirect()->back();
    }
}
