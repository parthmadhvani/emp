<?php
session_start();
if(isset($_SESSION["email"])){
$servernmae="localhost";
$username="root";
$pass="";
$dbname="ems1";

$con = mysqli_connect($servernmae,$username,$pass,$dbname);

if(!$con){
    die("Can't connect to database...".mysqli_connect_error());
}

$sql="SELECT * FROM `project`";
$result=mysqli_query($con,$sql) or die("Can't execute the query");
}
else{
    header("Location: ../alogin.html");}
?>
<style>
    <?php include "main.css"; ?>
</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="nav">
        <h3>TechMe</h3>
        <div class="navli">
            <!-- <div class="dash"><a class="homeblack" href="aloginwel.php">HOME</a></div>
            <div class="dash"><a class="homeactive" href="addemp.php">Add Employee</a></div>
            <div class="dash"><a class="homeblack" href="viewemp.php">View Employee</a></div>
            <div class="dash"><a class="homeblack" href="assign.php">Assign Project</a></div>
            <div class="dash"><a class="homeblack" href="assignproject.php">Project Status</a></div>
            <div class="dash"><a class="homeblack" href="salaryemp.php">Salary Table</a></div>
            <div class="dash"><a class="homeblack" href="empleave.php">Employee Leave</a></div>
            <div class="dash"><a class="homeblack" href="alogin.html">Log Out</a></div> -->

            <div class="dash unactive" value="addemp.php">Add Employee</div>
            <div class="dash unactive" value="View_emp.php">View Employee</div>
            <div class="dash unactive" value="assign_proj.php">Assign Project</div>
            <div class="dash active" value="project_staus.php">Project Status</div>
            <!-- <div class="dash" value=""><a class="homeblack" href="salaryemp.php">Salary Table</a></div> -->
            <div class="dash unactive" value="emp_leaves.php">Employee Leave</div>
            <div class="dash unactive" value="log_out.php">Log Out</a></div>
        </div>
    </div>
 
    <p class="heading">Project Status</p>

  <div class="animation">
  <table class="view_emp_table table" >
  <thead>
    <tr>
      <th scope="col">Project ID</th>
      <th scope="col">Emp ID</th>
      <th scope="col">Project name</th>
      <th scope="col">Due date</th>
      <th scope="col">Submission date</th>
      <th scope="col">Status</th>
    
    </tr>
  </thead>
  <tbody>
    <?php
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            if($row["status"]=="Submitted") $color = 'green';
            if($row["status"]=="Assigned") $color = 'goldenrod';

            echo "<tr>";
            echo "<th scope='row'>".$row["pid"]."</th>";
            echo "<td>".$row["eid"]."</td>";
            echo "<td>".$row["pname"]."</td>";
            echo "<td>".$row["end_date"]."</td>";
            echo "<td>".$row["sub_date"]."</td>";
            echo "<td style='color:$color;'>".$row["status"]."</td>";
           
        }
    }
    
    ?>
  </tbody>
</table>
  </div>
<script>
    <?php include "script.js"; ?>
</script>

</body>

</html>

