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

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');
require_once('TCPDF-main/config/tcpdf_config.php');


// Set some content to print
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capstone";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";

	 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO,23, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// $result = $conn->query("SELECT * FROM applicant_perosnal_info WHERE applicant_number = $applicant");

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setTitle('Academy Of Operation Excellence Services Inc');



// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// Add a new page
$pdf->AddPage();

// Create a table and populate it with data
$pdf->SetFont('helvetica', '', 12);
// Loop through the data and display the values
if(isset($_GET['applicant_number'])){
    
	$applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);

	$query = "SELECT * FROM applicant_perosnal_info WHERE applicant_number = '$applicant'";
	$query_run=mysqli_query($conn,$query);
	if(mysqli_num_rows($query_run)>0){
	 $applicant = mysqli_fetch_array($query_run);
  
	 $pdf->SetAutoPageBreak(false); // disable automatic page breaking


	 $pdf->SetFont('helvetica', 'B', 20);
	 $pdf->Cell(50, 5, 'Personal Information:', 0, 0, 'L');
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');



	 $pdf->SetFont('helvetica', 'B', 12); // set font to bold, size 12
	 $pdf->Cell(25, 5, 'First Name:', 0, 0, 'L');
	
	 $pdf->SetFont('helvetica', '', 12); // reset font to regular, size 12
	 $pdf->Cell(35, 5, ucfirst(strtolower($applicant['firstname'])), 0, 0, 'L');


	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(30, 5, 'Middle Name:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(30, 5, ucfirst(strtolower($applicant['middlename'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(30, 5, 'Last Name:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['lastname'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');


	 $pdf->Cell(25, 5, 'Birthplace:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(35, 5, ucfirst(strtolower($applicant['birthplace'])), 0, 0, 'L');


	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(23, 5, 'Birthdate:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(37, 5, $applicant['birthdate'], 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(15, 5, 'Age:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, $applicant['age'], 0, 1, 'L');
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');


	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(25, 5, 'Gender:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(35, 5, ucfirst(strtolower($applicant['gender'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(35, 5, 'Email Address:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
$pdf->Cell(50, 5, $applicant['emails'], 0, 1, 'L');
$pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
$pdf->SetFont('helvetica', 'B', 12);

$pdf->Cell(35, 5, 'Contact Number:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(35, 5, $applicant['contact'], 0, 0, 'L');
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(28, 5, 'Civil Status:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(20, 5, ucfirst(strtolower($applicant['civil_status'])), 0, 0, 'L');

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(30, 5, 'Province:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(45, 5, ucfirst(strtolower($applicant['province'])), 0, 0, 'L');
$pdf->Cell(50, 9, ucfirst(strtolower('')), 0, 1, 'L');



$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(15, 5, 'City:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(35, 5, ucfirst(strtolower($applicant['city'])), 0, 0, 'L');
$pdf->SetFont('helvetica', 'B', 12);


$pdf->SetFont('helvetica', 'B', 12);
 $pdf->Cell(19, 5, 'Street:', 0, 0, 'L');
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(25, 5, ucfirst(strtolower($applicant['street'])), 0, 0, 'L');
$pdf->SetFont('helvetica', 'B', 12);
// $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 0, 'L');
$pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(30, 5, 'Barangay:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(24, 5, ucfirst(strtolower($applicant['barangay'])), 0, 0, 'L');


	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(29, 5, 'Postal Code:', 0, 0, 'L');
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(30, 5, ucfirst(strtolower($applicant['postal_code'])), 0, 1, 'L');
$pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');


// Output the PDF file


//============================================================+
// END OF FILE
//============================================================+

}



else{
 echo "No record found!";
}

$applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);

	$query = "SELECT * FROM educ_attainment WHERE applicant_number = '$applicant'";
	$query_run=mysqli_query($conn,$query);
	if(mysqli_num_rows($query_run)>0){
	 $applicant = mysqli_fetch_array($query_run);

	 $pdf->SetFont('helvetica', 'B', 20);
	 $pdf->Cell(50, 5, 'Educational Backround:', 0, 0, 'L');
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');


//college
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(28, 9, 'College:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 9, ucfirst(strtolower($applicant['college'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 //program
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(28, 5, 'Program:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(28, 5, ucfirst(strtolower($applicant['program'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 //cyear_grad
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(35, 5, 'Year Graduated:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['cyear_grad'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 3, ucfirst(strtolower('')), 0, 1, 'L');


//seniorhighschool
	 //S_high
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(43, 5, 'Senior high school:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['S_high'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 //S_program
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(28, 5, 'Program:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(28, 5, ucfirst(strtolower($applicant['S_program'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 //Syear_grad
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(35, 5, 'Year Graduated:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['Syear_grad'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
  
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');


	  //J_high
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->Cell(50, 5, 'Junior high School:', 0, 0, 'L');
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower($applicant['J_high'])), 0, 1, 'L');
	  $pdf->SetFont('helvetica', 'B', 12);

	   //Jyear_grad
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Year Graduated:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['Jyear_grad'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);


	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');


	  //elem
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->Cell(50, 5, 'Elementary:', 0, 0, 'L');
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower($applicant['elem'])), 0, 1, 'L');
	  $pdf->SetFont('helvetica', 'B', 12);


	   //Eyear_grad
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Year Graduated:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['Eyear_grad'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');

	}

	else{
	 echo "No record found!";
	}

	

//first work exp
	$applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);

	$query = "SELECT * FROM first_work_exp WHERE applicant_number = '$applicant'";
	$query_run=mysqli_query($conn,$query);
	if(mysqli_num_rows($query_run)>0){
	 $applicant = mysqli_fetch_array($query_run);
	 
	 $pdf->SetFont('helvetica', 'B', 20);
	 $pdf->Cell(50, 5, 'First work experience:', 0, 0, 'L');
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');


	 //work_date_start
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Work date start:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(48, 5, ucfirst(strtolower($applicant['work_date_start'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 

//date_ended
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(38, 5, 'Work date Ended:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['date_ended'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 


	 //company_name
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Company Name:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(48, 5, ucfirst(strtolower($applicant['company_name'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 
	 //company_add
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(40, 5, 'Company Address:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['company_add'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	

	  //position
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->Cell(50, 5, 'Position:', 0, 0, 'L');
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower($applicant['position'])), 0, 1, 'L');
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
	 
	}

	else{
	 echo "No record found!";
	}


	//second work
	
	$applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);

	$query = "SELECT * FROM second_work_exp WHERE applicant_number = '$applicant'";
	$query_run=mysqli_query($conn,$query);
	if(mysqli_num_rows($query_run)>0){
	 $applicant = mysqli_fetch_array($query_run);
	 
	 $pdf->SetFont('helvetica', 'B', 20);
	 $pdf->Cell(50, 5, 'Second work experience:', 0, 0, 'L');
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');



	 //work_date_start
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Work date start:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(48, 5, ucfirst(strtolower($applicant['work_date_start'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 

//date_ended
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(38, 5, 'Work date Ended:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['date_ended'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 

	

	 //company_name
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Company Name:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(48, 5, ucfirst(strtolower($applicant['company_name'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 
	 //company_add
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(40, 5, 'Company Address:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['company_add'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	

	  //position
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->Cell(50, 5, 'Position:', 0, 0, 'L');
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower($applicant['position'])), 0, 1, 'L');
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
	}

	else{
	 echo "No record found!";
	}


	//third_work
	
	$applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);

	$query = "SELECT * FROM third_work_exp WHERE applicant_number = '$applicant'";
	$query_run=mysqli_query($conn,$query);
	if(mysqli_num_rows($query_run)>0){
	 $applicant = mysqli_fetch_array($query_run);
	 
	 $pdf->SetFont('helvetica', 'B', 20);
	 $pdf->Cell(50, 5, 'Third work experience:', 0, 0, 'L');
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');



	 //work_date_start
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Work date start:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(48, 5, ucfirst(strtolower($applicant['work_date_start'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 

//date_ended
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(38, 5, 'Work date Ended:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['date_ended'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 


	 //company_name
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Company Name:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(48, 5, ucfirst(strtolower($applicant['company_name'])), 0, 0, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->SetFont('helvetica', '', 12);
	 
	 //company_add
	 $pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(40, 5, 'Company Address:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['company_add'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
	

	  //position
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->Cell(50, 5, 'Position:', 0, 0, 'L');
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower($applicant['position'])), 0, 1, 'L');
	  $pdf->SetFont('helvetica', 'B', 12);
	  $pdf->SetFont('helvetica', '', 12);
	  $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
	 
	}

	else{
	 echo "No record found!";
	}

	$pdf->AddPage();
	$applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);

	$query = "SELECT * FROM character_reference WHERE applicant_number = '$applicant'";
	$query_run=mysqli_query($conn,$query);
	if(mysqli_num_rows($query_run)>0){
	 $applicant = mysqli_fetch_array($query_run);
	


    //ref lastname
	$pdf->SetFont('helvetica', 'B', 20);
	 $pdf->Cell(50, 5, 'Character reference:', 0, 0, 'L');
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');

	//ref firstnam
	$pdf->SetFont('helvetica', 'B', 12);
	 $pdf->Cell(50, 5, 'Firstname:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['ref_firstname'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);
    //ref lastname
	 $pdf->Cell(50, 5, 'Lastname:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['ref_lastname'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 //ref lastname
	 $pdf->Cell(50, 5, 'Email Address:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['ref_email'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 //ref lastname
	 $pdf->Cell(50, 5, 'Contact:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['ref_contact'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);

	 //ref lastname
	 $pdf->Cell(50, 5, 'Occupation:', 0, 0, 'L');
     $pdf->SetFont('helvetica', '', 12);
	 $pdf->Cell(50, 5, ucfirst(strtolower($applicant['ref_occupation'])), 0, 1, 'L');
	 $pdf->SetFont('helvetica', 'B', 12);



// Output the PDF file


//============================================================+
// END OF FILE
//============================================================+

}


else{
 echo "No record found!";
}


}
$pdf->Output('Applicant Resume.pdf', 'I');

?>

