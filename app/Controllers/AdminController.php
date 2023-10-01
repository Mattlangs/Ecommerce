<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        echo 'pogi';
        return view('Admin');
    }
    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new AdminModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
    
        
            if ($model->insert($data)) {
               
                return redirect()->to('/adminlog');
            } else {
               
                $data['error'] = 'Registration failed';
            }
        }
    
        return view('Admin', $data);
    }
    
    

}
