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

// if(isset($_POST["submitbtn"])){

// $old_pwd = $_POST["old_password"];
// $new_pwd = $_POST["new_password"];
// $con_new_pwd = $_POST["confirm_new_password"];

// $sql = "SELECT * FROM `employee` WHERE `id`='$id' ";
// $result = mysqli_query($con,$sql) or die("Can't get the old password...");

// $sql2 = "UPDATE `employee` SET `password` = '$new_pwd' WHERE `id`='$id';" ;
// if(mysqli_num_rows($result)==1){
//     while($result1 = mysqli_fetch_assoc($result)){
//         $db_pwd = $result1["password"];
//     }

//     if($db_pwd == $old_pwd){
//         if($new_pwd == $con_new_pwd){
//             $result2 = mysqli_query($con,$sql2);
//             if($result2){
//                 echo '<script> alert("Your password changed successfully.") </script>' ;
//             }
//             else echo "<script> alert(`Couldn't change your password, please try again !`) </script>" ;
//         }
//         else{
//             echo '<script> alert("Please verify your password !") </script>' ;
//         }
//     }
//     else{
//         echo '<script> alert("Incorrect password !") </script>' ;
//     }
// }
// else die("Musltiple passwords found !!!");
// }
// }
// else{
//     echo "you have been logged out";
}
else{
    header("Location: ../alogin.html");
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
   <p class="heading">Change password</p>
    <form method="post" action="" class="">
    <div class="alerts">
        <div class="alert alert-success" id="success" role="alert">
            Added successfully.
        </div>
        <div class="alert alert-danger" id="danger" role="alert">
            Couldn't add the employee !
        </div>
    </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Enter old password</label>
            <input name="old_password" type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="validationCustom01" class="form-label">Enter new password</label>
            <input name="new_password" type="text" class="form-control" >
        </div>

        <div class="mb-3">
            <label for="validationCustom02" class="form-label">Confirm new password</label>
            <input name="confirm_new_password" type="text" class="form-control" >
        </div>
        
        <button type="submit" name="submitbtn" class="change_password_submit_btn btn btn-primary">Change password</button>
    </form>
   </div>
    <script src="script.js"></script>
</body>

</html>

<?php

if(isset($_POST["submitbtn"])){

    $old_pwd = $_POST["old_password"];
    $new_pwd = $_POST["new_password"];
    $con_new_pwd = $_POST["confirm_new_password"];
    
    $sql = "SELECT * FROM `employee` WHERE `id`='$id' ";
    $result = mysqli_query($con,$sql) or die("Can't get the old password...");
    
    $sql2 = "UPDATE `employee` SET `password` = '$new_pwd' WHERE `id`='$id';" ;
    if(mysqli_num_rows($result)==1){
        while($result1 = mysqli_fetch_assoc($result)){
            $db_pwd = $result1["password"];
        }
    
        if($db_pwd == $old_pwd){
            if($new_pwd == $con_new_pwd){
                $result2 = mysqli_query($con,$sql2);
                if($result2){
                    // echo '<script> alert("Your password changed successfully.") </script>' ;
                    echo "    <script>passSuc()</script>";
                }
                // else echo "<script> alert(`Couldn't change your password, please try again !`) </script>" ;
                else echo "<script> passUnSuc() </script>" ;
            }
            else{
                // echo '<script> alert("Please verify your password !") </script>' ;
                echo '<script> verPass() </script>' ;
            }
        }
        else{
            // echo '<script> alert("Incorrect password !") </script>' ;
            echo '<script> inCorPass() </script>' ;
        }
    }
    else die("Multiple passwords found !!!");
    }

    ?>
