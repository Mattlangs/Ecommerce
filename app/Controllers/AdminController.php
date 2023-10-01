<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        
    }
    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new AdminModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT), // Hash the password
            ];
    
            // Validate user input (add more validation as needed)
    
            // Insert the new user into the database
            if ($model->insert($data)) {
                // Successful registration
                return redirect()->to('/login'); // Redirect to the login page
            } else {
                // Registration failed, display an error message
                $data['error'] = 'Registration failed';
            }
        }
    
        return view('register', $data);
    }
    
    

}
