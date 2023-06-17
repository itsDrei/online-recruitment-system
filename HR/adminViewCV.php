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


Require 'mainConnect.php';

if (isset($_GET['file_id'])) {
    $applicant_id = $_GET['file_id'];
    $sql = "SELECT name FROM cv_file WHERE applicant_number = '$applicant_id'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = '../Applicant/uploads/' . $file['name'];
    if (mysqli_num_rows($result) > 0) {
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: ' . mime_content_type($filepath));
            header('Content-Disposition: inline; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));       
            ob_clean();
            flush();
            readfile($filepath);
        } else {
            echo "CV file not found.";
        }
    } else {
        echo "No CV file uploaded for this applicant.";
    }
}
?>
