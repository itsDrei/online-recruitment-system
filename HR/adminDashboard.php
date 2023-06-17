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

// Check if the user is logged in
if (!isset($_SESSION['empNum'])) {
  // Redirect to login page
  header("Location: index.php");
  exit;

}

// Get the current user's name from the session variable
$user_name = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];

// Log the user out
if (isset($_GET['logout'])) {
  // Destroy the session
  session_unset();
  session_destroy();

  // Log the user's logout activity
  $activity = "Admin Logged Out";
  date_default_timezone_set('Asia/Manila');
  $date = new DateTime();
  $timestamp = $date->format('Y-m-d H:i:s');
  $formatted_datetime = date('F j, Y h:i A', strtotime($timestamp));
$sql = "INSERT INTO audit_trail (user_name, activity, date) VALUES ('$user_name', '$activity', '$formatted_datetime')";
mysqli_query($conn, $sql);

  // Redirect to login page
  header("Location: index.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/aoe.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src ="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
     <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
     <script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="admin.css">


	<title>Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<img style="width:50px; margin-left:3%;"src="images/aoe.png" alt="">
		<span style="margin-left:3%;"class="text"> AOE</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="adminDatatable.php">
					<i class='bx bx-group' ></i>
					<span class="text">Application</span>
				</a>
			</li>
			<li>
				<a href="adminJobVacant.php">
					<i class='bx bx-briefcase-alt-2' ></i>
					<span class="text">Job Vacancy</span>
				</a>
			</li>
      <br>
      <br>
      <br>
			
		</ul>
		<ul class="side-menu">
			<li>
				  <a class="logout" href="?logout=true"><i class='bx bxs-log-out'></i>Logout</a>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
				
					<button type="submit" class="search-btn" hidden><i class='bx bx-search' hidden></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
      <div class="user-account-interface">
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Welcome! <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?></h1>
				
				</div>
				<a href="generateReports.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn-download" target="_blank">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Generate Report</span>
				</a>
			</div>
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
					<h3><?php 
						    $query = "SELECT COUNT(*) FROM job_vacancy";
                                   $result = mysqli_query($conn, $query);
								   $row = mysqli_fetch_array($result);
								   echo $row[0];?>
								   </h3>
						<p> New Position</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php 
						    $query = "SELECT COUNT(*) FROM applicant_perosnal_info WHERE applicant_status = 'new' ";
                                   $result = mysqli_query($conn, $query);
								   $row = mysqli_fetch_array($result);
								   echo $row[0];?>
								   </h3>
						<p>New Applicants</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php 
						    $query = "SELECT COUNT(*) FROM applicant_perosnal_info";
                                   $result = mysqli_query($conn, $query);
								   $row = mysqli_fetch_array($result);
								   echo $row[0];?></h3>
						<p>Total applicants</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-message-dots' ></i>
					<span class="text">
						<h3><?php 
						    $query = "SELECT COUNT(*) FROM create_status";
                                   $result = mysqli_query($conn, $query);
								   $row = mysqli_fetch_array($result);
								   echo $row[0];?></h3>
						<p>Total Status Created</p>
					</span>
				</li>
				<li>
				<i class='bx bx-user-x'></i>
					<span class="text">
						<h3><?php 
						    $query = "SELECT COUNT(*) FROM applicant_perosnal_info WHERE applicant_status = 'Inactive'";
                                   $result = mysqli_query($conn, $query);
								   $row = mysqli_fetch_array($result);
								   echo $row[0];?></h3>
						<p>Inactive</p>
					</span>
				</li>
				<?php
                    include('statusPost.php');
                ?>

			</ul>


<div class="container mt-5">
    <?php include ('message.php')?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div id="title-header" class="card-header">
                    <h4 id="title-header">NEW APPLICANTS
                            
                    </h4>
                </div>
                <div class="card-body">
                <table class="table" id = "mytable">
                    <thead>
                      <tr>
                        <th> Reference No.</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        
                        <th>Status</th>
                        <th>Date Apply</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       $query = "SELECT * FROM applicant_perosnal_info WHERE applicant_status = 'New'";
                       $query_run= mysqli_query($conn,$query);
                       if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $applicant_perosnal_info){
                          ?>
                          <tr>
                       
                            <td><?= $applicant_perosnal_info['applicant_number'];?></td>
                            <td><?= $applicant_perosnal_info['firstname'];?></td>
                            <td><?= $applicant_perosnal_info['lastname'];?></td>
                            
                            <td><?= $applicant_perosnal_info['applicant_status'];?></td>
                            <td><?= $applicant_perosnal_info['data_apply'];?></td>
                            
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
<br>
<br>

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
	<script src="show.js"></script>
</body>
</html>