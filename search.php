<?php
session_start();
require 'dbconnect.php';
if(!isset($_SESSION['email']))
{
  header("location:./LoginPage.html");
}
$fetch=$_REQUEST['str'];
// echo"".$fetch;
$query="SELECT * FROM employee where EEID='".$fetch."'";
if($result=mysqli_query($conn,$query))
{
    while($row=mysqli_fetch_row($result))
    {
        echo"<script>alert('hell0')</script>";
    }
}
else
{
    echo"".mysqli_error($conn);
}
?>



































<!-- 

 while($row=mysqli_fetch_row($result))
    {
        echo"EEID :- ".$row[0];     
        echo"\n First Name :- ".$row[1];
        echo"\n Job Title :- ".$row[2];
        echo"\n Department :- ".$row[3];
        echo"\n Business Unit :- ".$row[4];
        echo"\n Gender :- ".$row[5];
        echo"\n Age :- ".$row[6];
        echo"\n Annual Salary :- ".$row[7];
        echo"\n Bonus :- ".$row[8];
        echo"\n Country :- ".$row[9];
    }
     -->