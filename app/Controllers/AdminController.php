<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ProductModel;


class AdminController extends BaseController
{
    public function index()
    {
        return view('Admin');
       
    }
    public function Inventory()
    {
        return view('AllAdmin/Inventory');
       
    }
    public function register()
    {
        $data = []; 

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

        $data = [
            'name' => $this->request->getVar('productName'),
            'price' => $this->request->getVar('productPrice'),
            'image' => $this->request->getVar('productImage'),
            'quantity' => $this->request->getVar('productQuantity'),
            'description' => $this->request->getVar('productDescription'),
            // Add other fields as needed
        ];

        // Insert the new product into the database
        $productModel->insert($data);

        // Redirect or show a success message
        return redirect()->to('AdminController/product');
    }

    return view('AllAdmin/Inventory');
}

public function editProduct($productId)
{
    // Load the ProductModel
    $productModel = new ProductModel();

    if ($this->request->getMethod() === 'post') {
        // Handle the form submission for updating a product
        $data = [
            'name' => $this->request->getVar('editProductName'),
            'price' => $this->request->getVar('editProductPrice'),
            'image' => $this->request->getVar('productImage'),
            'quantity' => $this->request->getVar('productQuantity'),
            'description' => $this->request->getVar('productDescription'),
            // Add other fields as needed
        ];

        // Update the product in the database
        $productModel->update($productId, $data);

        // Redirect or show a success message
        return redirect()->to('/AdminController/product');
    }

    // Fetch the product data by ID
    $product = $productModel->find($productId);

    return view('AllAdmin/Inventory', ['product' => $product]);
}

public function deleteProduct($productId)
{
    // Load the ProductModel
    $productModel = new ProductModel();

    // Delete the product from the database by ID
    $productModel->delete($productId);

    // Redirect or show a success message
    return redirect()->to('/AdminController/product');
}

}


