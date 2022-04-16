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

$id = $_GET['id'];

$result = mysqli_query($con, "DELETE FROM employee WHERE id=$id");
$result2 = mysqli_query($con, "DELETE FROM emp_leaves WHERE id=$id");
$result3 = mysqli_query($con, "DELETE FROM project WHERE eid=$id");


header("Location:view_emp.php");
}
else{
    header("Location: ../alogin.html");
}
?>