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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job Vacancy</title>
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

<body>



    <div class="container mt-5">

    <div  class="row">
        <div class="col-md-12">
            <div class="card">
                <div id="title-header" class="card-header">
                    <h4 id="title-header">List of Jobs Created
                            
                    </h4>
                    <a href="superAdminDashboard.php"class="btn btn-danger float-end">Back</a>
                </div>
                <div  class="card-body">
                <table class="table" id="mytable">
    <thead>
      <tr>
        <th>Job Title</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT DISTINCT job_title, job_status, job_id FROM job_vacancy GROUP BY job_title";
      $query_run = mysqli_query($conn, $query);
      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $job_vacancy) {
      ?>
          <tr>
            <td><?= $job_vacancy['job_title']; ?></td>
            <td><?= $job_vacancy['job_status']; ?></td>
            <td>
              <a href="applicant_list.php?job_id=<?= $job_vacancy['job_id']; ?>" class="btn btn-success btn-sm">Check applicants</a>
            </td>
          </tr>
      <?php
        }
      } else {
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


</body>
</html>