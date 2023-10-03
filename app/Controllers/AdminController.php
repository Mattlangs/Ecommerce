<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;


class AdminController extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }
    public function index()
    {
        return view('Admin');
    }
    public function Inventory()
    {
        // Load the ProductModel
        $productModel = new ProductModel();
    
        // Fetch all products from the database
        $products = $productModel->findAll();   
    
        // Load the CategoryModel
        $categoryModel = new CategoryModel();
    
        // Fetch all categories from the database
        $categories = $categoryModel->findAll();
    
        // Create a mapping of category IDs to category names
        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category['id']] = $category['name'];
        }
    
        // Replace category_id with category name in product data
        foreach ($products as &$product) {
            if (isset($categoryMap[$product['category_id']])) {
                $product['category_name'] = $categoryMap[$product['category_id']];
            } else {
                $product['category_name'] = 'Unknown'; // Default if category not found
            }
        }
    
        // Pass products to the view
        $data['products'] = $products;
    
        return view('AllAdmin/Inventory', $data);
    }
    
    
    public function login(){
        helper(['form']);
        echo view('adminlog');
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
   
    public function LoginAuth()
    {
        $session = session();
        $userModel = new AdminModel();
        $email = $this->request->getVar('email');
    
        $data = $userModel->where('email', $email)->first();
    
        if ($data) {
            $enteredPassword = $this->request->getVar('password');
            $hashedPassword = $data['password'];
    
            if (password_verify($enteredPassword, $hashedPassword)) {
                $ses_data = [
                    'id' => $data['email'],
                    'isLoggedIn' => true,
                   
                    'username' => $data['username'],
                ];
                $session->remove('validation_errors');
    
                $session->set($ses_data);
               
                    return redirect()->to(base_url('/admin'));
               
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to(base_url('/login'));
        }
    
    }
    
    public function register(){
        helper(['form']);
        $rules=[
            'username' =>'required|min_length[4]|max_length[100]',
            'email'=>'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'=>'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'];
            
            if($this->validate($rules)){
                $userModel = new AdminModel();
                $data=[
                    'username'=> $this->request->getVar('username'),
                    'email'=> $this->request->getVar('email'),
                    'password'=> password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
                ];
                $userModel->save($data);
                return redirect()->to(base_url('/login'));
            }
            else{
                $data['validation']= $this->validator;
                echo view('signup', $data);
            }
        }

            public function product()
        {
            // Load the ProductModel
            $productModel = new ProductModel();

            // Fetch products from the database
            $categoryId = 1; // Replace with the desired category ID
            $data['products'] = $productModel->getProductsByCategory($categoryId);

            return view('AllAdmin/Inventory', $data);
        }

        public function addProduct()
        {
            if ($this->request->getMethod() === 'post') {
                // Handle the form submission for adding a product
                $productModel = new ProductModel();
                $categoryModel = new CategoryModel();
                
                // Get the category ID based on the category name
                $categoryName = $this->request->getVar('productCategory');
                $category = $categoryModel->where('name', $categoryName)->first();
        
                // Check if the category exists
                if (!$category) {
                    // Handle the case where the category doesn't exist
                    // You can add error handling code here or create a new category
                    // Depending on your business logic
                } else {
                    // Category exists, continue with product insertion
                    $data = [
                        'name' => $this->request->getVar('productName'),
                        'price' => $this->request->getVar('productPrice'),
                        'quantity' => $this->request->getVar('productQuantity'),
                        'description' => $this->request->getVar('productDescription'),
                        'category_id' => $category['id'], // Assign the category ID
                    ];
        
                    $productImage = $this->request->getFile('productImage');
        
                    if ($productImage && $productImage->isValid() && !$productImage->hasMoved()) {
                        $newName = $productImage->getRandomName();
                        $productImage->move(ROOTPATH . 'public/images', $newName);
                        $data['image'] = $newName;
                    } else {
                        // Handle the case where no valid file was uploaded, or there was an issue with the upload
                        // You can add error handling code here
                    }
        
                    // Insert the new product into the database
                    $productModel->insert($data);
        
                    // Redirect or show a success message
                    return redirect()->to('Inventory');
                }
            }
        
            return view('AllAdmin/ProductAdd');
        }
        
        
        


        public function updateProduct($productId)
        {
            if ($this->request->getMethod() === 'post') {
                $productModel = new ProductModel();
        
                // Get the updated data from the form
                $updatedData = [
                    'name' => $this->request->getVar('editProductName'),
                    'category_id' => $this->request->getVar('editProductCategory'), // Update category if needed
                    'price' => $this->request->getVar('editProductPrice'), // Add price field
                    'image' => $this->request->getVar('editProductImage'), // Add image field
                    'quantity' => $this->request->getVar('editProductQuantity'), // Add quantity field
                    'description' => $this->request->getVar('editProductDescription'), // Add description field
                    // Add other fields for updating
                ];
        
                // Update the product in the database
                $productModel->update($productId, $updatedData);
        
                // Redirect or show a success message
                return redirect()->to('Inventory');
            }
        }
        

        
public function deleteProduct($productId)
{
    // Load the ProductModel
    $productModel = new ProductModel();

    // Check if the product exists
    $product = $productModel->find($productId);

    if ($product) {
        // Delete the product from the database
        $productModel->delete($productId);
        // Redirect to the product inventory page or display a success message
        return redirect()->to('Inventory')->with('success', 'Product deleted successfully');
    } else {
        // Redirect to the product inventory page with an error message
        return redirect()->to('Inventory')->with('error', 'Product not found');
    }
}

}


