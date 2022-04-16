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
$leaves_id = $_GET['leaves_id'];
$result = mysqli_query($con, "UPDATE `emp_leaves` SET `status`='Approved' WHERE `id` = '$id' AND `leaves_id` = '$leaves_id';");

header("Location:emp_leaves.php");
}
else{
    header("Location: ../alogin.html");}
?>

