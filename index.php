<?php
$username = "root";
$password = "";
$dbname = "s_gallery";

// Create connection
$conn = new mysqli('localhost', $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// For simplicity, we're using a fixed user ID. In a real application, you would get this from the logged-in user's session.
$user = 'user1';
$action = $_GET['action'];
$product_id = $_GET['product_id'];

if ($action == 'add' || $action == 'buynow') {
    // Add the item to the cart
    $cart_id = uniqid();
    $cart_sql = "INSERT INTO cart (cartID, user, cartItems) VALUES ('$cart_id', '$user', '$product_id')";

    if ($conn->query($cart_sql) === TRUE) {
        if ($action == 'buynow') {
            // Redirect to the cart page if "Buy Now" is clicked
            header('Location: cart_view.php');
            exit();
        } else {
            // Redirect to the cart page
            header('Location: cart_view.php');
            exit();
        }
    } else {
        echo "Error: " . $cart_sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>