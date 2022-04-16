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

$id = $_SESSION["id"];
// $id = "22";
$sql = "SELECT * from `employee` WHERE id=$id";
$result = mysqli_query($con,$sql) or die("Can't execute the query");
if($result){

    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row["email"];
        $password = $row["password"];
        $fname = $row["fname"];
        $lname = $row["lname"];
        $bdate = $row["bdate"];
        $gender = $row["gender"];
        $cnumber = $row["cnumber"];
        $address = $row["address"];
        $depatment = $row["department"];
        $degree = $row["degree"];
        $salary = $row["salary"];
    }
}
}
else{
    echo "you have been logged out";
}
?>
<style>
  <?php include "main.css" ?>
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
        <link rel="stylesheet" href="main.css"<?php echo time(); ?>/>
    <title>Document</title>
</head>

<body>
    <div class="nav">
        <h3>TechMe</h3>
        <div class="navli">
            <div class="dash active" value="my_profile.php">My profile</div>
            <div class="dash unactive" value="project.php">My projects</div>
            <div class="dash unactive" value="Apply_leaves.php">Leaves</div>
            <div class="dash unactive" value="log_out.php">Log Out</div>
        </div>
    </div>
   
    <div class="animation">
    <p class="heading">My profile</p>
    <form method="post" action="update.php" class="">
    <div class="mb-3">
            <label for="validationCustom01" class="form-label">Your ID</label>
            <input name="id" type="text" class="form-control" id="validationCustom01" value="<?php echo $id  ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">First name</label>
            <input name="fname" type="text" class="form-control" id="validationCustom01" value="<?php echo $fname  ?>" readonly>
            <!-- <div class="valid-feedback">
                Looks good!
            </div> -->
        </div>
        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input name="lname" type="text" class="form-control" id="validationCustom02" value="<?php echo $lname  ?>" readonly>
            <!-- <div class="valid-feedback">
                Looks good!
            </div> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6 bdate">
                    <label for="validationCustom02" class="form-label">Birthdate</label>
                    <input name="bdate" type="date" class="form-control" id="" value="<?php echo $bdate  ?>" readonly>
                </div>
                <div class="gender-div col-6">
                    <label class="form-label">Gender</label>
                    <input name="gender" class="gender form-select mb-3" id="" value="<?php echo $gender  ?>" readonly>
                </div>            
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email  ?>" readonly>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>

        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Contact Number</label>
            <input name="cnumber" type="tel" class="form-control" id="validationCustom02" value="<?php echo $cnumber  ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Address</label>
            <input name="address" type="text" class="form-control" id="validationCustom02" value="<?php echo $address  ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Department</label>
            <input name="department" type="text" class="form-control" id="validationCustom02" value="<?php echo $depatment  ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Degree</label>
            <input name="degree" type="text" class="form-control" id="validationCustom02" value="<?php echo $degree  ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Salary</label>
            <input name="salary" type="number" class="form-control" id="validationCustom02" value="<?php echo $salary  ?>" readonly>
        </div>

        <!-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" readonly>
        </div>-->
        <button type="submit" class="submit-btn btn btn-primary">Click here to update info</button>
        <a class="change_password_btn btn btn-primary" href="change_password.php" role="button">Click here to change password</a>
    </form>
    </div>
    <script src="script.js"></script>
</body>

</html>