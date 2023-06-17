<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="images/aoe.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Status</title>
</head>
<body>
  
</body>
</html>
<?php
session_start();
require 'mainConnect.php';

include 'cdn_bootstrap.php';
//EDIT CODE
  
if(isset($_POST['submit'])){
    $id = $_POST['id'];
      $status =($_POST['status']);
   // Retrieve current job title from database
 $querys = "SELECT * FROM create_status WHERE id = '$id'";
 $result = mysqli_query($conn, $querys);
 $row = mysqli_fetch_assoc($result);
 $current_status = $row['status_'];

      $result = "UPDATE create_status SET status_ = '$status'  WHERE id = '$id'";
      $query =mysqli_query($conn,$result);
      
      if($query){

        $user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
        $activity = "System Admin Updated status from <b> $current_status</b> to <b> $status </b>";
        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $timestamp = $date->format('Y-m-d H:i:s');
        $formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));
        $sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
        mysqli_query($conn, $sql);

          echo "<script>
          Swal.fire({
            title: 'Successfully Edited!',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then(() => {
            window.location.href = 'createStatus.php';
          });
        </script>";
      
        }else{
          echo "<script>
                    Swal.fire({
                      title: 'Status Not Edited',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    }).then(() => {
                      window.location.href = 'createStatus.php';
                    });
                  </script>";
        }
        
      
  }
    
  
  // Close database connection
  $conn->close();
?>
  
</body>
</html>