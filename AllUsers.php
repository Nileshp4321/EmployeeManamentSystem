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
    <script>
        function check(data)
        {
         let req=new XMLHttpRequest();
         req.open("POST","search.php?str="+data,true);
         req.send();
         req.onload=function()
         {
          if (this.readyState == 4 && this.status == 200)
          {
            let t=document.getElementsByClassName("data")[0];
            // for(i=0;i<t.children.length;i++)
            // {
            //  t.children[i].style.visibility="hidden";
            // // alert(t.children[0].innerHTML);
            // }
            // alert(req.responseText);
              t.innerHTML=req.responseText;
          }
        } 
      }
        function fetch(data)
        {
          let req=new XMLHttpRequest();
          req.open("POST","filterdata.php?data="+data,true);
          req.send();
          req.onload=function()
          {
            if(this.readyState == 4 && this.status == 200)
            {
               
            }
          }
        }              
  </script>
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
          <div class="dropdown me-5  ">
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
<body>
   <form class="d-flex container mb-3 mt-3 w-25" role="search" method="POST" action="AllUsers.php">
   <input class="form-control col-5 border border-success" type="search" placeholder="Search" aria-label="Search" name="Search">
   <button class="btn btn-outline-success ms-2" type="submit">Search</button>
                

 </form>
 <?php 
   if(isset($_POST['Search']))
      {
     // $row=mysqli_fetch_row($result);
                $email=$_SESSION['email'];
                $data=$_POST['Search'];
                $query="SELECT * FROM employee where CONCAT(`EEID`,`Full Name`,`Job Title`,`Department`,`Business Unit`,`Gender`,`Age`,`Annual Salary`,`Bonus`,`Country`) LIKE '%".$data."%'";
                  echo"
                <table class='table text-center table-bordered border-primary'>
                      <tr class='row align-items-start'>
                      <th class='col table-primary'>EEID</th>
                      <th class='col table-primary'>Full Name</th>
                      <th class='col table-primary'>Job Title</th>
                      <th class='col table-primary'>Department</th>
                      <th class='col table-primary'>Business Unit</th>
                      <th class='col table-primary'>Gender</th>
                      <th class='col table-primary'>Ethnicity</th>
                      <th class='col table-primary'>Age</th>
                      <th class='col table-primary'>Hire Date</th>
                      <th class='col table-primary'>Annual Salary</th>
                      <th class='col table-primary'>Bonus(%)</th>
                      <th class='col table-primary'>Country</th>
                      <th class='col table-primary'>City</th>
                      <th class='col table-primary'>Exit Date</th>
                      <th class='col table-primary'>Action</th>
                      <th class='col table-primary'>Action</th>
                      </tr>
                    </table>";

              if($result=mysqli_query($conn,$query))
                {

                   while($row=mysqli_fetch_row($result))
                    {
                      echo"
                      <table class='table text-center table-bordered table-warning '>
                     <tbody>
                     <tr class='row align-items-start'>
                        <td class='col'>".$row[0]."</td>
                        <td class='col'>".$row[1]."</td>
                        <td class='col'>".$row[2]."</td>
                        <td class='col'>".$row[3]."</td>
                        <td class='col'>".$row[4]."</td>
                        <td class='col'>".$row[5]."</td>
                        <td class='col'>".$row[6]."</td>
                        <td class='col'>".$row[7]."</td>
                        <td class='col'>".$row[8]."</td>
                        <td class='col'>".$row[9]."</td>
                        <td class='col'>".$row[10]."</td>
                        <td class='col'>".$row[11]."</td>
                        <td class='col'>".$row[12]."</td>
                        <td class='col'>".$row[13]."</td>
                      
                        <td class='col'>
                        <div class='btn-group' >
                        <a href='updateuser.php?duser =".$row[0]."&dname=".$row[1]."'  class='me-2 btn btn-danger bg-delete '>Update</a>
                        <a href='deleteuser.php?delete=".$row[0]."&dname=".$row[1]."'  class='me-2 btn btn-danger bg-dark'>Delete</a>
                        </div>
                        </td>
                        </tr>
                   </tbody>
                 </table> ";                  
                    }                                 
                }
      }     

   ?>
</body>
</html>






















<!--  <td class='col btn btn-danger bg-danger'>Remove</td> line no 139


 Line no 120 <table class='table text-center table-bordered border-primary'>
                  <thead>
                    <tr class='row align-items-start'>
                      <th class='col table-primary'>EEID</th>
                      <th class='col table-primary'>Full Name</th>
                      <th class='col table-primary'>Job Title</th>
                      <th class='col table-primary'>Department</th>
                      <th class='col table-primary'>Business Unit</th>
                      <th class='col table-primary'>Gender</th>
                      <th class='col table-primary'>Age</th>
                      <th class='col table-primary'>Annual Salary</th>
                      <th class='col table-primary'>Bonus %</th>
                      <th class='col table-primary'>Country</th>
                      <th class='col table-primary'>Remove User</th>
                    </tr>
                  </thead></table>
                  <div class='data'></div>
                  ";
                  while($row=mysqli_fetch_row($result))
                  {
                    echo"<table class='table text-center table-warning '>
                    <tbody >
                      <tr class='row align-items-start tablen'>
                        <td class='col'>".$row[0]."</td>
                        <td class='col'>".$row[1]."</td>
                        <td class='col'>".$row[2]."</td>
                        <td class='col'>".$row[3]."</td>
                        <td class='col'>".$row[4]."</td>
                        <td class='col'>".$row[5]."</td>
                        <td class='col'>".$row[6]."</td>
                        <td class='col'>".$row[7]."</td>
                        <td class='col'>".$row[8]."</td>
                        <td class='col'>".$row[9]."</td>
                        
                      </tr>
                    </tbody>
                  </table>";
                  }
-->