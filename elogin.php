<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="elogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/324fe264ef.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<header>
		
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
		  <a class="techme navbar-brand">TechMe</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			  <li class="buttons nav-item">
				<a class="homeblack nav-link " aria-current="page" href="index.html">HOME</a>
			  </li>
			  <li class="buttons nav-item">
				<a class="homeblack nav-link" href="alogin.php">ADMIN LOGIN</a>
			  </li>
			  <li class="buttons nav-item">
				<a class="homered nav-link active" href="elogin.php">EMPLOYEE LOGIN</a>
			  </li>
			</ul>
		  </div>
		</div>
	  </nav>
</header>
<body>
    <p class="animation2">EMPLOYEE</p> 
    <div class="animation" id="form_border">


        <form action="" method="post">
            <div class="input_form">
                <input type="text" name="email" placeholder="Email" required><br>
                <input type="password" name="pwd" placeholder="Password" required><br>
                <div class="incorrect alert alert-danger" role="alert">
                  Incorrect email or password !
                </div>
                <button name='submit' type="submit" class="log-in btn-md btn btn-success">Log In</button><br>
            </div>
        </form>
    </div>
   
</body>
<script src="script.js"></script>
</html>

<?php

if(isset($_POST["submit"])){
$servernmae="localhost";
$username="root";
$pass="";


$con = mysqli_connect($servernmae,$username,$pass);

if(!$con){
    die("Can't connect to database...".mysqli_connect_error());
}

$email = $_POST["email"];
$pwd = $_POST["pwd"];

$sql = "SELECT * FROM `ems1`.`employee` WHERE `email`='$email' and `password`='$pwd' ;";
$result = mysqli_query($con,$sql);
$idresult = mysqli_fetch_assoc($result);


if(mysqli_num_rows($result)==1){
  $id = $idresult["id"];
$_SESSION["id"]=$id;
    header("Location:Employee/my_profile.php");
}
else{
  echo "<script>incorrectPass();</script>";
}
}
?>