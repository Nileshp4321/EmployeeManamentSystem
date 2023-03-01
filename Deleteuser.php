<?php
session_start();
require 'dbconnect.php';
if(!isset($_SESSION['email']))
{
  header("location:./LoginPage.html");
}
if($_SERVER['REQUEST_METHOD']=='GET')
{
$duser=$_REQUEST['delete'];
$dname=$_REQUEST['dname'];
// echo"HEllo".$dname;
$query="DELETE from employee where EEID='".$duser."'";
if($result=mysqli_query($conn,$query))
{
        echo"<script>alert('".$dname." is Successfully removed')</script>";
        header("refresh:0.5;./AllUsers.php");
}
}
else
{
  echo"".mysqli_error($conn);
}
?>
