<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Artikel extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/artikel/artikel', ['data' =>$data]);

    }
    public function tambah_artikel()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/artikel/tambah_artikel', ['data' =>$data]);

    }
    public function detail_artikel()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/artikel/detail_artikel', ['data' =>$data]);

    }
}
