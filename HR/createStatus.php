<?php

require 'mainConnect.php';
session_start();

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Status</title>
    <!--DATA TABLESSS-->
    <link rel="icon" href="images/aoe.png">
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
</head>
<style>
    *{
        font-family: 'Roboto', sans-serif;
    }
        .body{
        position: absolute;
        top: 45%;
        left: 28.5%;
        transform: translate(-40%, -95%);
        }
    </style>
<body>
<?php include('cdn_bootstrap.php') ?>
   
    <form action="createStatus.php" method="POST">
    <div class="row body">
        <legend>Create Status</legend>
        
        <div style="margin-bottom:5%;" class="col-lg-6">
            <label for="title">Create New Status</label>
            <input class="form-control" type="text" name="status" id="title">
        </div>
        <br>
        <br>
        <div class="col-lg-12">
        <button style="margin-top:3%;" type="submit" class="btn btn-success btn-block" target="_blank">Create!</button>
        </div>
        </div>
       
    </form>



    <div class="container mt-5">
    <?php include ('message.php')?>
    <div  style="margin:0 0 0 50% ; max-width:70%;"  class="row">
        <div class="col-md-12">
            <div class="card">
                <div id="title-header" class="card-header">
                    <h4 id="title-header">Status
                    <a href="superAdminDashboard.php"class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div  class="card-body">
                <table class="table" id = "mytable">
                    <thead>
                      <tr>
                    
                        <th>ID</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                         $query = "SELECT * FROM create_status";
                       $query_run= mysqli_query($conn,$query);
                       if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $create_status){
                          ?>
                          <tr>
                          <td><?= $create_status['id'];?></td>
                            <td><?= $create_status['status_'];?></td>
                            
                            <td>
                              <a href="editApplicant.php?id=<?=$create_status['id'];?>" class="btn btn-success btn-sm">Edit</a>
                              <form action="createStatus.php" method="POST" class="d-inline">
                              <button type ="submit" name="status_delete" value="<?=$create_status['id']; ?>"class ="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                       }
                       else{
                          echo "<h5>No Record Found</h5>";
                       }
                      ?>
                     
                    </tbody>
                  </table>
                  <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
                          integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
                          crossorigin="anonymous"></script>


                  <script src ="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                  <script>
                  $(document).ready (function(){
                    $('.table').DataTable();

                  });
                  </script>
            
                </div>
            </div>
        </div>
    </div>
  </div>

    <?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capstone";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form input values
$status = isset($_POST["status"]) ? $_POST["status"] : "";


// Check if required fields are not empty
if (empty($status)) {
    echo "";
} else {
  $status_query = "SELECT COUNT(*) as count FROM create_status WHERE status_ = '$status'";

  
  $status_result = mysqli_query($conn, $status_query);

  
  $status_count = mysqli_fetch_assoc($status_result)['count'];

  
  if ($status_count > 0) {
      echo "<script>
      Swal.fire({
          title: 'Error',
          text: 'Status already existed!',
          icon: 'error',
          confirmButtonText: 'OK'
      }).then(function () {
          window.history.back();
      });
      </script>";
      exit;
  }
    // Prepare SQL statement to insert data into job_vacancy table
    $sql = "INSERT INTO create_status (status_) VALUES ('$status')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // If data is inserted successfully, display success message using SweetAlert
        $user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
        $activity = "System Admin Created a status named <b>$status.</b>";
        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $timestamp = $date->format('Y-m-d H:i:s');
        $formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));
        $sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
        mysqli_query($conn, $sql);
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Status created successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'createStatus.php';
                }
            })
        </script>";
        exit(); // Terminate script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//DELETE CODE
if(isset($_POST['status_delete'])){

  $id  = mysqli_real_escape_string($conn, $_POST['status_delete']);
    
  // Get the name of the status being deleted
  $status_query = "SELECT status_ FROM create_status WHERE id = '$id'";
  $status_result = mysqli_query($conn, $status_query);
  $status = mysqli_fetch_assoc($status_result)['status_'];

  $query = "DELETE FROM create_status WHERE id = '$id' ";
  $query_run = mysqli_query($conn,$query);

  // Include the status name in the audit trail
  $user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
  $activity = "System Admin deleted a status named <b>$status.</b>";
  date_default_timezone_set('Asia/Manila');
  $date = new DateTime();
  $timestamp = $date->format('Y-m-d H:i:s');
  $formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));
  $sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
  mysqli_query($conn, $sql);

    if($query_run){
   
       echo "<script>
              Swal.fire({
                title: 'Successfully Deleted!',
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(() => {
                window.location.href = 'createStatus.php';
              });
            </script>";
    }
    else{
       echo "<script>
              Swal.fire({
                title: 'Applicant Not Deleted',
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