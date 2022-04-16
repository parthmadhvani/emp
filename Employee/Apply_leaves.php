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
// if(isset($_POST["submitbtn"])){

//     $reason = $_POST["reason"];
//     $start_date = $_POST["start_date"];
//     $end_date = $_POST["end_date"];
    

//     $sql= "INSERT INTO `emp_leaves` (`id`, `start_date`, `end_date`, `reason`) VALUES ( '$id', '$start_date', '$end_date', '$reason')";
//     $result = mysqli_query($con,$sql);

//     if($result){
//         echo "<script> leaveSuc(); </script>";
//     }
//     else echo "<script> leaveFail(); </script>";
// }

// $sql1="select `start_date`,`end_date`,`reason`,`status` from `emp_leaves` where `id`='$id'";
// $result1=mysqli_query($con,$sql1);
}
else{
    echo "you have been logged out";
    header("Location: ../alogin.html");
}
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
    <link rel="stylesheet" href="main.css"<?php echo time(); ?>/>
    <title>Document</title>
</head>

<body>

    <div class="nav">
        <h3>TechMe</h3>
        <div class="navli">
            <div class="dash unactive" value="my_profile.php">My profile</div>
            <div class="dash unactive" value="project.php">My projects</div>
            <div class="dash active" value="Apply_leaves.php">Leaves</div>
            <div class="dash unactive" value="log_out.php">Log Out</div>
        </div>
    </div>      

    <div class="animation">
    <p class="heading">Leaves</p>
    <form method="post" action="" class="">
    <div class="alerts">
        <div class="alert alert-success" id="success" role="alert">
            Added successfully.
        </div>
        <div class="alert alert-danger" id="danger" role="alert">
            Couldn't add the employee !
        </div>
    </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Reason :</label>
            <textarea name="reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">From :</label>
            <input name="start_date" type="date" class="form-control" id="validationCustom01" required>
        </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">To :</label>
            <input name="end_date" type="date" class="form-control" id="validationCustom01" required>
        </div>
        <button type="submit" name="submitbtn" class="submit-btn btn btn-primary">Submit</button>
    </form>
    </div>
   
   <?php 
    $sql1="select `start_date`,`end_date`,`reason`,`status` from `emp_leaves` where `id`='$id'";
    $result1=mysqli_query($con,$sql1);

    if(mysqli_num_rows($result1)>0){ ?>   
    <div class="animation">
        <table class="leaves_table table">
            <thead>
                <tr>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
                <th scope="col">Total days</th>
                <th scope="col">Reason</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   
                    if($result1){
                        while($row=mysqli_fetch_assoc($result1)){
                            $date1 = new DateTime($row['start_date']);
                            $date2 = new DateTime($row['end_date']);
                            $interval = $date1->diff($date2);
                            if($row["status"]=="Approved") $color = 'green';
                            if($row["status"]=="Cancelled") $color = 'red';
                            if($row["status"]=="Pending") $color = 'goldenrod';

                            echo "<tr>";
                            echo "<td>".$row["start_date"]."</td>";
                            echo "<td>".$row["end_date"]."</td>";
                            echo "<td>".$interval->days."</td>";
                            echo "<td>".$row["reason"]."</td>";
                            echo "<td style='color:$color;'>".$row["status"]."</td>";
                        
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php
   } ?>
</body>
<script src="script.js"></script>
</html>

<?php
// if(isset($_SESSION["id"])){
// $servernmae="localhost";
// $username="root";
// $pass="";
// $dbname="ems1";

// $con = mysqli_connect($servernmae,$username,$pass,$dbname);

// if(!$con){
//     die("Can't connect to database...".mysqli_connect_error());
// }

if(isset($_POST["submitbtn"])){

    $reason = $_POST["reason"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    

    $sql= "INSERT INTO `emp_leaves` (`id`, `start_date`, `end_date`, `reason`) VALUES ( '$id', '$start_date', '$end_date', '$reason')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "<script> leaveSuc(); </script>";
    }
    else echo "<script> leaveFail(); </script>";
}


// }
// else{
//     echo "you have been logged out";
// }
?>