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
    <h2>Product Inventory</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Actions</th>
                    <th><a href="ProductAdd" class="btn btn-success btn-sm">Add Product</a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['name']; ?></td>
                        <td><?= $product['price']; ?></td>
                        <td><img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="img-thumbnail" width="100"></td>
                        <td><?= $product['category_name']; ?></td> <!-- Display the category name -->
                        <td><?= $product['quantity']; ?></td>
                        <td><?= $product['description']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= site_url('/AdminController/editProduct/' . $product['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?= site_url('/AdminController/deleteProduct/' . $product['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                            <div class="btn-group">
                         
                                
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS (optional) - Include this if you want to use Bootstrap JavaScript features -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
