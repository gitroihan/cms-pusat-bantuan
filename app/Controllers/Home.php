<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function login()
    {
        return view('CMS/login');
    }
    public function dashboard()
    {
        return view('CMS/dashboard');
    }
    public function histori()
    {
        return view('CMS/histori');
    }
    public function menu()
    {
        return view('CMS/menu');
    }
    public function kontak()
    {
        return view('CMS/kontak');
    }
    public function user()
    {
        return view('CMS/user');
    }
    public function edituser()
    {
        return view('CMS/user_edit');
    }
}
