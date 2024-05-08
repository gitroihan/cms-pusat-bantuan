<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        return view('CMS/kategori/kategori');
    }
    public function kategori2()
    {
        return view('CMS/kategori/kategori2');
    }
}
