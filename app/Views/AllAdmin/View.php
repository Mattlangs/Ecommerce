<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing the product -->
                <form id="editProductForm" method="post" action="">
                    <div class="form-group">
                        <label for="editProductName">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="editProductName" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductPrice">Product Price</label>
                        <input type="number" class="form-control" id="editProductPrice" name="editProductPrice" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductImage">Product Image</label>
                        <input type="file" class="form-control" id="editProductImage" name="editProductImage">
                    </div>
                    <div class="form-group">
                        <label for="editProductQuantity">Product Quantity</label>
                        <input type="number" class="form-control" id="editProductQuantity" name="editProductQuantity" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductDescription">Product Description</label>
                        <textarea class="form-control" id="editProductDescription" name="editProductDescription" rows="3"></textarea>
                    </div>
                    <!-- Add other fields for editing here -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript to populate the modal fields when "Edit Product" is clicked
$(document).on('click', '.edit-product-button', function() {
    var productId = $(this).data('product-id');
    var productName = $(this).data('product-name');
    var productPrice = $(this).data('product-price');
    var productQuantity = $(this).data('product-quantity'); // Added for quantity
    var productDescription = $(this).data('product-description'); // Added for description
    
    // Set the form action based on the product ID
    var formAction = "<?= site_url('AdminController/editProduct/'); ?>" + productId;
    $("#editProductForm").attr("action", formAction);
    
    // Set the values of the input fields in the modal
    $("#editProductName").val(productName);
    $("#editProductPrice").val(productPrice);
    $("#editProductQuantity").val(productQuantity); // Populate quantity field
    $("#editProductDescription").val(productDescription); // Populate description field
    
    // Show the modal
    $("#editProductModal").modal('show');
});

// JavaScript to handle form submission when "Save Changes" is clicked
$("#saveChangesButton").click(function() {
    $("#editProductForm").submit();
});
</script>
