<?php

require 'mainConnect.php';

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
<!doctype html>
<html lang="en">
  <head>
  <link rel="icon" href="images/aoe.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/viewForm.css">
    <title>Employee Details</title>
  </head>
  <body>

  <div class="container">

  <div class="card-body" >
                    
                    <?php
                         if(isset($_GET['job_id'])){
    
                           $job= mysqli_real_escape_string($conn,$_GET['job_id']);
                           $query = "SELECT * FROM job_vacancy WHERE job_id = '$job'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $job = mysqli_fetch_array($query_run);
                            ?>
                            <br>
<div class="row" style="max-width: 90%; margin: 0 auto;"> 
      
      
<legend><b>PERSONAL INFORMATION <a href="job_vacancy.php" class = "btn btn-danger float-end">back</a></b></legend>
 
           <div class="col-lg-4">
           <label  for="job_title"><b>Job Title:</b> <p class="form"><?=$job['job_title'];?></p></label>
           </div>
           <div class="col-lg-4">
           <label  for="job_title"><b>Company Name:</b> <p class="form"><?=$job['comp_name'];?></p></label>
           </div>
           <div class="col-lg-4">
           <label  for="job_desc"><b>Job Description:</b> <p class="form"><?=$job['job_desc'];?></p></label>
           </div>
           <div class="col-lg-4">
           <label  for="job_desc"><b>Job Status:</b> <p class="form"><?=$job['job_status'];?></p></label>
           </div>

           <?php
                           }
                           else{
                            echo "No record found!";
                           }
                         }
                         
                    ?>
                    </div>

  </div>