<!-- category.php -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
// Include the CategoryModel
require_once APPPATH . 'Models/CategoryModel.php';

// Create an instance of the CategoryModel
$categoryModel = new \App\Models\CategoryModel();

// Fetch categories from the database
$categories = $categoryModel->findAll();

echo '<ul class="nav navbar-nav nav_1">';
foreach ($categories as $category) {
    echo '<li><a href="#" class="category-link" data-category-id="' . $category['id'] . '">' . $category['name'] . '</a></li>';
}
echo '</ul>';
?>

<script>
$(document).ready(function () {
    // Add a click event handler for category links
    $('.category-link').click(function (e) {
        e.preventDefault(); // Prevent the default link behavior

        // Get the category ID from the data attribute
        var categoryId = $(this).data('category-id');

        // Send an AJAX request to load products for the selected category
        $.ajax({
            type: 'GET',
            url: '<?= base_url('home/getProductsByCategory') ?>/' + categoryId, // Use the correct route
            success: function (data) {
                // Update the content area with the loaded products
                $('#content').html(data);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>
