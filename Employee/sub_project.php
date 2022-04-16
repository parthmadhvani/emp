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

$pid = $_GET["pid"];
$date = date("Y-m-d");
$sql =  "UPDATE `project` SET `sub_date` = '$date', `status` = 'Submitted' WHERE `pid`=$pid;" ;
$result = mysqli_query($con,$sql);

header ("Location: project.php");
}
else{
    echo "you have been logged out";
}
?>

