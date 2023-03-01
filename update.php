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
    <title>Update Profile</title>
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
      <div class="container mt-5 bg-dark text-light ps-5 pe-5 pb-3 border border-success p-2 mb-2 border-opacity-75 rounded">
      <h1 class="h1 text-danger">Update Profile</h1>
            <form class="row g-3 container mx-auto" method="post" action="checkUpdate.php" enctype="multipart/form-data">
            <div class="col-md-6 ">
            <label for="inputAddress" class="form-label"> Profile Photo</label>
            <input type="file" class="form-control" id="inputAddress" name="updatefile" >
          </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php 
            ?>" >
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php  $email=$_SESSION['email'];
                $query="SELECT email from signup where Email='$email'";
                $result=mysqli_query($conn,$query);
                if($result=mysqli_query($conn,$query))
                {
                  // $row=mysqli_fetch_row($result);
                  while($row=mysqli_fetch_row($result))
                  {
                      echo"".$row[0];
                  }
                }   ?>" required disabled >
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="password form-control" id="inputPassword4" name="password">
          </div>
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Mobile</label>
            <input type="tel" class="form-control" id="inputEmail4" name="mobile"   maxlength="10">
          </div>
          <div class="col-md-6">
            <label for="inputZip" class="form-label">Pin Code</label>
            <input type="text" class="form-control" id="inputZip" name="pincode"  maxlength="6">
          </div>
          <div class="col-6">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress"  name="address" >
          </div>
        <div class="col-12">
          <button type="submit" class="btn btn-danger">Update Profile</button>
        </div>
      </form>   
              </div>  
</body>
</html>