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
                        <td><img src="<?= base_url('public/images/' . $product['image']); ?>" alt="<?= $product['name']; ?>" class="img-thumbnail" width="100"></td>
                        <td><?= $product['category_name']; ?></td> <!-- Display the category name -->
                        <td><?= $product['quantity']; ?></td>
                        <td><?= $product['description']; ?></td>
                        <td>
                        <td>

    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-sm btn-edit" data-product-id="<?= $product['id']; ?>" data-toggle="modal" data-target="#editProductModal<?= $product['id']; ?>">Edit</button>
        <a href="<?= site_url('/AdminController/deleteProduct/' . $product['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
    </div>
</td>


                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <?php foreach ($products as $product): ?>
<!-- Inside the modal for editing -->
<div class="modal fade" id="editProductModal<?= $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel<?= $product['id']; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel<?= $product['id']; ?>">Edit Product - <?= $product['name']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit form -->
                <form action="<?= site_url('/AdminController/updateProduct/' . $product['id']); ?>" method="post">
                    <div class="form-group">
                        <label for="editProductName">Name</label>
                        <input type="text" class="form-control" id="editProductName" name="editProductName" value="<?= $product['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductCategory">Category</label>
                        <input type="num" class="form-control" id="editProductCategory" name="editProductCategory" value="<?= $product['category_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductPrice">Price</label>
                        <input type="text" class="form-control" id="editProductPrice" name="editProductPrice" value="<?= $product['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductImage">Image</label>
                        <input type="file" class="form-control" id="editProductImage" name="editProductImage" value="<?= $product['image']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductQuantity">Quantity</label>
                        <input type="text" class="form-control" id="editProductQuantity" name="editProductQuantity" value="<?= $product['quantity']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductDescription">Description</label>
                        <textarea class="form-control" id="editProductDescription" name="editProductDescription" required><?= $product['description']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
                <!-- End of Edit form -->
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>


    </div>
</div>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Your existing scripts should go here -->
<script>
    $(document).ready(function () {
        // Listen for a click event on the edit button
        $('.btn-edit').on('click', function () {
            // Get the product ID from the data attribute
            var productId = $(this).data('product-id');

            // Open the corresponding edit modal
            $('#editProductModal' + productId).modal('show');
        });
    });
</script>


</body>
</html>
