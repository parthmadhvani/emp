<?php

session_start();
if(isset($_SESSION["id"])){
$servernmae="localhost";
$username="root";
$pass="";
$dbname="ems1";

$con = mysqli_connect($servernmae,$username,$pass,$dbname);

if(!$con){
    die("Can't connect to database...".mysqli_connect_error());
}

$id  = $_SESSION["id"];
// $id = 22;
$sql_check = "SELECT * FROM `project` WHERE `eid`='$id' ";
$result_check = mysqli_query($con,$sql_check) or die("Can't check for the results...");

if(mysqli_num_rows($result_check)==0){
    header("Location: no_project.html");
    // echo '<div class="no_project" style="margin-left: 200px;"><h3 style="width:290px">No projects assigned</h3></div>';
}
}
else{
    echo "you have been logged out";
}
?>

<style>
    <?php include "main.css";?>
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
    <link rel="stylesheet" href="main.css"<?php echo time(); ?>/>

</head>

<body>
    <div class="nav">
        <h3>TechMe</h3>
        <div class="navli">
            <div class="dash unactive" value="my_profile.php">My profile</div>
            <div class="dash active" value="project.php">My projects</div>
            <div class="dash unactive" value="Apply_leaves.php">Leaves</div>
            <div class="dash unactive" value="log_out.php">Log Out</div>
        </div>
    </div>

 <div class="animation">
 <p class="heading">My projects</p>  
  <table class="my_projects table">
  <thead>
      
    <tr>
      <th scope="col">Project ID</th>
      <th scope="col">Project name</th>
      <th scope="col">Due Date</th>
      <th scope="col">Submission date</th>
      <th scope="col">Status</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($result_check){
        while($row=mysqli_fetch_assoc($result_check)){
            if($row["status"]=="Submitted") $color = 'green';
            if($row["status"]=="Assigned") $color = 'goldenrod';
            
            echo "<tr>";
            echo "<th scope='row'>".$row["pid"]."</th>";
            echo "<td>".$row["pname"]."</td>";
            echo "<td>".$row["end_date"]."</td>";
            echo "<td>".$row["sub_date"]."</td>";
            echo "<td style='color:$color;'>".$row["status"]."</td>";
            echo "<td>"."<a href='sub_project.php?pid=$row[pid]'>Submit</a>"."</td>";
            // $_SESSION["pid"]=$row["pid"];
        }
    }
    
    ?>
  </tbody>
</table>
 </div>
<script src="script.js"></script>
</body>
</html>
<!-- 
Line 21 not working while refreshings no_proj.html
-->