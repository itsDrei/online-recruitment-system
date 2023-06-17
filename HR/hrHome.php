<?php
session_start();
require 'mainConnect.php';
//username and email

//logout cod
if(isset($_GET['logout'])){
    // unset all session variables
    session_unset();
    // destroy the session
    session_destroy();
    header("Location: login.php");
    exit;}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Recruitment System</title>
	<!-- Link Bootstrap 5 CSS file -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href ="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" relstyle ="stylesheet">
	<link rel="stylesheet" href="mainStyle.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-2 col-lg-3">
        <nav class="side-navigation-bar">
          <div class="side-nav-head">
            <div class="logo" href="#">
              <img src="AOE-logo.webp" alt="">
              <span class="company-name">Online Recruitment System</span>
            </div>
          </div>
            <li>
              <a id="dashboard"><i class='bx bx-home-alt'></i>Dashboard</a>
            </li>
            <li>
              <a id="dashboard-link"><i class='bx bx-group'></i>Applications</a>
            </li>
            <li><a href="#"><i class='bx bx-briefcase-alt-2'></i>Job Vacancy</a></li>
            <li><a href="#"><i class='bx bxs-hand' ></i>Status</a></li>
         
          <li style="list-style:none; position:absolute; bottom:1%; left:0; right:0;">
            <a class="logout" href="?logout=true"><i class='bx bxs-log-out'></i>Logout</a>
          </li>
        </nav>
      </div>
    </div>
  </div>

  <main style="position:absolute; left:18%; ">
  <h1>Admin Dashboard</h1>
  <p style="color:black;" class="name">Welcome back<?php echo " "; echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; echo "!";?></p>
  </main>

  <div style="position" id="code-container">
    
  </div>

 <!--Boxicons-Script-->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

 <!--Bootstrap-JS-requisites-->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<script src ="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <!--Boxicons-Script-->
 <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

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
 
<script>
$(document).ready(function(){
  $('#dashboard-link').click(function(){
    var timestamp = new Date().getTime(); // get current timestamp
    $('#code-container').load('dataTable.php?' + timestamp); // add timestamp as a query parameter
  });
  
  $('#dashboard').click(function(){
    $('#code-container').load('mainDashboard.php?'+ timestamp);
  });
});





$(document).ready (function(){
                    $('.table').DataTable();

                  });
</script>

</body>
</html>
