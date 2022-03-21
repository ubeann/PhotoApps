<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'isi' => 'ini home',
        );
        return view('auth/login', $data);
    }

    public function register()
    {
        return view('auth/register');
    }

    public function dashboard()
    {
        return view('home');
    }
    public function admin()
    {
        return view('admin/index');
    }
    public function user()
    {
        return view('user/index');
    }
    public function perwiraKsatria()
    {
        return view('perwiraKsatria/index');
    }
    public function approver()
    {
        return view('approver/index');
    }
    public function director()
    {
        return view('director/index');
    }
}
