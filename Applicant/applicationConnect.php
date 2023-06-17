
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Submission</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.2/dist/sweetalert2.all.min.js"></script>

</head>
<body>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capstone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 
function capitalizeName($name) {
    // Convert all characters to lowercase and then capitalize the first letter of each word
    $name = ucwords(strtolower($name));
    return $name;
  }


if(isset($_POST['save'])){
  // Sanitize input using mysqli_real_escape_string function

//applicant_info
$firstname = capitalizeName($_POST["fname"]);
$middlename = capitalizeName($_POST["mname"]);
$lastname = capitalizeName($_POST["lname"]);
$bplace = capitalizeName($_POST['bplace']);
$bdate = $_POST['birthdate'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$emails = $_POST['emails'];
$phone = $_POST['number'];
$civil = $_POST['civil'];
$province = capitalizeName($_POST['province']);
$city = capitalizeName($_POST['city']);
$baranggay = capitalizeName($_POST['baranggay']);
$street = capitalizeName($_POST['street']);
$postal = $_POST['postal'];
$father_name = capitalizeName($_POST['father']);
$father_occu = capitalizeName($_POST['f_occu']);
$mother_name = capitalizeName($_POST['mother']);
$mother_occu = capitalizeName($_POST['m_occu']);
$status = "New";
$job_apply = $_POST['jobt'];



//educ_attainment
$college_name = capitalizeName($_POST['cname']);
$collegeprogram = capitalizeName($_POST['cprogram']);
$colleg_graduated = $_POST['cyear'];
$senior_name = capitalizeName($_POST['sname']);
$senior_program = capitalizeName($_POST['sprogram']);
$senior_graduated = $_POST['syear'];
$high_name = capitalizeName($_POST['hname']);
$high_graduated = $_POST['hyear'];
$elem_name = capitalizeName($_POST['ename']);
$elem_graduated = $_POST['eyear'];


//first_work_exp
$firstExpName = capitalizeName($_POST['company_name1']);
$firstExpAdd = $_POST['company_address1'];
$firstposition = capitalizeName($_POST['position1']);
$firstdate_start = $_POST['work_date_start1'];
$firstdate_end = $_POST['date_ended1'];




//second_work_exp
$secondExpName = capitalizeName($_POST['company_name2']);
$secondExpAdd = $_POST['company_address2'];
$secondposition = capitalizeName($_POST['position2']);
$seconddate_start = $_POST['work_date_start2'];
$seconddate_end = $_POST['date_ended2'];



//third_work_exp
$thirdExpName = capitalizeName($_POST['company_name3']);
$thirdExpAdd = $_POST['company_address3'];
$thirdposition = capitalizeName($_POST['position3']);
$thirddate_start = $_POST['work_date_start3'];
$thirddate_end = $_POST['date_ended3'];

//character_reference
$cfirst = capitalizeName($_POST['cfname']);
$clast = capitalizeName($_POST['clname']);
$email_ref = $_POST['email_ref'];
$phone_ref = $_POST['phone_ref'];
$occu_ref = capitalizeName($_POST['occu_ref']);



// $email_query = "SELECT COUNT(*) as count FROM applicant_perosnal_info WHERE emails = '$emails'";
// $contact_query = "SELECT COUNT(*) as count FROM applicant_perosnal_info WHERE contact = '$phone'";

// $email_result = mysqli_query($conn, $email_query);
// $contact_result = mysqli_query($conn, $contact_query);

// $email_count = mysqli_fetch_assoc($email_result)['count'];
// $contact_count = mysqli_fetch_assoc($contact_result)['count'];

// if ($email_count > 0 || $contact_count > 0) {
//     echo "<script>
//     Swal.fire({
//         title: 'Error',
//         text: 'Email or contact already exists in the database.',
//         icon: 'error',
//         confirmButtonText: 'OK'
//     }).then(function () {
//         window.history.back();
//     });
//     </script>";
//     exit;
// }




// Check if the email or phone number already exists in the database for the same job_apply
$email_query = "SELECT COUNT(*) as count FROM applicant_perosnal_info WHERE job_apply = '$job_apply' AND emails = '$emails'";
$contact_query = "SELECT COUNT(*) as count FROM applicant_perosnal_info WHERE job_apply = '$job_apply' AND contact = '$phone'";

$email_result = mysqli_query($conn, $email_query);
$contact_result = mysqli_query($conn, $contact_query);

$email_count = mysqli_fetch_assoc($email_result)['count'];
$contact_count = mysqli_fetch_assoc($contact_result)['count'];

if ($email_count > 0 || $contact_count > 0) {
    // Email or contact already exists for the same job_apply
    echo "<script>
    Swal.fire({
        title: 'Error',
        text: 'You have already submitted an application for this job!.',
        icon: 'error',
        confirmButtonText: 'OK'
    }).then(function () {
        window.history.back();
    });
    </script>";
    exit;
}

$sql1 = "INSERT INTO applicant_perosnal_info(firstname, middlename, lastname, birthdate, birthplace, age, gender, civil_status, emails, contact, street, barangay, city, province, postal_code, father_name, father_occu, mother_name, mother_occu, applicant_status,job_apply) 
         VALUES ('$firstname', '$middlename', '$lastname', '$bdate', '$bplace', '$age', '$gender', '$civil', '$emails', '$phone', '$street', '$baranggay', '$city', '$province', '$postal', '$father_name', '$father_occu', '$mother_name', '$mother_occu', '$status','$job_apply')";

$query_run1 = mysqli_query($conn, $sql1);
$for_id = mysqli_insert_id($conn);

// Insert CV file information into database
$filename = $_FILES['cv_file']['name'];
$destination = 'uploads/' . $filename;
$extension = pathinfo($filename, PATHINFO_EXTENSION);
$file = $_FILES['cv_file']['tmp_name']; 
$size = $_FILES['cv_file']['size'];

if (!in_array($extension, ['pdf', 'docx'])) {
    echo "<script>
    Swal.fire({
        title: 'Error',
        text: 'Invalid file extension. Allowed file types are .pdf, and .docx',
        icon: 'error',
        confirmButtonText: 'OK'
      }).then(function () {
        window.history.back();
    });
    </script>";
    exit;
} elseif ($size > 1000000) {
    echo "<script>
    Swal.fire({
        title: 'Error',
        text: 'File size exceeded. Maximum file size is 1MB',
        icon: 'error',
        confirmButtonText: 'OK'
    }).then(function () {
        window.history.back();
    });
    </script>";
    exit;
} else {
    if (move_uploaded_file($file, $destination)) {
        $sql_cv = "INSERT INTO cv_file (applicant_number,name, size) VALUES ('$for_id', '$filename', $size)";
      
        if (mysqli_query($conn, $sql_cv)) {
            // CV file uploaded successfully
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Error',
            text: 'Failed to upload CV file.',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(function () {
            window.history.back();
        });
        </script>";
        exit;
    }
}

$sql2 = "INSERT INTO educ_attainment(applicant_number, college, program, cyear_grad, S_high, S_program, Syear_grad, J_high, Jyear_grad, elem, Eyear_grad) 
         VALUES ('$for_id', '$college_name', '$collegeprogram', '$colleg_graduated', '$senior_name', '$senior_program', '$senior_graduated', '$high_name', '$high_graduated', '$elem_name', '$elem_graduated')";

$query_run2 = mysqli_query($conn, $sql2);

$sql3 = "INSERT INTO first_work_exp(applicant_number, work_date_start, date_ended, position, company_name, company_add) 
         VALUES ('$for_id', '$firstdate_start', '$firstdate_end', '$firstposition', '$firstExpName', '$firstExpAdd')";

$query_run3 = mysqli_query($conn, $sql3);

$sql4 = "INSERT INTO second_work_exp(applicant_number, work_date_start, date_ended, position, company_name, company_add) 
         VALUES ('$for_id', '$seconddate_start', '$seconddate_end', '$secondposition', '$secondExpName', '$secondExpAdd')";

$query_run4 = mysqli_query($conn, $sql4);

$sql5 = "INSERT INTO third_work_exp(applicant_number, work_date_start, date_ended, position, company_name, company_add) 
         VALUES ('$for_id', '$thirddate_start', '$thirddate_end', '$thirdposition', '$thirdExpName', '$thirdExpAdd')";

$query_run5 = mysqli_query($conn, $sql5);

$sql6 = "INSERT INTO character_reference(applicant_number, ref_firstname, ref_lastname, ref_email, ref_contact, ref_occupation) 
         VALUES ('$for_id', '$cfirst', '$clast', '$email_ref', '$phone_ref', '$occu_ref')";

$query_run6 = mysqli_query($conn, $sql6);



  if($query_run1 && $query_run2 && $query_run3 && $query_run4 && $query_run5 && $query_run6) {
    echo "<script>
    Swal.fire({
        title: 'Success!',
        text: 'Application Form Submitted Successfully.',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then(function () {
        window.location = 'index.php';
    });
    </script>";
    exit;
  } else {
    echo "<script>
    Swal.fire({
        title: 'Error',
        text: 'Employee Number and password do not match',
        icon: 'error',
        confirmButtonText: 'OK'
    });
    </script>";
    exit;
  }
}  
?>
</body>
</html>