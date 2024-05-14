<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/kategori/kategori', ['data' =>$data]);
    }
    public function kategori2()
    {
        $session = session();
        $userId = $session->get('user_id');

        $model = new UserModel();
        $data = $model->getUserById($userId);
        return view('CMS/kategori/kategori2', ['data' =>$data]);
    }
}
