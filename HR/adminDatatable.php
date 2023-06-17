<?php
session_start();
require 'mainConnect.php';


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
  <title>Student Management</title>
  <link rel="icon" href="aoe.png">
  <link rel="stylesheet" href="css/head.css">
  <link rel="stylesheet" href="css/dashboard.css">
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



<body>
  <body>

  <div class="container mt-5">
    <?php include ('message.php')?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div id="title-header" class="card-header">
                    <h4 id="title-header">Applicant Information
                            <a href="adminDashboard.php"class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table" id = "mytable">
                    <thead>
                    <tr>
                        <th>Reference No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Status</th>
                        <th>Date Apply</th>
                        <th>Date Status updated</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       $query = "SELECT * FROM applicant_perosnal_info WHERE Applicant_status != 'Inactive'";
                       $query_run = mysqli_query($conn,$query);
                       if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $applicant){
                          ?>
                          <tr>
                            <td><?= $applicant['applicant_number'];?></td>
                            <td><?= $applicant['firstname'];?></td>
                            <td><?= $applicant['lastname'];?></td>
                            <td><?= $applicant['applicant_status'];?></td>
                            <td><?= $applicant['data_apply'];?></td>
                            <td><?= $applicant['date_status_updated'];?></td>
                            <td>
                              <a href="adminViewButton.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn btn-primary btn-sm">View</a>
                              <a href="adminEditButton.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn btn-success btn-sm">Edit</a>
                              
                              <a href="adminInactive.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn btn-danger btn-sm">Inactive</a>
                                         
               
                              
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
                                    $(document).ready(function () {
    var table = $('#mytable').DataTable({
      order: [0, 'desc']
    });

   
});
      
                  </script>
            
                </div>
            </div>
        </div>
    </div>
  </div>


  <main class="contentbody">

  </main>



 <!--Bootstrap-JS-requisites-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" 
          integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
          crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" 
          integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
          crossorigin="anonymous"></script>

     <!-- Include SweetAlert 2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.min.css">

<!-- Include SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  



<!-- Delete Code here -->
<?php
require 'mainConnect.php';

if(isset($_POST['delete'])){
 
  $reference_no = $_POST['delete'];
 
  $query6 = "UPDATE  applicant_perosnal_info SET applicant_status = 'Inactive' WHERE applicant_number =  ?";
  $stmt6 = mysqli_prepare($conn, $query6);
  mysqli_stmt_bind_param($stmt6, "i", $reference_no);
  $query_run6 = mysqli_stmt_execute($stmt6);



  if($query_run6) {
 // Prepare audit trail activity message
 $user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
 $activity = "Admin set the status of applicant number $reference_no to <b>Inactive</b>";
 // Get current date and time
 date_default_timezone_set('Asia/Manila');
 $date = new DateTime();
 $timestamp = $date->format('Y-m-d H:i:s');
 $formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));
 // Insert audit trail record into database
 $audit_sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
 mysqli_query($conn, $audit_sql);


      echo "<script>
            Swal.fire({
              title: 'Successfully Inactive!',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location.href = 'adminDatatable.php';
            });
          </script>";
  }
  else{
      echo "<script>
            Swal.fire({
              title: 'Applicant Not set as inactive',
              icon: 'error',
              confirmButtonText: 'OK'
            }).then(() => {
              window.location.href = 'adminDatatable.php';
            });
          </script>";
  }
}


// // this for delete for datas 
// if(isset($_POST['out'])){
//   $reference_no = $_POST['out'];

//   $query1 = "DELETE FROM character_reference WHERE applicant_number = ?";
//   $stmt1 = mysqli_prepare($conn, $query1);
//   mysqli_stmt_bind_param($stmt1, "i", $reference_no);
//   $query_run1 = mysqli_stmt_execute($stmt1);

//   $query2 = "DELETE FROM third_work_exp WHERE applicant_number = ?";
//   $stmt2 = mysqli_prepare($conn, $query2);
//   mysqli_stmt_bind_param($stmt2, "i", $reference_no);
//   $query_run2 = mysqli_stmt_execute($stmt2);

//   $query3 = "DELETE FROM second_work_exp WHERE applicant_number = ?";
//   $stmt3 = mysqli_prepare($conn, $query3);
//   mysqli_stmt_bind_param($stmt3, "i", $reference_no);
//   $query_run3 = mysqli_stmt_execute($stmt3);

//   $query4 = "DELETE FROM first_work_exp WHERE applicant_number = ?";
//   $stmt4 = mysqli_prepare($conn, $query4);
//   mysqli_stmt_bind_param($stmt4, "i", $reference_no);
//   $query_run4 = mysqli_stmt_execute($stmt4);

//   $query5 = "DELETE FROM educ_attainment WHERE applicant_number = ?";
//   $stmt5 = mysqli_prepare($conn, $query5);
//   mysqli_stmt_bind_param($stmt5, "i", $reference_no);
//   $query_run5 = mysqli_stmt_execute($stmt5);

//   $query6 = "DELETE FROM applicant_perosnal_info WHERE applicant_number = ?";
//   $stmt6 = mysqli_prepare($conn, $query6);
//   mysqli_stmt_bind_param($stmt6, "i", $reference_no);
//   $query_run6 = mysqli_stmt_execute($stmt6);

//   $query7 = "DELETE FROM cv_file WHERE applicant_number = ?";
//   $stmt7 = mysqli_prepare($conn, $query7);
//   mysqli_stmt_bind_param($stmt7, "i", $reference_no);
//   $query_run7 = mysqli_stmt_execute($stmt7);

//   if($query_run1 && $query_run2 && $query_run3 && $query_run4 && $query_run5 && $query_run6 && $query_run7) {
//       echo "<script>
//             Swal.fire({
//               title: 'Successfully Deleted!',
//               icon: 'success',
//               confirmButtonText: 'OK'
//             }).then(() => {
//               window.location.href = 'dataTable.php';
//             });
//           </script>";
//   }
//   else{
//       echo "<script>
//             Swal.fire({
//               title: 'Applicant Not Deleted',
//               icon: 'error',
//               confirmButtonText: 'OK'
//             }).then(() => {
//               window.location.href = 'dataTable.php';
//             });
//           </script>";
//   }
// }

 ?>



</body>

</html>