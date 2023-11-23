<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->user = new \App\Models\M_User();
        $this->log = new \App\Models\M_Log_Login();
        // $this->load->library('user_agent');
        
    }
    public function index(){
        return view('admin/konten/auth/index');
    }

    public function auth_validate(){
        
        $session    = session();
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password');
        $data_user  = $this->user->where(['username' => $username])->first();
        $agent      = $this->request->getUserAgent();
        $browser    = $agent->getBrowser();
        $ip         = $this->request->getIPAddress();

        if($data_user){
            $pass = $data_user['password'];
            if($password == $pass){
                $ses_set = [
                    'username' => $data_user['username'],
                    'nama'     => $data_user['nama'],
                    'logged_in'=> true,
                    'role'     => $data_user['role']
                ];

                $session->set($ses_set);
                
                $data = [
                    'username'      => $username,
                    'ip'            => $ip,
                    'browser'       => $browser,
                    'login_at'      => date('Y-m-d H:i:s')
                ];

                $this->log->insert($data);
                return redirect()->to(base_url().'/admin');
            }else{
                $session->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url().'/auth');
            }
        }else{
            $session->setFlashdata('error','username tidak ditemukan');
            return redirect()->to(base_url().'/auth');
        }
    }
    public function log_out(){
        // $user = session()->username;
        // $tanggal = date('Y-m-d');
        // $data = [
        //     'username'     => $user,
        //     'logout_at'     => $tanggal
        // ];
        $this->log->log_out();
        $session = session();
        $session->remove('logged_in');
        $session->remove('username');
        $session->remove('nama');
        return redirect()->to(base_url().'/auth');
    }
}