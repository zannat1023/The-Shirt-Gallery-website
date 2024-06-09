<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Register</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="submit_reg.php" method="post">
                    <div class="form-group">
                        <label for="customerName">Name</label>
                        <input type="text" class="form-control" id="customerName" name="customerName" required>
                    </div>
                    <div class="form-group">
                        <label for="customerEmail">Email</label>
                        <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="customerPassword">Password</label>
                        <input type="password" class="form-control" id="customerPassword" name="customerPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confPassword" name="confPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="customerAddress">Address</label>
                        <input type="text" class="form-control" id="customerAddress" name="customerAddress" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
