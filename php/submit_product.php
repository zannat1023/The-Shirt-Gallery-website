<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s_gallery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];

// Validate and sanitize input
$name = htmlspecialchars($name);
$description = htmlspecialchars($description);
$price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

if (!empty($name) && !empty($description) && !empty($price) && is_numeric($price) && !empty($quantity) && is_numeric($quantity) && !empty($category)) {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, quantity, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssd", $name, $description, $price, $quantity, $category);

    // Execute statement
    if ($stmt->execute()) {
        echo "New product created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid input";
}

// Close connection
$conn->close();
?>
