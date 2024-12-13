<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $productName = htmlspecialchars(trim($_POST['productName']));
    $productCategory = htmlspecialchars(trim($_POST['productCategory']));
    $productPrice = htmlspecialchars(trim($_POST['productPrice']));
    $productQuantity = htmlspecialchars(trim($_POST['productQuantity']));

    // Basic validation
    if (!empty($productName) && !empty($productCategory) && is_numeric($productPrice) && is_numeric($productQuantity)) {
        // Prepare the response
        $response = "<h2>Registered Product Details:</h2>";
        $response .= "<p><strong>Product Name:</strong> " . $productName . "</p>";
        $response .= "<p><strong>Category:</strong> " . $productCategory . "</p>";
        $response .= "<p><strong>Price:</strong> $" . number_format((float)$productPrice, 2, '.', '') . "</p>";
        $response .= "<p><strong>Quantity:</strong> " . $productQuantity . "</p>";

        // Return the response
        echo $response;
    } else {
        // Return an error message if validation fails
        echo "<p style='color: red;'>Error: Please fill in all fields correctly.</p>";
    }
} else {
    // If the request method is not POST, return an error message
    echo "<p style='color: red;'>Error: Invalid request method.</p>";
}
?>