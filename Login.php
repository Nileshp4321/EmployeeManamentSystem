<?php
session_start();
require 'dbconnect.php';

$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT password from signup where Email='$email' ";
// $result=mysqli_query($conn,$query);
// $row=mysqli_num_rows($result);
if($result=mysqli_query($conn,$query))
{
    while($data=mysqli_fetch_row($result))
    {   $hpass=$data[0];
        if(password_verify($password,$hpass))
        {
           $_SESSION['email']=$email;
           header("refresh:0.5;./homepage.php");
        }
        else
        {
            header("refresh:0.5;./LoginPage.html");
        }
        // else
        // {
        //     echo"Password does't match";
        // }
    }
}
else
{
    echo"<script>alert('This Account is not exist Please create an account');</script>";
    header("refresh:0.1;./LoginPage.html");
}
?>