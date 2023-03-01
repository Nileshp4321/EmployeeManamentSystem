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
    <title>Sign In Page</title>
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
        <h1 class="h1 text-danger">Create User</h1>
    <form class="row g-3" method="post" action="saveUser.php">
      <div class="col-3 md-6">
            <label for="inputEmail4" class="form-label">EEID</label>
            <input type="text" class="form-control" id="inputEmail4" name="eeid" placeholder="E00013" required maxlength="6">    
        </div>
          <div class="col-3">
            <label for="inputEmail4" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="fname" placeholder="Elena Vang" required>
          </div>
          <div class="col-3">
            <label for="inputPassword4" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="jt" placeholder="Analyst" name="jt"required>
          </div>
          <div class="col-3">
            <label for="inputPassword4" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" placeholder="Finance" name="d" onblur="checkPassword()" required>
          </div>
          <div class="col-3">
            <label for="inputEmail4" class="form-label">Business Unit</label>
            <input type="text" class="form-control" id="bs" name="bs" placeholder="Corporate" required  >
          </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Gender</label>
            <input type="text" class="form-control" id="g" name="gender" placeholder="Male" required >
          </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Ethnicit</label>
            <input type="text" class="form-control" id="g" name="e" placeholder="Male"  >
          </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Age</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="25" required >
          </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Hire Date</label>
            <input type="date" class="form-control" id="age" name="hd" placeholder="25" required >
          </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Anuual Salary</label>
            <input type="text" class="form-control" id="as" name="as" placeholder="55859" required maxlength="8" >
          </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Bonus %</label>
            <input type="text" class="form-control" id="inputZip" name="bonus" placeholder="Don't use % Symbol" required maxlength="4">
          </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="India" required >
        </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">City</label>
            <input type="text" class="form-control" id="country" name="city" placeholder="India" required >
        </div>
          <div class="col-3">
            <label for="inputZip" class="form-label">Exit Date</label>
            <input type="date" class="form-control" id="country" name="ed" placeholder="India"  >
        </div>
        <div class="col-12 ">
          <button type="submit" class=" btn text-center btn-danger w-50 ">Create User</button>
        </div>  
       
      </form>
    </div>
    
</body>
</html>
