<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    
    public function index()
    {
       
        return view('welcome_message');
    }

    public function login()
    {
        $data = []; // Initialize an empty data array

        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $username = $this->request->getVar('Username');
            $password = $this->request->getVar('Password');
    
            // Validate user input (add more validation as needed)
    
            // Check if the user exists in the database
            $user = $model->where('username', $username)->first();
            if ($user && password_verify($password, $user['password'])) {
                // Successful login, you can set session variables here
                return redirect()->to('/main'); // Redirect to the main page
            } else {
                // Failed login, display an error message
                $data['error'] = 'Invalid username or password'; // Set the error message
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

            // Validate user input (add more validation as needed)

            // Insert the new user into the database
            if ($model->insert($data)) {
                // Successful registration, you can set session variables here
                return redirect()->to('/include/login');
            } else {
                // Registration failed, display an error message
                $data['error'] = 'Registration failed';
            }
        }

        return view('include/login', $data);
    }

    public function forgotPassword()
    {
        // Handle password reset logic here
        return view('forgot_password');
    }
    public function resetPassword()
    {
        $data = [];
    
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
    
            // Set validation rules for the form fields
            $validation->setRules([
                'Email' => 'required|valid_email',
                'NewPassword' => 'required|min_length[8]',
                'ConfirmPassword' => 'required|matches[NewPassword]',
            ]);
    
            // Initialize the $model variable
            $model = new UserModel();
    
            // Validate the form inputs
            if ($validation->withRequest($this->request)->run()) {
                // Valid form inputs, proceed with password reset
                $email = $this->request->getVar('Email');
                $newPassword = $this->request->getVar('NewPassword');
    
                // Find the user by email
                $user = $model->where('email', $email)->first();
    
                if ($user) {
                    // Update the user's password
                    $updatedData = [
                        'password' => password_hash($newPassword, PASSWORD_DEFAULT),
                    ];
    
                    if ($model->update($user['id'], $updatedData)) {
                        // Password reset successful, you can redirect or display a success message
                        $data['success'] = 'Password reset successful.';
                    } else {
                        // Password reset failed, database update error
                        $data['error'] = 'Password reset failed. Please try again later.';
                    }
                } else {
                    // User not found with the provided email
                    $data['error'] = 'User with the provided email not found.';
                }
            } else {
                // Form validation failed, show validation errors
                $data['validation'] = $validation->getErrors();
            }
        }
    
        return view('include/login', $data);
    }


    

}    