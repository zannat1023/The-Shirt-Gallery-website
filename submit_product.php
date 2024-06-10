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
$categoryID = $_POST['categoryID'];
$image = $_FILES['image'];


$target_dir = "images/";
$target_file = $target_dir . basename($image["name"]);
$image_url = "";

if (move_uploaded_file($image["tmp_name"], $target_file)) {
    $image_url = $target_file;
} else {
    die("Sorry, there was an error uploading your file.");
}


if (!empty($name) && !empty($description) && !empty($price) && is_numeric($price) && !empty($quantity) && is_numeric($quantity)  && !empty($categoryID) && is_numeric($categoryID)  && !empty($image_url)   ) {
    // Prepare and bind
    $stmt = "INSERT INTO product (name, description, price, quantity, category, image) VALUES ('$name','$description', '$price', '$quantity', '$categoryID', '$image_url' )";
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
