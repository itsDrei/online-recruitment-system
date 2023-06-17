<?php
session_start();
require 'mainConnect.php';
if (!isset($_SESSION['authenticated'])) {
  // If the user is not authenticated, show an empty page and exit
  echo "<script>alert('Please login first.')</script>";

  exit();
}

// Check if the user has the correct role
if ($_SESSION['role'] !== 'System Administrator') {
  // If the user does not have the correct role, show an empty page and exit
  echo "<script>alert('Access denied. You do not have permission to access this page.')</script>";

  exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Management</title>
  <link rel="icon" href="images/aoe.png">
  
  <!-- My CSS -->

  <link href ="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" relstyle ="stylesheet">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--Boxicons-NPM-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--DATA TABLESSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
     <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
     <script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
      <script src="user.js" defer></script>
     <!--DATA TABLESSS-->
</head>

<title></title>
<body>
    



<?php
require 'mainConnect.php';

if(isset($_GET['inactive'])){
  $reference_no = $_GET['inactive'];
$reason = $_GET['reason'];

  $query6 = "UPDATE  applicant_perosnal_info SET applicant_status = 'Inactive' , reason = '$reason'
             WHERE applicant_number = ? ";
  $stmt6 = mysqli_prepare($conn, $query6);
  mysqli_stmt_bind_param($stmt6, "i",$reference_no);
  $query_run6 = mysqli_stmt_execute($stmt6);
 


  if($query_run6) {
      echo "<script>
            Swal.fire({
              title: 'Successfully Inactive!',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location.href = 'dataTable.php';
            });
          </script>";
  }
  else{
      echo "<script>
      Swal.fire({
        title: 'Applicant Not set as active',
        icon: 'error',
        confirmButtonText: 'OK'
      }).then(() => {
        window.location.href = 'dataTable.php';
      });
    </script>";
  }
}

?>
</body>
</html>