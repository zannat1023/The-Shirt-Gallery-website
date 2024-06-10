<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ShirtGellary</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">

        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="#" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">YOUR BRAND</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">GALLERY</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="#">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button"><a href="user_login.php">Sign in</a></button>
                    <button class="dropdown-item" type="button"><a href="user_registration.php">Sign up</a></button>           </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <!-- Navbar Content -->
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Shop Product Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Single Product Content -->
            <div class="col-lg-9 col-md-8">
                <?php
                // Check if product_id is set and not empty
                if(isset($_GET['product_id']) && !empty($_GET['product_id'])) {
                    $username = "root";
                    $password = "";
                    $dbname = "s_gallery";

                    // Create connection
                    $conn = new mysqli('localhost', $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Sanitize input to prevent SQL injection
                    $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);

                    // Construct the SQL query
                    $product_sql = "SELECT * FROM product WHERE productID = '$product_id'";

                    // Execute the query
                    $product_result = $conn->query($product_sql);

                    if ($product_result->num_rows > 0) {
                        // Output data of each row
                        while($product = $product_result->fetch_assoc()) {
                            echo "<h2>" . htmlspecialchars($product['name']) . "</h2>";
                            echo "<p>Description: " . htmlspecialchars($product['description']) . "</p>";
                            echo "<p>Price: BDT " . number_format($product['price'], 2) . "</p>";
                            echo "<p>Quantity: " . $product['quantity'] . "</p>";
                            echo "<img src='" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "'>";
                            // Additional product details can be displayed here
                        }
                    } else {
                        echo "Product not found.";
                    }

                    // Close connection
                    $conn->close();
                } else {
                    // Handle the case when product_id is missing
                    echo "Product ID is missing.";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Shop Product End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <!-- Footer Content -->
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
