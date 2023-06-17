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
  <title>Document</title>



  
</head>
<body>

<?php
include 'cdn_bootstrap.php';
//EDIT CODE
  
if(isset($_POST['update_job'])){
  $job_id = $_POST['job_id'];
  $job_title = $_POST['job_title'];
  $job_desc = $_POST['job_desc'];
  $job_status = $_POST['job_status'];

  // Get current user's name from session
  $user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];

  // Retrieve current job title from database
  $query = "SELECT * FROM job_vacancy WHERE job_id = '$job_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $current_job_title = $row['job_title'];
  $current_job_desc = $row['job_desc'];
  $current_job_status= $row['job_status'];

   // Prepare audit trail activity message if the job title or description was updated
   if ($job_title != $current_job_title || $job_desc != $current_job_desc || $job_status != $current_job_status) {
    $activity = "Admin updated job vacancy";
    if ($job_title != $current_job_title) {
      $activity .= " titled from <br> <b>$current_job_title</b> to <br> <b>$job_title</b>";
    }
    if ($job_desc != $current_job_desc) {
      $activity .= " updated <b>$current_job_title</b> description from <b>$current_job_desc</b> to <b>$job_desc</b>";
    }    
    if ($job_status != $current_job_status) {
      $activity .= " titled <b>$current_job_title</b> status from <b>$current_job_status</b> with new status <b>$job_status</b>";
    }
    // Get current date and time
    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $timestamp = $date->format('Y-m-d H:i:s');
    $formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));

    // Insert audit trail record into database
    $audit_sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
    mysqli_query($conn, $audit_sql);
  }


    $result = "UPDATE job_vacancy SET
    job_title='$job_title',
    job_desc='$job_desc',
    job_status='$job_status'
    WHERE job_id = '$job_id'";

    if(mysqli_query($conn,$result)){
        echo "<script>
        Swal.fire({
          title: 'Successfully Edited!',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then(() => {
          window.location.href = 'adminJobVacant.php';
        });
      </script>";
    
      }else{
        echo "<script>
                  Swal.fire({
                    title: 'Job Not Edited',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  }).then(() => {
                    window.location.href = 'adminJobVacant.php';
                  });
                </script>";
      }
    
}
  

// Close database connection
$conn->close();

?>
  
</body>
</html>