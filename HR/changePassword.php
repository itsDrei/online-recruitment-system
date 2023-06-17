<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="icon" href="aoe.png">
    <link rel="stylesheet" href="loginPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<?php include('cdn_bootstrap.php') ?>
    <div class="container">
        <form action="changePassword.php" method="post">
            <h2 class="title">Change Password</h2>
            <br>
            <div class="row">
               <center>
                  <div class="col-sm-2">
                    <input type="text" name="empNum" class="form-control" placeholder="Employee Number" required>
                  </div>
                  <br>
                  <div class="col-sm-2">
                    <input type="password" name="currentPassword" class="form-control" placeholder="Current Password" required>
                  </div>
                  <br>
                  <div class="col-sm-2">
                    <input type="password" name="newPassword" class="form-control" placeholder="New Password" required>
                  </div>
                  <br>
                  <div class="col-sm-2">
                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm New Password" required>
                  </div>
                </center>
            </div>
            <br>
            <div class="row">
              <center>
                <button type="submit" class="btn btn-success btn-block">Change Password</button>
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["empNum"]) && isset($_POST["currentPassword"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPassword"])) {
  
    $empNum = $_POST["empNum"];
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    $sql = "SELECT empNum, password FROM registration_table WHERE empNum='$empNum'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $passwordHash = $row['password'];

      if (password_verify($currentPassword, $passwordHash)) {
        if ($newPassword == $confirmPassword) {
          $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

          $sql = "UPDATE registration_table SET password='$passwordHash' WHERE empNum='$empNum'";
          mysqli_query($conn, $sql);

          echo "<script>
            Swal.fire({
              title: 'Password Changed Successfully',
              icon:'success',
              confirmButtonText: 'OK'
              }).then(function () {
              window.location = 'index3.php';
              });
              </script>";
              } else {
              echo "<script>
              Swal.fire({
              title: 'Error',
              text: 'New Password and Confirm Password do not match',
              icon: 'error',
              confirmButtonText: 'OK'
              });
              </script>";
              }
              } else {
              echo "<script>
              Swal.fire({
              title: 'Error',
              text: 'Current Password is incorrect',
              icon: 'error',
              confirmButtonText: 'OK'
              });
              </script>";
              }
              } else {
              echo "<script>
              Swal.fire({
              title: 'Error',
              text: 'Employee Number and password do not match',
              icon: 'error',
              confirmButtonText: 'OK'
              });
              </script>";
              }
              mysqli_close($conn);
              }
