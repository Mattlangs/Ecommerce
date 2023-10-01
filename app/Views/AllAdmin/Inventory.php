<?php
// Define an empty array if $products is not already defined
if (!isset($products)) {
    $products = [];
}
?>
<?php foreach ($products as $product): ?>
    <div>
        <span><?= $product['name']; ?></span>
        <span><?= $product['price']; ?></span>
        <span><?= $product['image']; ?></span>
        <span><?= $product['quantity']; ?></span>
        <span><?= $product['description']; ?></span>

        <!-- Add other fields as needed -->
        <a href="<?= site_url('/AdminController/editProduct/' . $product['id']); ?>">Edit</a>
        <a href="<?= site_url('/AdminController/deleteProduct/' . $product['id']); ?>">Delete</a>
    </div>
<?php endforeach; ?>

<!-- Add Product Form -->
<form id="addProductForm" method="post" action="<?= site_url('AdminController/addProduct'); ?>">
    <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" class="form-control" id="productName" name="productName" required>
    </div>
    <div class="form-group">
        <label for="productPrice">Product Price</label>
        <input type="number" class="form-control" id="productPrice" name="productPrice" required>
    </div>
    <div class="form-group">
        <label for="productName">Product Image</label>
        <input type="file" class="form-control" id="productImage" name="productImage" required>
    </div>
    <div class="form-group">
        <label for="productPrice">Product Quantity</label>
        <input type="number" class="form-control" id="productQuantity" name="productQuantity" required>
    </div>
    <div class="form-group">
        <label for="productPrice">Product description</label>
        <input type="text" class="form-control" id="productDescription" name="productDescription" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<!-- Button to Trigger Edit Modal -->
<button class="btn btn-warning" data-toggle="modal" data-target="#editProductModal">Edit Product</button>

<!-- Include Edit Product Modal (View.php) -->
<?php include('View.php'); ?>
