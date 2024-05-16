<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TiketModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

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
            ->orderBy('id', 'DESC')->findAll($length, $start);

        $data = [];
        foreach ($records as $record) {
            $data[] = [
                'nama_kontak' => $record['nama_kontak'],
                'email' => $record['email'],
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
        $data['tiket'] = $tiketmodel->where('id', $id)->findAll();
        return view('CMS/tiket/detail_tiket', $data);
    }
}
