<?php
session_start();
require 'mainConnect.php';

$firstname = $_POST['fname'];
$middlename = $_POST['mname'];
$lastname = $_POST['lname'];
$bplace = $_POST['bplace'];
$bdate = $_POST['birthdate'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$civil = $_POST['civil'];
$province = $_POST['province'];
$city = $_POST['city'];
$baranggay = $_POST['baranggay'];
$street = $_POST['street'];
$postal = $_POST['postal'];
$father_name = $_POST['father'];
$father_occu = $_POST['f_occu'];
$mother_name = $_POST['mother'];
$mother_occu = $_POST['m-occu'];
$status = "New";
$cv_file = $_POST['cv_file'];
$sql1="INSERT INTO `applicant_perosnal_info`(`firstname`, `middlename`, `lastname`, 
                                             `birthdate`, `birthplace`, `age`, 
                                             `gender`, `civil_status`, `email_add`, 
                                             `contact`, `street`, `barangay`, `city`, 
                                             `province`, `postal_code`, `father_name`,
                                              `father_occu`, `mother_name`, `mother_occu`, 
                                              `applicant_status`,'cv_file')
        VALUES ('$firstname', '$middlename', '$lastname', 
                '$bdate ','$bplace', '$age',
                '$gender','$civil','$email',
                '$phone','$street','$baranggay','$city',
                '$province','$postal','$father_name',
                '$father_occu','$mother_name','$mother_occu',
                '$status','$cv_file')";




//educ_attainment
$college_name = $_POST['cname'];
$collegeprogram = $_POST['cprogram'];
$colleg_graduated = $_POST['cyear'];
$senior_name = $_POST['sname'];
$senior_program = $_POST['sprogram'];
$senior_graduated = $_POST['syear'];
$high_name = $_POST['hname'];
$high_graduated = $_POST['hyear'];
$elem_name = $_POST['ename'];
$elem_graduated = $_POST['eyear'];

$sql2= "INSERT INTO `educ_attainment`(`college`, `program`, `cyear_grad`, 
                                      `S_high`, `S_program`, `Syear_grad`, 
                                      `J_high`, `Jyear_grad`, 
                                      `elem`, `Eyear_grad`) 
                              VALUES ('$college_name','$collegeprogram','$colleg_graduated',
                                      '$senior_name','$senior_program ','$senior_graduated',
                                      '$high_name','$high_graduated',
                                      '$elem_name','$elem_graduated')";




//first_work_exp
$firstExpName = $_POST['company_name1'];
$firstExpAdd = $_POST['company_address1'];
$firstposition = $_POST['position1'];
$firstdate_start = $_POST['work_date_start1'];
$firstdate_end = $_POST['date_ended1'];


$sql3 = "INSERT INTO `first_work_exp`(`work_date_start`, `date_ended`, `position`, 
                                      `company_name`, `company_add`) 
                 VALUES ('$firstdate_start ','$firstdate_end','$firstposition',
                         '$firstExpName','$firstExpAdd')";


//second_work_exp
$secondExpName = $_POST['company_name2'];
$secondExpAdd = $_POST['company_address2'];
$secondposition = $_POST['position2'];
$seconddate_start = $_POST['work_date_start2'];
$seconddate_end = $_POST['date_ended2'];

$sql4="INSERT INTO `second_work_exp`(`work_date_start`, `date_ended`, `position`, 
                                     `company_name`, `company_add`) 
                                VALUES ('$seconddate_start','$seconddate_end','$secondposition',
                                        '$secondExpName','$secondExpAdd')";



//third_work_exp
$thirdExpName = $_POST['company_name3'];
$thirdExpAdd = $_POST['company_address3'];
$thirdposition = $_POST['position3'];
$thirddate_start = $_POST['work_date_start3'];
$thirddate_end = $_POST['date_ended3'];

$sql5="INSERT INTO `third_work_exp`(`work_date_start`, `date_ended`, `position`, 
                                    `company_name`, `company_add`) 
                           VALUES  ('$thirddate_start','$thirddate_end ','$thirdposition',
                                      '$thirdExpName','$thirdExpAdd')";



//character_reference
$cfirst = $_POST['cfname'];
$clast = $_POST['clname'];
$email_ref = $_POST['email_ref'];
$phone_ref = $_POST['phone_ref'];
$occu_ref = $_POST['occu_ref'];

$sql6="INSERT INTO `character_reference`(`firstname`, `lastname`, `email`, 
                                         `contact`, `occupation`) 
                                         VALUES ('$cfirst','$clast','$email_ref',
                                            '$phone_ref','$occu_ref')";

?>

