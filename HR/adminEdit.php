<?php
require 'mainConnect.php';
session_start();
if (!isset($_SESSION['authenticated'])) {
	// If the user is not authenticated, show an empty page and exit
	echo "<script>alert('Please login first.')</script>";

	exit();
}

// Check if the user has the correct role
if ($_SESSION['role'] !== 'Administrator') {
	// If the user does not have the correct role, show an empty page and exit
	echo "<script>alert('Access denied. You do not have permission to access this page.')</script>";

	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Applicant</title>
         <!-- Include SweetAlert 2 CSS -->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.min.css">

<!-- Include SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php

// Check if the form is submitted
if(isset($_POST['update_status'])) {
  // Get the selected status from the form
  $status = $_POST['status_'];
  $applicant_number = $_POST['reference_no'];


    // Retrieve current status from database
    $query = "SELECT applicant_status FROM applicant_perosnal_info WHERE applicant_number='$applicant_number'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $current_status = $row['applicant_status'];

  // Update the status in the database
  $query = "UPDATE applicant_perosnal_info SET applicant_status='$status' WHERE applicant_number='$applicant_number'";
  $query_run = mysqli_query($conn, $query);

  $timezone = new DateTimeZone('Asia/Manila');
  $date = new DateTime('now', $timezone);
  $date_updated = $date->format('Y-m-d h:i:s A');
        
  // Update the applicant status and date_status_updated
  $queryTime = "UPDATE applicant_perosnal_info SET applicant_status='$status', date_status_updated='$date_updated' WHERE applicant_number='$applicant_number'";
  $queryrun = mysqli_query($conn, $queryTime);
  
  $user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
$activity = "Admin Updated applicant number <b>$applicant_number</b> status from <b> $current_status</b> to <b> $status </b> ";
date_default_timezone_set('Asia/Manila');
$newdate = new DateTime();
$timestamp = $newdate->format('Y-m-d H:i:s');
$formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));
$sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
mysqli_query($conn, $sql);


  // Check if the update was successful
  if($query_run) {


    echo "<script>
    Swal.fire({
      title: 'Successfully Edited!',
      icon: 'success',
      confirmButtonText: 'OK'
    }).then(() => {
      window.location.href = 'adminDatatable.php';
    });
  </script>";
  }else{
    echo "<script>
              Swal.fire({
                title: 'Applicant Not Edited',
                icon: 'error',
                confirmButtonText: 'OK'
              }).then(() => {
                window.location.href = 'adminDatatable.php';
              });
            </script>";
  }
}
?>
</body>
</html>