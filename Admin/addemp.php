<?php session_start(); 
    if(!isset($_SESSION["email"])){
        header("Location: ../alogin.html");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=" UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
    <!-- <script src="script.js"></script> -->
</head>

<body>
    <div class="nav">
        <h3>TechMe</h3>
        <div class="navli">


            <div class="dash active" value="addemp.php">Add Employee</div>
            <div class="dash unactive" value="View_emp.php">View Employee</div>
            <div class="dash unactive" value="assign_proj.php">Assign Project</div>
            <div class="dash unactive" value="project_staus.php">Project Status</div>
            <div class="dash unactive" value="emp_leaves.php">Employee Leave</div>
            <div class="dash unactive" value="log_out.php">Log Out</a></div>
        </div>
    </div>
   

    <p class="heading">Add Employee</p>

    
    <form method="post" action="" class="">
    <div class="animation">
    <div class="alerts">
        <div class="alert alert-success" id="success" role="alert">
            Added successfully.
        </div>
        <div class="alert alert-danger" id="danger" role="alert">
            Couldn't add the employee !
        </div>
    </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">First name</label>
            <input name="fname" type="text" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input name="lname" type="text" class="form-control" id="validationCustom02" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6 bdate">
                    <label for="validationCustom02" class="form-label">Birthdate</label>
                    <input name="bdate" type="date" class="form-control" id="" required>
                </div>
                <div class="gender-div col-6">
                    <select name="gender" class="gender form-select mb-3" aria-label="Default select example">
                        <option selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            
            <label for="validationCustom02" class="form-label">Contact Number</label>
            <input name="cnumber" type="number" class="form-control" id="validationCustom02" required>
        </div>

        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Address</label>
            <input name="address" type="text" class="form-control" id="validationCustom02" required>
        </div>

        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Department</label>
            <input name="department" type="text" class="form-control" id="validationCustom02" required>
        </div>

        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Degree</label>
            <input name="degree" type="text" class="form-control" id="validationCustom02" required>
        </div>

        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Salary</label>
            <input name="salary" type="number" class="form-control" id="validationCustom02" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <button type="submit" name="submit" class="submit-btn btn btn-primary">Submit</button>
    </form>
    </div>
    <script src="script.js"></script>
</body>

</html>
<?php
// error_reporting(0);
if(isset($_POST["submit"])){
if(isset($_SESSION["email"])){
$servernmae="localhost";
$username="root";
$pass="";
$dbname="ems1";

$con = mysqli_connect($servernmae,$username,$pass,$dbname);

if(!$con){
    die("Can't connect to database...".mysqli_connect_error());
}

$email = $_POST["email"];
$password = $_POST["password"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$bdate = $_POST["bdate"];
$gender = $_POST["gender"];
$cnumber = $_POST["cnumber"];
$address = $_POST["address"];
$department = $_POST["department"];
$degree = $_POST["degree"];
$salary = $_POST["salary"];

$chech_result = mysqli_query($con,"select `email` from `employee` ");
while($row=mysqli_fetch_assoc($chech_result)){
    if($email==$row["email"]){
        echo "<script> duplicate();   </script>";
        break;
    }
}

$sql= "INSERT INTO `employee` (`email`, `password`, `fname`, `lname`, `bdate`, `gender`, `cnumber`, `address`, `department`, `degree`, `salary`) VALUES ( '$email', '$password', '$fname', '$lname', '$bdate', '$gender', '$cnumber', '$address', '$department', '$degree', '$salary')";
//$result = mysqli_query($con,$sql);

if(!mysqli_query($con,$sql)){
    echo "<script> fail();   </script>";
}
// if($result){
else{
    echo "<script> success(); </script>";
}
// else
//     // echo "Can't add";
//     echo "<script> fail();   </script>";
}
else{
    echo "<script>alert('you have been logged out')</script>";

}
}
?>