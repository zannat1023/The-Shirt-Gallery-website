<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s_gallery";// Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product_id is set in URL
if (isset($_GET['product_id'])) {
    // Get product ID from URL
    $product_id = $_GET['product_id'];

    // Prepare SQL query
    $sql = "SELECT * FROM products WHERE productID = $product_id";

    // Execute SQL query
    $result = $conn->query($sql);

    if ($result) {
        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<h1>" . $row["name"] . "</h1>";
                echo "<p>Description: " . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "<p>Quantity: " . $row["quantity"] . "</p>";
                // You can display other product details as well
            }
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Product ID is missing.";
}
?>
