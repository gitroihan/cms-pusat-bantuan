<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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

        if ($user) {
            if (password_verify($password, $user['password'])) {
               
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['nama'],
                    'logged_in' => true
                ]);

                
                return redirect()->to('/cmshome');
            }
        }


        return redirect()->back()->withInput()->with('error', 'Login failed! Please check your username and password.');
    }

    public function logout()
    {
        $session = session();
        $session->remove(['user_id', 'username', 'logged_in']);

        return redirect()->to('/login');
    }
}
