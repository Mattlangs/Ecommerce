<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function listProducts()
    {
        
        // Get the category from the query parameter
        $category = $this->request->getGet('category');
    
        // Validate and sanitize the category input
        $category = filter_var($category, FILTER_SANITIZE_STRING);
    
        // Check if the category is empty or not provided
        if (empty($category)) {
            // Handle the case when no category is provided
            return redirect()->to('/'); // Redirect to the homepage or an error page
        }
        
    
        // Load the ProductModel
        $productModel = new ProductModel();
    
        // Get products by category
        $products = $productModel->getProductsByCategory($category);
    
        // Prepare data to pass to the view
        $data = [
            'category' => $category,
            'products' => $products,
        ];
    
        // Load the view
        return view('welcome_message', $data);
    }
    
}
