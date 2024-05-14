<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Tiket extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/tiket/tiket',['data' => $data]);
    }
    public function detail_tiket()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/tiket/detail_tiket',['data' => $data]);
    }
}
