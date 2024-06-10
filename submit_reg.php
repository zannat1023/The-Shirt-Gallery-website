<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s_gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = trim($_POST['customerName']);
    $customerEmail = trim($_POST['customerEmail']);
    $customerPassword = trim($_POST['customerPassword']);
    $confPassword = trim($_POST['confPassword']);
    $customerAddress = trim($_POST['customerAddress']);

    // Basic validation
    if (empty($customerName) || empty($customerEmail) || empty($customerPassword) || empty($confPassword) || empty($customerAddress)) {
        die("All fields are required.");
    }

    if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if ($customerPassword !== $confPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashedPassword = password_hash($customerPassword, PASSWORD_DEFAULT);

    // Check if email or username already exists
    $stmt = $conn->prepare("SELECT * FROM customer WHERE CustomerName = ? OR CustomerEmail = ?");
    $stmt->bind_param("ss", $customerName, $customerEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username or Email already exists')</script>";
    } else {
        // Insert into the database
        $stmt = $conn->prepare("INSERT INTO customer (CustomerName, CustomerEmail, CustomerPassword, CustomerAddress) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $customerName, $customerEmail, $customerPassword, $customerAddress);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful.'); window.location.href='index.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
