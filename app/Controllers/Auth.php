<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_Auth = new Model_Auth();
    }

    public function register()
    {
        $data = array(
            'title' => 'Register',
        );
        return view('auth/register', $data);
    }


    public function save_register()
    {
        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} required'
                ]
            ],
            'email' => [
                'label' => 'email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} required'
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} required'
                ]
            ],
            'repassword' => [
                'label' => 'Retype password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} required',
                    'matches' => '{field} not match'
                ]
            ],
        ])) {
            $data = array(
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'satker/afiliasi' => $this->upload->getPost('satker/afiliasi'),
            );

            $this->Model_Auth->save_register($data);
            session()->setFlashdata('pesan', 'Register Success');
            return redirect()->to(base_url('Auth/register'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('auth/login', $data);
    }

    public function check_login()
    {
        if ($this->validate([
            'email' => [
                'label' => 'email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} required'
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} required'
                ]
            ],
        ])) {
            //jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $check = $this->Model_Auth->login($email, $password);
            if ($check) {
                //jika datanya cocok
                session()->set('log', true);
                session()->set('username', $check['username']);
                session()->set('email', $check['email']);
                session()->set('level', $check['level']);
                session()->set('profile_picture', $check['profile_picture']);
                //login
                return redirect()->to(base_url('Home/user'));
            } else {
                //jika datanya tidak cocok
                session()->setFlashdata('pesan', 'Login failed, Please check your username or password !');
                return redirect()->to(base_url('Auth/login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('level');
        session()->remove('profile_picture');

        session()->setFlashdata('pesan', 'Logout success !');
        return redirect()->to(base_url('Auth/login'));
    }
}
