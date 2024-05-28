<?php
//$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s_gallery";

// Create connection
$conn = new mysqli("localhost", $username, $password, $dbname);

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


if (!empty($name) && !empty($description) && !empty($price) && is_numeric($price) && !empty($quantity) && is_numeric($quantity) && !empty($category)) {
    // Prepare and bind
    $stmt = "INSERT INTO product (name, description, price, quantity, category) VALUES ('$name','$description', '$price', '$quantity', '$category' )";
    $insert = mysqli_query($conn, $stmt) or die ("query failed");

    // Execute statement
    if ($insert) {
        echo "New product created successfully";
    } else {
        echo "Error" ;
    }

    // Close statement
 
} else {
    echo "Invalid input";
}

// Close connection
$conn->close();
?>
