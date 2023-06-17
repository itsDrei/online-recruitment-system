<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
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
<?php
require 'mainConnect.php';
// Retrieve the job ID from the URL parameter
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
} else {
    // Redirect to the previous page if the job ID is not set
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}


// Fetch the job title from the database
$query = "SELECT job_title FROM job_vacancy WHERE job_id = $job_id";
$query_run = mysqli_query($conn, $query);
$job = mysqli_fetch_assoc($query_run);
$job_title = $job['job_title'];

// Fetch the applicants from the database
$query = "SELECT * FROM applicant_perosnal_info ap
          JOIN job_vacancy j ON ap.job_apply = j.job_title
          WHERE j.job_id = $job_id";
$query_run = mysqli_query($conn, $query);
$applicants = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
?>


    <!-- Display the job title and the applicants in a datatable -->
<div class="container mt-5">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div id="title-header" class="card-header">
            <h4>Applicants for <?= $job_title ?></h4>
            <a href="checkjob.php"class="btn btn-danger float-end">Back</a>
            </div>
            <div class="card-body">
    <table class="table" id="mytable">
        <thead>
            <tr>
                <th>Applicant No</th>
                <th>Full Name</th>
                <th>Job applying for</th>
                <th>Status</th>
                <th>Date Apply</th>
                <th>Work Experience Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(mysqli_num_rows($query_run) > 0): ?>
            <?php foreach($applicants as $applicant): ?>
                <tr>
                    <td><?= $applicant['applicant_number']; ?></td>
                    <td><?= $applicant['firstname'];?> <?= $applicant['middlename'];?> <?= $applicant['lastname'];?></td>
                    <td><?= $applicant['job_apply']; ?></td>
                    <td><?= $applicant['applicant_status']; ?></td>
                    <td><?= $applicant['data_apply']; ?></td>
                    <td>
                        <?php
                            // Get the first work experience of the applicant
                            $work_exp_query = "SELECT * FROM first_work_exp WHERE applicant_number = '".$applicant['applicant_number']."' LIMIT 1";
                            $work_exp_result = mysqli_query($conn, $work_exp_query);
                            if(mysqli_num_rows($work_exp_result) > 0){
                                $work_exp = mysqli_fetch_assoc($work_exp_result);
                                echo $work_exp['position'];
                            } else {
                                // Get the second work experience of the applicant
                                $work_exp_query = "SELECT * FROM second_work_exp WHERE applicant_number = '".$applicant['applicant_number']."' LIMIT 1";
                                $work_exp_result = mysqli_query($conn, $work_exp_query);
                                if(mysqli_num_rows($work_exp_result) > 0){
                                    $work_exp = mysqli_fetch_assoc($work_exp_result);
                                    echo $work_exp['position'];
                                } else {
                                    // Get the third work experience of the applicant
                                    $work_exp_query = "SELECT * FROM third_work_exp WHERE applicant_number = '".$applicant['applicant_number']."' LIMIT 1";
                                    $work_exp_result = mysqli_query($conn, $work_exp_query);
                                    if(mysqli_num_rows($work_exp_result) > 0){
                                        $work_exp = mysqli_fetch_assoc($work_exp_result);
                                        echo $work_exp['position'];
                                    } else {
                                        echo "N/A";
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <a href="viewButton2.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn btn-primary btn-sm">View</a>
                        <a href="editButton.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn btn-success btn-sm">Set Status</a>
                        <a href="setcomp.php?applicant_number=<?=$applicant['applicant_number'];?>"class="btn btn-dark btn-sm">Set Company</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7"><h5>No Record Found</h5></td>
            </tr>
        <?php endif; ?>
                 
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

</body>
</html>
