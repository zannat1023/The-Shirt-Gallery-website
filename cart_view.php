<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: user_login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$username = "root";
$password = "";
$dbname = "s_gallery";

// Create connection
$conn = new mysqli('localhost', $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$product_id = mysqli_real_escape_string($conn, $_GET['product_id']);

// Add product to cart for the user
$add_to_cart_sql = "INSERT INTO cart (CustomerID, productID, quantity) VALUES ('$user_id', '$product_id', 1)";
$conn->query($add_to_cart_sql);

// Redirect to cart page
header('Location: cart_view.php');
exit();
?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Additional head content here -->
</head>
<body>
    <!-- Navbar and other sections here -->

    <!-- Cart View Start -->
    <div class="container-fluid py-5">
        <h2 class="mb-4">Your Shopping Cart</h2>
        <div class="row">
            <?php
            // Fetch cart items
            $cart_sql = "SELECT productID, name, price, image FROM cart INNER JOIN product ON cart.cartItems = product.productID WHERE cart.user = '$customerID'";
            $cart_result = $conn->query($cart_sql);

            if ($cart_result->num_rows > 0) {
                while ($item = $cart_result->fetch_assoc()) {
                    echo "<div class='col-lg-4 col-md-6 mb-4'>";
                    echo "<div class='card'>";
                    echo "<img src='" . htmlspecialchars($item['image']) . "' class='card-img-top' alt='" . htmlspecialchars($item['name']) . "'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . htmlspecialchars($item['name']) . "</h5>";
                    echo "<p class='card-text'>BDT. " . number_format($item['price'], 2) . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>
    <!-- Cart View End -->

    <!-- Footer and other sections here -->

    <!-- JavaScript Libraries and other scripts here -->
</body>
</html>
