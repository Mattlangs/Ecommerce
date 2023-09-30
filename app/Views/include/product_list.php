<!-- include/product_list.php -->
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
