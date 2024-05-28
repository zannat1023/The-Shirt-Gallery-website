<?php  include('../includes/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
     <!--bootstrap CSS link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid m-5">
        <h2 class="text-center">New User Registration</h2>
        <div class="row  d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
    <form action="" method="post"></form>
    <!--username field-->
        <div class="form-outline mb-5">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control"
             placeholder="Enter your name" autocomplete="off" required="required" name="user_username"/>
        </div>
        <!--email field-->
        <div class="form-outline mb-5">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" id="user_useremail" class="form-control"
             placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
        </div>
        <!--password field-->
        <div class="form-outline mb-5">
            <label for="user_userpassword" class="form-label">Password</label>
            <input type="password" id="user_userpassword" class="form-control"
             placeholder="Enter your password" autocomplete="off" required="required" name="user_userpassword"/>
        </div>
        <!-- confrim password field-->
        <div class="form-outline mb-5">
            <label for="conf_user_userpassword" class="form-label">Confirm Password</label>
            <input type="password" id="conf_user_userpassword" class="form-control"
             placeholder="Enter your password" autocomplete="off" required="required" name="conf_user_userpassword"/>
        </div>
        <!--address field-->
        <div class="form-outline mb-5">
            <label for="user_useraddress" class="form-label">Address</label>
            <input type="text" id="user_useraddress" class="form-control"
             placeholder="Enter your address" autocomplete="off" required="required" name="user_useraddress"/>
        </div>
        <!--contact field-->
        <div class="form-outline mb-5">
            <label for="user_usercontact" class="form-label">Contact</label>
            <input type="text" id="user_usercontact" class="form-control"
             placeholder="Enter your number" autocomplete="off" required="required" name="user_usercontact"/>
        </div>
        <div class="mt-5 pt-3">
            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
            <p class="small fw-bold mt-3 pt-1 mb=0" >Already have an account?  <a href="user_login.php"> Login</a> </p>
            
        </div>
       
            </div>
        </div>
    </div>
</body>
</html>

<!--php code-->

<?php
if(isset($_POST[user_register])){
    $user_username=$_POST['user_username'];
    $user_user_email=$_POST['user_useremail'];
    $user_user_password=$_POST['user_userpassword'];
    $hash_password=password_hash($user_user_password,PASSWORD_DEFAULT);
    $user_user_address=$_POST['user_useraddress'];
    $user_user_contact=$_POST['user_usercontact'];
    $user_user_IP=getIPaddress();
}
//select query
$select_query="Select * from 'user_table' where username='$user_username' or user_email='$user_email";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('Username and Email already exists')</script>";
}
elseif($user_user_password!=$conf_user_password){
    echo"<script>alert('Passwords do not match')</script>";
}
else{
 //insert query
$insert_query="insert into'customer' (customer_name,customer_email,customer_password,customer_IP,customer_address,customer_mobile) 
values($username,$user_email,$hash_password,$user_address,$user_contact,$user_ip)";
$sql_execute=mysqli_query($con,$insert_query);

}

?>