<?php

namespace App\Controllers;

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
        $data = $model->getUserById($userId);
        return view('CMS/kontak' ,['data' => $data]);
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
