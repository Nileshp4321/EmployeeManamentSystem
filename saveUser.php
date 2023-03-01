<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<?php 
session_start();
require 'dbconnect.php';
if(!isset($_SESSION['email']))
{
  header("location:./LoginPage.html");
}
$email=$_SESSION['email'];
$eeid=$_POST['eeid'];
$fname=$_POST['fname'];
$jt=$_POST['jt'];
$d=$_POST['d'];
$bu=$_POST['bs'];
$gender=$_POST['gender'];
$bonus=$_POST['bonus']."%";
$e=$_POST['e'];
$age=$_POST['age'];
$hd=$_POST['hd'];
$as="$".$_POST['as'];
$country=$_POST['country'];
$city=$_POST['city'];
$ed=$_POST['ed'];
// echo"".$eeid;
// echo"".$fname;
// echo"".$jt;
// echo"".$d;
// echo"".$bu;
// echo"".$gender;
// echo"".$age;
// echo"".$as;
// echo"".$bonus;
// echo"".$country;
$query="INSERT into employee(EEID,`Full Name`,`Job Title`,Department,`Business Unit`,Gender,Ethnicit,Age,`Hire Date`,`Annual Salary`,Bonus,Country,City,`Exit Date`)
VALUES('$eeid','$fname','$jt','$d','$bu','$gender','$e','$age','$hd','$as','$bonus','$country','$city','$ed');";

if($result=mysqli_query($conn,$query))
{
    echo"<div class='alert alert-success' role='alert'>
    ".$fname." is Inserted Successfully
  </div>";
    header("refresh:1;./AllUsers.php");
}
else
{
    echo"<script>alert('".$fname." User is already exists')</script>";
    header("refresh:1;./createuser.php");
}

?>