$(document).ready(function() {
    $('#productForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        var productName = $('#productName').val();
        var productCategory = $('#productCategory').val();
        var productPrice = $('#productPrice').val();
        var productQuantity = $('#productQuantity').val();

        // Validate form data (basic validation)
        if (productName && productCategory && productPrice && productQuantity) {
            // Send data to PHP script
            $.ajax({
                type:'POST',
                url:'submit.php',
                data: {
                    productName: productName,
                    productCategory: productCategory,
                    productPrice: productPrice,
                    productQuantity: productQuantity
                },
                success: function(response) {
                    // Display success message and data
                    $('#successMessage').text('Product registered successfully!').removeClass('hidden');
                    $('#displayData').html(response).removeClass('hidden');
                    $('#productForm')[0].reset(); // Reset the form
                }
            });
        } else {
            alert('Please fill in all fields.');
        }
    });
});