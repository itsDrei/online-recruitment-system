<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "applicant_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['save'])){
  // Sanitize input using mysqli_real_escape_string function
  $firstname = $_POST['fname'];
  $middlename = $_POST['mname'];
  $lastname = $_POST['lname'];
  $bplace = $_POST['bplace'];
  $bdate = $_POST['birthdate'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $emails = $_POST['emails'];
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

  $firstExpName = $_POST['company_name1'];
  $firstExpAdd = $_POST['company_address1'];
  $firstposition = $_POST['position1'];
  $firstdate_start = $_POST['work_date_start1'];
  $firstdate_end = $_POST['date_ended1'];

  $secondExpName = $_POST['company_name2'];
  $secondExpAdd = $_POST['company_address2'];
 

  $secondExpName = $_POST['company_name2'];
  $secondExpAdd = $_POST['company_address2'];
  $secondposition = $_POST['position2'];
  $seconddate_start = $_POST['work_date_start2'];
  $seconddate_end = $_POST['date_ended2'];

  $thirdExpName = $_POST['company_name3'];
  $thirdExpAdd = $_POST['company_address3'];
  $thirdposition = $_POST['position3'];
  $thirddate_start = $_POST['work_date_start3'];
  $thirddate_end = $_POST['date_ended3'];

  $email_ref = $_POST['email_ref'];
  $phone_ref = $_POST['phone_ref'];
  $occu_ref = $_POST['occu_ref'];
  $cv_file = $_POST['cv_file'];
  $status = "New";


  $sql = "INSERT INTO applicant_info (firstname, middlename, lastname, birthplace, birthdate, age, gender, emails, phone, civil_status, 
  state, city, baranggay, street, postal, f_name, f_occu, m_name, m_occu, c_name, 
  c_program, c_year,  s_name, s_program, s_year, h_name, h_year, e_name, e_year, 
  compname1, compadd1, position1, date_started1, date_ended1, 
  compname2, compadd2, position2, date_started2, date_ended2, 
  compname3, compadd3, position3, date_started3, date_ended3,
  email_ref, phone_ref, occu_ref, cv_file, status)
  VALUES ('$firstname', '$middlename', '$lastname', 
  '$bplace', '$bdate ','$age','$gender','$emails','$phone',
  '$civil','$province','$city','$baranggay','$street','$postal',
  '$father_name','$father_occu','$mother_name','$mother_occu','$college_name','$collegeprogram',
  '$colleg_graduated','$senior_name','$senior_program','$senior_graduated','$high_name',
  '$high_graduated','$elem_name','$elem_graduated','$firstExpName','$firstExpAdd','$firstposition',
  '$firstdate_start','$firstdate_end','$secondExpName','$secondExpAdd','$secondposition',
  '$seconddate_start','$seconddate_end','$thirdExpName','$thirdExpAdd','$thirdposition',
  '$thirddate_start','$thirddate_end','$email_ref','$phone_ref','$occu_ref','$cv_file','$status')";


if ($conn->query($sql) === TRUE) {
  
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

  mysqli_close($conn);
}
?>
