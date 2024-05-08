<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Tiket extends BaseController
{
    public function index()
    {
        return view('CMS/tiket/tiket');
    }
    public function detail_tiket()
    {
        return view('CMS/tiket/detail_tiket');
    }
}
