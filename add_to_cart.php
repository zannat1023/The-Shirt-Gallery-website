<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['product_id'])) {
    $username = "root";
    $password = "";
    $dbname = "s_gallery";
    $conn = new mysqli('localhost', $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);
    
    // Assuming the user is logged in and customer_id is stored in the session
    if (isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];

        // Insert product into the cart
        $cart_sql = "INSERT INTO cart (user, cartItems) VALUES ('$customer_id', '$product_id')";

        if ($conn->query($cart_sql) === TRUE) {
            $return_url = isset($_GET['return_url']) ? $_GET['return_url'] : 'cart_view.php';
            header("Location: $return_url");
            exit;
        } else {
            echo "Error: " . $cart_sql . "<br>" . $conn->error;
        }
    } else {
        // Redirect to login if not logged in
        $return_url = "user_login.php?return_url=" . urlencode($_SERVER['REQUEST_URI']);
        header("Location: $return_url");
        exit;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
