<?php 
session_start();
if(!isset($_SESSION["email"])){
    header("Location: ../alogin.html");
}
?>

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
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>
    <div class="nav">
        <h3>TechMe</h3>
        <div class="navli">

            <div class="dash unactive" value="addemp.php">Add Employee</div>
            <div class="dash unactive" value="View_emp.php">View Employee</div>
            <div class="dash active" value="assign_proj.php">Assign Project</div>
            <div class="dash unactive" value="project_staus.php">Project Status</div>
            <!-- <div class="dash" value=""><a class="homeblack" href="salaryemp.php">Salary Table</a></div> -->
            <div class="dash unactive" value="emp_leaves.php">Employee Leave</div>
            <div class="dash unactive" value="log_out.php">Log Out</a></div>
           
        </div>
    </div>   

    <p class="heading">Assign Project</p>
    
   <div class="animation">
   <form method="post" action="assign_proj.php" class="">
        <div class="alerts">
            <div class="alert alert-success" id="success" role="alert">
                Added successfully.
            </div>
            <div class="alert alert-danger" id="danger" role="alert">
                Couldn't add the employee !
            </div>
        </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Employee ID</label>
            <input name="eid" type="text" class="form-control" required>
            
        </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Project name</label>
            <input name="pname" type="text" class="form-control" required>

        </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Project end date</label>
            <input name="end_date" type="date" class="form-control" required>
        </div>
        <button type="submit" name="assign" class="submit-btn btn btn-primary">Assign</button>
    </form>
   </div>
</body>
<script src="script.js"></script>
</html>

<?php
if(isset($_POST["assign"])){
if(isset($_SESSION["email"])){
$servernmae="localhost";
$username="root";
$pass="";
$dbname="ems1";

$con = mysqli_connect($servernmae,$username,$pass,$dbname);

if(!$con){
    die("Can't connect to database...".mysqli_connect_error());
}

$eid = $_POST["eid"];
$pname = $_POST["pname"];
$end_date = $_POST["end_date"];

$succ = false;
$result_check = mysqli_query($con,"select `id` from `employee` ");
while($row=mysqli_fetch_assoc($result_check)){
    if($eid==$row["id"]){
       
        $sql= "INSERT INTO `project` (`eid`, `pname`, `end_date`) VALUES ( '$eid', '$pname', '$end_date')";
        $result = mysqli_query($con,$sql) ;
    
        if($result){
            echo "<script>assignSuc()</script>";
            $succ = true;
        }           
        else{
            echo "Can't update";
        }

    }
} 

if(!$succ){
    echo "<script> inValidId(); </script>";
}

// if($check){
//     $sql= "INSERT INTO `project` (`eid`, `pname`, `end_date`) VALUES ( '$eid', '$pname', '$end_date')";
//     $result = mysqli_query($con,$sql) ;

// if($result){
//     echo "<script>assignSuc()</script>";
// }           
// else{
//     echo "Can't update";
// }
// }

}
else{
    echo "you have been logged out";
}
}
?>

