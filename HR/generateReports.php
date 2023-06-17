<?php

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
$pdf->setHeaderData('aoe2.jpg',23, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

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
$pdf->SetAutoPageBreak(false); // disable automatic page breaking
date_default_timezone_set('Asia/Manila'); // set timezone to Philippines
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(50, 5, 'Report generated on: ' . date('F j, Y - g:i:s a'), 0, 1, 'L');
$pdf->Ln(10); // add some space between the date and the next content

$pdf->SetFont('helvetica', 'B', 20);
$pdf->Cell(50, 5, 'Reports', 0, 0, 'L');
$pdf->Cell(50, 5, ucfirst(strtolower('')), 0, 1, 'L');
$pdf->SetFont('helvetica', '', 12);

// Available Positions
$query = "SELECT COUNT(*) FROM job_vacancy";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$pdf->Cell(50, 5, 'Available Positions:', 0, 0, 'L');
$pdf->Cell(50, 5, $row[0], 0, 1, 'L');

// New Applicants
$query = "SELECT COUNT(*) FROM applicant_perosnal_info WHERE applicant_status = 'new' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$pdf->Cell(50, 5, 'New Applicants:', 0, 0, 'L');
$pdf->Cell(50, 5, $row[0], 0, 1, 'L');

// Total Applicants
$query = "SELECT COUNT(*) FROM applicant_perosnal_info";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$pdf->Cell(50, 5, 'Total Applicants:', 0, 0, 'L');
$pdf->Cell(50, 5, $row[0], 0, 1, 'L');

// Status and Count
$query = "SELECT * FROM create_status";
$query_run = mysqli_query($conn, $query);

while ($status = mysqli_fetch_array($query_run)) {
    // Retrieve count of applicants for each status
    $status_query = "SELECT COUNT(*) as count FROM applicant_perosnal_info WHERE applicant_status = '".$status['status_']."'";
    $status_query_run = mysqli_query($conn, $status_query);
    $status_count = mysqli_fetch_assoc($status_query_run)['count'];
        
    // Add status and count to PDF report
    $pdf->Cell(50, 5, ucfirst(strtolower($status['status_'])), 0, 0, 'L');
    $pdf->Cell(50, 5, $status_count, 0, 1, 'L');
}

$pdf->Output('Applicant Resume.pdf', 'I');

   ?>