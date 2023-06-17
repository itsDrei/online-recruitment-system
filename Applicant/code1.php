<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "";

if(isset($_POST['submit'])){

    //applicant info
    $fname  = mysqli_real_escape_string($con, $_POST['fname']);
    $mname  = mysqli_real_escape_string($con, $_POST['mname']);
    $sname  = mysqli_real_escape_string($con, $_POST['lname']);
    $bplace = mysqli_real_escape_string($con, $_POST['bplace']);
    $birthdate  = mysqli_real_escape_string($con, $_POST['birthdate']);
    $age  = mysqli_real_escape_string($con, $_POST['age']);
    $gender  = mysqli_real_escape_string($con, $_POST['gender']);
    $email  = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $civil  = mysqli_real_escape_string($con, $_POST['civil']);
    $street  = mysqli_real_escape_string($con, $_POST['street']);
    $barangay  = mysqli_real_escape_string($con, $_POST['barangay']);
    $city  = mysqli_real_escape_string($con, $_POST['city']);
    $province  = mysqli_real_escape_string($con, $_POST['province']);
    $postal  = mysqli_real_escape_string($con, $_POST['postal']);
    $father  = mysqli_real_escape_string($con, $_POST['father']);
    $f_occu  = mysqli_real_escape_string($con, $_POST['f_occu']);
    $mother  = mysqli_real_escape_string($con, $_POST['mother']);
    $m_occu  = mysqli_real_escape_string($con, $_POST['m_occu']);
    
    $status = "New";

    $query1="INSERT INTO INSERT INTO `applicant_perosnal_info`(`firstname`, `middlename`, `lastname`, 
                                                               `birthdate`, `birthplace`, `age`, 
                                                               `gender`, `civil_status`, `email_add`, 
                                                               `contact`, `street`, `barangay`, `city`,
                                                                `province`, `postal_code`, `father_name`, 
                                                                `father_occu`, `mother_name`, `mother_occu`, 
                                                                `applicant_status`) 
             VALUES ";

$query2="INSERT INTO `character_reference`( `firstname`, `lastname`, `email`, `contact`, `occupation`) 
         VALUES ";
$query3="INSERT INTO `educ_attainment`(`college`, `program`, `cyear_grad`, 
                                      `S_high`, `Syear_grad`, `J_high`, 
                                      `Jyear_grad`, `elem`, `Eyear_grad`) 
         VALUES "  ;   
         
$query4="INSERT INTO `first_work_exp`(`work_date_start`, `date_ended`, `position`, `company_name`, `company_add`) 
         VALUES ";  
$query5="INSERT INTO `second_work_exp`( `work_date_start`, `date_ended`, `position`, `company_name`, `company_add`) 
         VALUES ";    
$query6="INSERT INTO `third_work_exp`( `work_date_start`, `date_ended`, `position`, `company_name`, `company_add`) 
         VALUES ";                    


}


?>