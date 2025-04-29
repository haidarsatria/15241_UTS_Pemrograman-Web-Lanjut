<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
        function __construct()
        {
            helper('form');
        }




        public function logout()
        {
            session()->destroy();
            return redirect()->to('/login');
        }


        public function login()
        {
        
        if ($this->request->getPost()) {
            
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            
            $users = json_decode(file_get_contents(WRITEPATH . 'users.json'), true);

            
            foreach ($users as $user) {
                if ($user['username'] == $username) {
                    
                    if (password_verify($password, $user['password'])) {
                        
                        session()->set([
                            'username' => $user['username'],
                            'role' => $user['role'],
                            'isLoggedIn' => true
                        ]);

                        
                        return redirect()->to($user['role'] == 'admin' ? '/admin' : '/user');
                    } else {
                        
                        session()->setFlashdata('failed', 'Password Salah');
                        return redirect()->back();
                    }
                }
            }

            
            session()->setFlashdata('failed', 'Username Tidak Ditemukan');
            return redirect()->back();
        } else {
            
            return view('v_login');
        }
      }

}
