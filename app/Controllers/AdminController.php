<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;


class AdminController extends BaseController
{
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
                        'quantity' => $this->request->getVar('productQuantity'),
                        'description' => $this->request->getVar('productDescription'),
                        // Add other fields as needed
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

                return view('AllAdmin/ProductAdd');
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


