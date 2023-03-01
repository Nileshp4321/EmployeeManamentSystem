<?php
require 'dbconnect.php';

$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
$rpass=$_POST['rpassword'];
$mobile=$_POST['mobile'];
$pincode=$_POST['pincode'];
$address=$_POST['address'];
$file=$_FILES['myfile'];
$fname=$file['name'];
if($pass==$rpass)
{
    $pass=password_hash($pass,PASSWORD_DEFAULT);
$query="INSERT into signup(Name,Email,Password,Mobile,Pincode,Address,`File Name`) VALUES ('$name','$email','$pass','$mobile','$pincode','$address','$fname')";
if(mysqli_query($conn,$query))
{
    echo"<script>alert('Your Account is created succesfully');</script>";
    move_uploaded_file($file["tmp_name"],"./photos".$file['name']);
    header("refresh:0.5;./LoginPage.html");
}
else
{
    echo"<h2 style='color:red;text-align:center;'>This Email is already exists Please use different One</h2>";
}
}
else
{
    echo "<script>alert('Both Password are not same');
        </script>";
       
}
?>