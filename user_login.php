<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shirt Gallery - Login</title>
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
    <!-- Topbar and Navbar here -->

    <div class="container-fluid m-5">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="login_process.php" method="post">
                    <div class="form-outline mb-4">
                        <label for="customerName" class="form-label">Username</label>
                        <input type="text" id="customerName" class="form-control" placeholder="Enter your username" name="customerName" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="customerPassword" class="form-label">Password</label>
                        <input type="password" id="customerPassword" class="form-control" placeholder="Enter your password" name="customerPassword" required>
                    </div>
                    <div class="mt-4">
                        <input type="submit" value="Login" class="btn btn-primary">
                        <p class="small fw-bold mt-3">Don't have an account? <a href="user_registration.php" class="link-info">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
