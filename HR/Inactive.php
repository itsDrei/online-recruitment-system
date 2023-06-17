<?php
session_start();
require 'mainConnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Management</title>
  <link rel="icon" href="images/aoe.png">
  
  
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
        
    <?php
    
                     if(isset($_GET['applicant_number'])){

                       $reference_no= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                       $query = "SELECT * FROM applicant_perosnal_info WHERE applicant_number = '$reference_no'";
                       $query_run=mysqli_query($conn,$query);
                       if(mysqli_num_rows($query_run)>0){
                         $reference_no = mysqli_fetch_array($query_run);
                        ?>
                        <form action="Inactive.php" method="post">
                       
<div class="row"
style="max-width:90%;
margin:0 auto;"
>
<h1 style="margin-top:5%;"><B><i><span style="color:red;">NOTICE</span>: DO YOU WANT TO SET THIS APPLICANT AS INACTIVE?</i></B></h1>
<!-- <a href="PDF.php?applicant_number=<?=$applicant['applicant_number'];?>" class = "btn btn-danger float-end" target="_blank">PDF</a> -->
                        <div class="col-lg-2">
                        <label for="firstname">Applicant number:</label>
      <input type="text" class="form-control" name="applicant_number" id="userName" value = "<?=$reference_no['applicant_number'];?>" readonly>        
    </div>
                        <div class="col-lg-3">
                        <label for="firstname">First Name:</label>
      <input type="text" class="form-control" name="fname" id="userName" value = "<?=$reference_no['firstname'];?>" readonly>        
    </div>
  
    <div class="col-lg-3">
     
      <label for="middlename">Middle Name:</label>
      <input type="text" class="form-control" name="mname" id="userLastName" value = "<?=$reference_no['middlename'];?>"  readonly>
      
    </div>

    <div class=" col-lg-3">
      
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" name="lname" id="lname1" value = "<?=$reference_no['lastname'];?>"  readonly>
    </div>


    <div style="margin-top:5%;" class="col-lg-4">
           <label for="#"><b>Enter the reason for Inactivation:</b></label>
              <input class="form-control" type="text" id="reason" name="reason" placeholder="enter here..." required>
              <br>
              
        </div>
        </div>

    <a style="margin-left:5.5%;" href="dataTable.php" class="btn btn-primary">Back</a>
    <button type="submit" name="send" class ="btn btn-danger">Save as INACTIVE!</button>                             
                        <?php } else{ echo "No record found!";  } }
                        ?>


</form>
</div>

    </body>
    </html>

<!-- Include SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
    <?php
     if(isset($_POST['send'])){
        $reason= $_POST['reason'];
        $applicant_number = $_POST['applicant_number'];

        $query = "UPDATE applicant_perosnal_info SET applicant_status='Inactive', reason='$reason' WHERE applicant_number='$applicant_number'";
        $query_run = mysqli_query($conn, $query);

        
if($query_run) {

  $user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
  $activity = "System Admin set applicant number <b>$applicant_number</b> to <b> Inactive </b>due to<b> $reason </b>";
  date_default_timezone_set('Asia/Manila');
  $date = new DateTime();
  $timestamp = $date->format('Y-m-d H:i:s');
  $formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));
  $sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
  mysqli_query($conn, $sql);

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
title: 'Applicant Not set as Inactive active',
icon: 'error',
confirmButtonText: 'OK'
}).then(() => {
window.location.href = 'Inactive.php';
});
</script>";
}
        
    }?>

