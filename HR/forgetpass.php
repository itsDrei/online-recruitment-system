<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="icon" href="aoe.png">
    <link rel="stylesheet" href="loginPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<?php include('cdn_bootstrap.php') ?>
    <div class="container">
        <form action="forgetpass.php" method="post">
            <h2 class="title">Forget Password</h2>
            <br>
            <div class="row">
               <center>
                <p>Please Enter your <b> Employee Number </b>first before proceeding in forget password.</p>
                  <div class="col-sm-2">
                    <input type="text" name="empNum" class="form-control" placeholder="Enter Employee Number" required>
                  </div>
                 
                </center>
            </div>
            <br>
            <div class="row">
              <center>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
              </center>
            </div>
        </form>
    </div>
    <?php
require 'mainConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["empNum"])) {
    $empNum = $_POST["empNum"];
  
   // Check if employee number exists in database
$sql = "SELECT empNum FROM registration_table WHERE empNum='$empNum'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['empNum'] = $row['empNum'];
    header('Location: forgetpassprocess.php');
    exit();
} else {
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: 'Invalid employee number',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        </script>";
}
}
  