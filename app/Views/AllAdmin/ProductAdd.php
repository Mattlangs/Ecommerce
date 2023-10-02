<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    // Define an empty array if $products is not already defined
    if (!isset($products)) {
        $products = [];
    }
    ?>
    <div class="container mt-4">
      

        <!-- Add Product Form -->
        <form id="addProductForm" method="post" action="<?= site_url('ProductAdd1'); ?>" class="mb-3">
            <h3>Add Product</h3>
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="number" class="form-control" id="productPrice" name="productPrice" required>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" class="form-control" id="productImage" name="productImage" required>
            </div>
            <div class="form-group">
                <label for="productQuantity">Product Quantity</label>
                <input type="number" class="form-control" id="productQuantity" name="productQuantity" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description</label>
                <input type="text" class="form-control" id="productDescription" name="productDescription" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

        <?php foreach ($products as $product): ?>
            <!-- Edit Product Buttons -->
            <button class="btn btn-warning" data-toggle="modal" data-target="#editProductModal" data-product-id="<?= $product['id']; ?>" data-product-name="<?= $product['name']; ?>" data-product-price="<?= $product['price']; ?>" data-product-quantity="<?= $product['quantity']; ?>" data-product-description="<?= $product['description']; ?>">Edit Product</button>
        <?php endforeach; ?>
    </div>

    <!-- Bootstrap JS (optional) - Include this if you want to use Bootstrap JavaScript features -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
