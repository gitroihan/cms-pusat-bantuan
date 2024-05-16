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
        $data['tiket'] =$tiketmodel->findAll();
        return view('CMS/tiket/tiket', $data);
    }
    public function detail_tiket($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $tiketmodel = new TiketModel();
        $data['data'] = $model->getUserById($userId);
        $data['tiket'] = $tiketmodel->where('id', $id)->findAll();
        return view('CMS/tiket/detail_tiket',$data);
    }
}
