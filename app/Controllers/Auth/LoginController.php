<?php

namespace App\Controllers\Auth;

use App\Models\User;
use CodeIgniter\Controller;
 
class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('auth/login');
    } 
    
    public function register()
    {
        helper(['form']);
        return view('auth/register');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'role'    => $data['role'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function doRegister()
    {
        $session = session();
        $model = new User();
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $session->setFlashdata('msg', 'Email telah terdaftar');
            return redirect()->to('/register');
        }else{
            (new User)->insert([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'role' => 'Penyewa'
            ]);

            $session->setFlashdata('success', 'Pendaftaran berhasil. Silahkan login untuk memulai');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}