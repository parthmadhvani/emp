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

$sql="SELECT * FROM `employee`";
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
    <script href="script.js"></script>
</head>
<body>
    <div class="nav">
        <h3>TechMe</h3>
        <div class="navli">

            <div class="dash unactive" value="addemp.php    ">Add Employee</div>
            <div class="dash active" value="View_emp.php">View Employee</div>
            <div class="dash unactive" value="assign_proj.php">Assign Project</div>
            <div class="dash unactive" value="project_staus.php">Project Status</div>
            <!-- <div class="dash" value=""><a class="homeblack" href="salaryemp.php">Salary Table</a></div> -->
            <div class="dash unactive" value="emp_leaves.php">Employee Leave</div>
            <div class="dash unactive" value="log_out.php">Log Out</a></div>
        </div>
    </div>
    
<p class="heading">View Employee</p>

<div class="animation">
    <div class="view_emp_table alerts">
            <div class="alert alert-success" id="success" role="alert">
                Added successfully.
            </div>
            <div class="alert alert-danger" id="danger" role="alert">
                Couldn't add the employee !
            </div>
    </div>
    <table class="view_emp_table table" >
        <thead>
            <tr>
                <th scope="col">Emp ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Salary</th>
                <th scope="col">Birthday</th>
                <th scope="col">Gender</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Department</th>
                <th scope="col">Degree</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<th scope='row'>".$row["id"]."</th>";
                        echo "<td>".$row["fname"]." ".$row["lname"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["salary"]."</td>";
                        echo "<td>".$row["bdate"]."</td>";
                        echo "<td>".$row["gender"]."</td>";
                        echo "<td>".$row["cnumber"]."</td>";
                        echo "<td>".$row["address"]."</td>";
                        echo "<td>".$row["department"]."</td>";
                        echo "<td>".$row["degree"]."</td>";
                        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> <br><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>
<script src="script.js"></script>
</body>
</html>

