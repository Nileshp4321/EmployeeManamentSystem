<?php
session_start();
if(!isset($_SESSION['email']))
{
  header("location:./LoginPage.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>View Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
           .material-symbols-outlined 
           {
                font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 48
          }
         .h1
        {
            text-align: center;
        } 
        .ms-1 {
  margin-left: ($spacer * .100) !important;
}
    </style>
</head>
<body>
<nav class="navbar bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-light">Navbar</a>
          <div class="dropdown me-5">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="material-symbols-outlined">person</span>
            <?php
              require 'dbconnect.php';
                $email=$_SESSION['email'];
                $query="SELECT Name from signup where Email='$email'";
                $result=mysqli_query($conn,$query);
                if($result=mysqli_query($conn,$query))
                {
                  // $row=mysqli_fetch_row($result);
                  while($row=mysqli_fetch_row($result))
                  {
                      echo"".$row[0];
                  }
                }  
                ?>
            </button>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item text-primary " href="#">  
              </a></li>
              <li><a class="dropdown-item hover-danger" href="createUser.php">Create User</a></li>
              <li><a class="dropdown-item hover-danger" href="Allusers.php">View Users</a></li>
              <li><a class="dropdown-item hover-danger" href="viewProfile.php"> Profile</a></li>
              <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>  
      
<?php
require 'dbconnect.php';
      if($_POST['name'])
      {
           $email=$_SESSION['email'];
            $name=$_POST['name'];
            $query="UPDATE signup set name='$name' where email='$email'";
            if($result=mysqli_query($conn,$query))
            {
              echo"<h3 class='text-success text-center'>Your Name is updated</h3>";
            }   
      }
      if($_POST['password'])
      {

           $email=$_SESSION['email'];
            $password=$_POST['password'];
            $password=password_hash($password,PASSWORD_DEFAULT);
            $query="UPDATE signup set password='$password' where email='$email'";
            if($result=mysqli_query($conn,$query))
            {
              echo"<h3 class='text-success text-center'>Your password is updated</h3>";
            }   
      }
      if($_POST['mobile'])
      {
           $email=$_SESSION['email'];
            $mobile=$_POST['mobile'];
            $query="UPDATE signup set mobile='$mobile' where email='$email'";
            if($result=mysqli_query($conn,$query))
            {
                echo"<h3 class='text-success text-center''>Your Mobile Number is updated</h3>";
            }   
      }
      if($_POST['pincode'])
      {
           $email=$_SESSION['email'];
            $pin=$_POST['pincode'];
            $query="UPDATE signup set pin='$pin' where email='$email'";
            if($result=mysqli_query($conn,$query))
            {
                echo"<h3 class='text-success text-center'>Your Pin Code is updated</h3>";
            }   
      }
      if($_POST['address'])
      {
           $email=$_SESSION['email'];
            $address=$_POST['address'];
            $query="UPDATE signup set address='$address' where email='$email'";
            if($result=mysqli_query($conn,$query))
            {
                echo"<h3 class='text-success text-center'>Your Address is updated</h3>";
            }   
      }
      if(is_uploaded_file($_FILES['updatefile']['tmp_name']))
      {
            $email=$_SESSION['email'];
            $file=$_FILES['updatefile'];
            move_uploaded_file($file['tmp_name'],"./photos".$file['name']);
            $query="UPDATE signup set `File Name`='".$file['name']."' where email='$email'";
            if($result=mysqli_query($conn,$query))
            {
                echo"<h3 class='text-success text-center'>Your Profile Photo is updated</h3>";
            }   
      }
    
      ?>

</body>
</html>
