<?php
session_start(); // Start the session

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s_gallery";

// Check connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = trim($_POST['customerName']);
    $customerPassword = trim($_POST['customerPassword']);

    // Basic validation
    if (empty($customerName) || empty($customerPassword)) {
        die("All fields are required.");
    }

    // Fetch the user from the database
    $stmt = $conn->prepare("SELECT * FROM customer WHERE CustomerName = ?");
    $stmt->bind_param("s", $customerName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($customerPassword, $user['CustomerPassword'])) {
            // Password is correct, start the session
            $_SESSION['customerName'] = $user['CustomerName'];
            $_SESSION['customerEmail'] = $user['CustomerEmail'];
            echo "<script>alert('Login successful.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Incorrect password.'); window.location.href='user_login.php';</script>";
        }
    } else {
        echo "<script>alert('Username not found.'); window.location.href='user_login.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
