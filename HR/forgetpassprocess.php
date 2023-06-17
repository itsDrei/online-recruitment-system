<?php
session_start();
require 'mainConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-sca le=1.0" >

    <link rel="icon" href="images/aoe.png">                                                                                                                                                                
    <title>Login Page</title>
    <link rel="stylesheet" href="loginPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<?php include('cdn_bootstrap.php') ?>
    <div class="container">
        <form action="forgetpassprocess.php"method ="post">
            <h2 class="title">Forget Password</h2>
            <br>
            <br>
            <div class="row">
               <center>
               <div class="col-sm-2">
                    <input type="text" name="empnum" class="form-control" placeholder="Enter Employee Number" required>
                  </div>
                  <br>
                  
               <div class="col-sm-2">
                    <input type="password" name="newPassword" class="form-control" placeholder="New Password" required>
                  </div>
                  <br>
                  <div class="col-sm-2">
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm New Password" required>
                  </div>
            </div>
            <br>
                </center>
                <div class="row">
                  <center>
                  <button type="submit" class="btn btn-success btn-block" target="_blank">Confirm</button>
                 
                  <br>
                  <br>
          
                  </center>
                </div>
        </form>
    </div>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capstone";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["empnum"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPassword"])) {
  
    $empNum = $_POST["empnum"];
    $newPass = $_POST["newPassword"];
    $confPass = $_POST["confirmPassword"];

    if ($newPass !== $confPass) {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Passwords do not match',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            </script>";
        exit();
    }

    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

    $sql = "UPDATE registration_table SET password='$hashedPass' WHERE empNum='$empNum'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            Swal.fire({
                title: 'Success',
                text: 'Password updated successfully',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function () {
                window.location = 'index3.php';
            });
            </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Error updating password',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            </script>";
    }
}

mysqli_close($conn);
?>

</body>
</html>
