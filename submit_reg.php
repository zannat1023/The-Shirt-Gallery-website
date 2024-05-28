<?php include('connect.php');

    $CustomerName=$_POST['user_username'];
    $CustomerEmail=htmlspecialchars ($_POST['user_email']);
    $CustomerPassword=$_POST['user_userpassword'];
    $hash_password=password_hash($CustomerPassword,PASSWORD_DEFAULT);
    $CustomerAddress=$_POST['user_useraddress'];
    $conf_user_password=$_POST['conf_user_userpassword'];

//select query
$select_query="Select * from customer where CustomerName='$CustomerName' or CustomerEmail='$CustomerEmail";
$result=mysqli_query($conn,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo"<script>alert('Username and Email already exists')</script>";
}
elseif($CustomerPassword!=$conf_user_password){
    echo"<script>alert('Passwords do not match')</script>";
}
else{
 //insert query
$insert_query="insert into customer (CustomerName, CustomerEmail, CustomerPassword, CustomerAddress) 
values($CustomerName,$CustomerEmail,$hash_password,$CustomerAddress)";
$sql_execute=mysqli_query($conn,$insert_query);


    // Execute statement
    if ($insert) {
        echo "New user account created successfully";
    } else {
        echo "Error" ;
    }
// Close connection
$conn->close();

}

?>