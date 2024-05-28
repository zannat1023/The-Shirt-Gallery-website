<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
     <!--bootstrap CSS link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid m-5">
        <h2 class="text-center">User Login</h2>
        <div class="row  d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
    <form action="" method="post"></form>
    <!--username field-->
        <div class="form-outline mb-5">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control"
             placeholder="Enter your name" autocomplete="off" required="required" name="user_username"/>
        </div>
       
        <div class="mt-5 pt-3">
            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
            <p class="small fw-bold mt-3 pt-1 mb=0" >Don't have an account?  <a href="user_registration.php"> Register</a> </p>
            
        </div>
       
            </div>
        </div>
    </div>
</body>
</html>