
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php

require_once APPPATH . 'Models/CategoryModel.php';

$categoryModel = new \App\Models\CategoryModel();


$categories = $categoryModel->findAll();

echo '<ul class="nav navbar-nav nav_1">';
foreach ($categories as $category) {
    echo '<li><a href="#" class="category-link" data-category-id="' . $category['id'] . '">' . $category['name'] . '</a></li>';
}
echo '</ul>';
?>

<script>
$(document).ready(function () {
    
    $('.category-link').click(function (e) {
        e.preventDefault(); 

      
        var categoryId = $(this).data('category-id');

       
        $.ajax({
            type: 'GET',
            url: '<?= base_url('Homes/getProductsByCategory') ?>/' + categoryId, 
            success: function (data) {
                // Update the content area with the loaded products   $('#content').html(data);
                $('#content').html(data);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>
