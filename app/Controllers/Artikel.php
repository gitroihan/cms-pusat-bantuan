<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Artikel extends BaseController
{
    public function index()
    {
        return view('CMS/artikel/artikel');

    }
    public function tambah_artikel()
    {
        return view('CMS/artikel/tambah_artikel');

    }
    public function detail_artikel()
    {
        return view('CMS/artikel/detail_artikel');

    }
}
