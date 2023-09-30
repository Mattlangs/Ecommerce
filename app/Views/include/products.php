<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content here -->
</head>
<body>
    <!-- Display the selected category -->
    <h2>Products in <?= $category ?></h2>

    <!-- Display the products -->
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text">Price: $<?= $product['price'] ?></p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
