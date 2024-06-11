<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;
use App\Models\TiketModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

class Tiket extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $tiketmodel = new TiketModel();
        $data['data'] = $model->getUserById($userId);
        $data['tiket'] = $tiketmodel->findAll();
        return view('CMS/tiket/tiket', $data);
    }
    public function getTiketData()
    {
        $request = \Config\Services::request();
        $tiketmodel = new TiketModel();

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');
        $searchValue = $request->getPost('search')['value'];

        $totalRecords = $tiketmodel->countAll();
        $totalRecordwithFilter = $tiketmodel->like('nama_kontak', $searchValue)->orLike('email', $searchValue)->countAllResults();

        $records = $tiketmodel->like('nama_kontak', $searchValue)->orLike('email', $searchValue)
            ->orderBy('tanggal', 'DESC')->findAll($length, $start);

        $data = [];


        foreach ($records as $record) {
            $data[] = [
                'nama_kontak' => $record['nama_kontak'],
                'email' => $record['email'],
                'tanggal' => $record['tanggal'],
                'status' => $record['status'],
                'id' => $record['id']
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

    public function detail_tiket($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $tiketmodel = new TiketModel();
        $data['data'] = $model->getUserById($userId);
        $data['tiket'] = $tiketmodel->where('id', $id)->first(); // Use first() instead of findAll() for single record

        // Format the datetime
        $dateTime = new DateTime($data['tiket']['tanggal']);
        $formattedDateTime = $dateTime->format('H.i d/n/Y'); // Format as "11.35 11/6/2024"
        $data['formattedDateTime'] = $formattedDateTime;


        return view('CMS/tiket/detail_tiket', $data);
    }
    public function ubah_status($id)
    {
        $session = session();
        $userId = $session->get('user_id');
        $alamat_ip = $this->request->getIPAddress();

        $tiketModel = new TiketModel();
        $riwayatModel = new LogAktivitasModel();

        // Dapatkan data tiket
        $tiket = $tiketModel->find($id);

        if ($tiket) {
            // Update status tiket menjadi "Selesai"
            $tiketModel->update($id, ['status' => 'Selesai']);

            // Menyiapkan deskripsi aktivitas yang lebih detail
            $aktivitas = "Meng acc tiket dari : {$tiket['nama_kontak']}";

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

            // Set flashdata untuk memberi tahu pengguna bahwa status telah diperbarui
            $session->setFlashdata('success', 'Status tiket berhasil diubah menjadi Selesai.');
        } else {
            // Set flashdata untuk memberi tahu pengguna bahwa tiket tidak ditemukan
            $session->setFlashdata('error', 'Tiket tidak ditemukan.');
        }

        return redirect()->to('/cmstiket');
    }
}
