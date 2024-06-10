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
$categoryName = $_POST['categoryName'];
$description = $_POST['description'];

// Validate and sanitize input


if (!empty($categoryName) && !empty($description)) {
    // Prepare and bind
    $stmt = "INSERT INTO category (categoryName, description) VALUES ('$categoryName','$description')";
    $insert = mysqli_query($conn, $stmt) or die ("query failed");

    // Execute statement
    if ($insert) {
        echo "New category created successfully";
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
