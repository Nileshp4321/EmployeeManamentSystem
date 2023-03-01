<?php
session_start();
require 'dbconnect.php';
if(!isset($_SESSION['email']))
{
  header("location:./LoginPage.html");
}
$data=$_REQUEST['data'];
// echo"hello ".$data;
$query="SELECT * FROM employee where CONCAT(`EEID`,`Full Name`,`Job Title`) LIKE '%".$data."'";
echo"<table class='table text-center table-bordered border-primary'>
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
</table>";
if($result=mysqli_query($conn,$query))
{
    while($row=mysqli_fetch_row($result))
    {
      echo"
      <table class='table text-center table-warning '>
                    <tbody >
                      <tr class='row align-items-start tablen'>
                        <td class='col'>".$row[0]."</td>
                        <td class='col'>".$row[1]."</td>
                        <td class='col'>".$row[2]."</td>
                       </tr>
                    </tbody>
                  </table>
      ";
    }
}
else
{
  echo"".mysqli_error($conn);
}
// ?>
<!-- //  // <td class='col'>".$row[3]."</td>
//                         // <td class='col'>".$row[4]."</td>
//                         // <td class='col'>".$row[5]."</td>
//                         // <td class='col'>".$row[6]."</td>
//                         // <td class='col'>".$row[7]."</td>
//                         // <td class='col'>".$row[8]."</td>
//                         // <td class='col'>".$row[9]."</td> -->