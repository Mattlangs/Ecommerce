<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Controllers\BaseController;

class Homes extends BaseController
{
            
    public function index()
    {

        $productModel = new ProductModel();

        $categoryId = 1; 
        $data['products'] = $productModel->getProductsByCategory($categoryId);

        return view('welcome_message', $data);
    
    }

    public function login()
    {
        $data = []; 

        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $username = $this->request->getVar('Username');
            $password = $this->request->getVar('Password');
    
           
    
          
            $user = $model->where('username', $username)->first();
            if ($user && password_verify($password, $user['password'])) {
              
                return redirect()->to('/main'); 
            } else {
                
                $data['error'] = 'Invalid username or password'; 
            }
        }
    
        return view('include/login', $data);
    }

    public function signup()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $data = [
                'username' => $this->request->getVar('Username'),
                'password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
                'email' => $this->request->getVar('Email'),
                'phone' => $this->request->getVar('Phone'),
            ];

          

           
            if ($model->insert($data)) {
              
                return redirect()->to('/include/login');
            } else {
               
                $data['error'] = 'Registration failed';
            }
        }

        return view('include/login', $data);
    }

    public function forgotPassword()
    {
    
        return view('forgot_password');
    }
    public function resetPassword()
    {
        $data = [];
    
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
    
           
            $validation->setRules([
                'Email' => 'required|valid_email',
                'NewPassword' => 'required|min_length[8]',
                'ConfirmPassword' => 'required|matches[NewPassword]',
            ]);
    
        
            $model = new UserModel();
    
           
            if ($validation->withRequest($this->request)->run()) {
            
                $email = $this->request->getVar('Email');
                $newPassword = $this->request->getVar('NewPassword');
    
              
                $user = $model->where('email', $email)->first();
    
                if ($user) {
                  
                    $updatedData = [
                        'password' => password_hash($newPassword, PASSWORD_DEFAULT),
                    ];
    
                    if ($model->update($user['id'], $updatedData)) {
                        
                        $data['success'] = 'Password reset successful.';
                    } else {
                       
                        $data['error'] = 'Password reset failed. Please try again later.';
                    }
                } else {
                    
                    $data['error'] = 'User with the provided email not found.';
                }
            } else {
              
                $data['validation'] = $validation->getErrors();
               
            }
           
        }
    
        return view('include/login', $data);
    }
    public function category($categoryId)
{
 
    $productModel = new ProductModel();

    
    $data['products'] = $productModel->getProductsByCategory($categoryId);

    return view('include/product_list', $data);
}

public function getProductsByCategory($categoryId)
{
   
    $productModel = new ProductModel();


    $data['products'] = $productModel->getProductsByCategory($categoryId);

  
    return view('include/product_list', $data);
}

    

}
