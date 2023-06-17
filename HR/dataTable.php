<?php
session_start();
require 'mainConnect.php';
// if (!isset($_SESSION['authenticated'])) {
//   // If the user is not authenticated, show an empty page and exit
//   echo "<script>alert('Please login first.')</script>";

//   exit();
// }

// // Check if the user has the correct role
// if ($_SESSION['role'] !== 'System Administrator') {
//   // If the user does not have the correct role, show an empty page and exit
//   echo "<script>alert('Access denied. You do not have permission to access this page.')</script>";

//   exit();
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Management</title>
  <link rel="icon" href="images/aoe.png">
  
  <!-- My CSS -->

  <link href ="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" relstyle ="stylesheet">
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
      <script src="user.js" defer></script>
     <!--DATA TABLESSS-->
</head>



<body>
 

  <div class="container mt-5">
    <?php include ('message.php')?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div id="title-header" class="card-header">
                    <h4 id="title-header">Applicant Information
                            <a href="superAdminDashboard.php"class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table" id = "mytable">
                    <thead>
                      <tr>
                        <th>Reference No.</th>
                        <th>Full Name</th>
                        <th>Status</th>
                        <th>Date Apply</th>
                        <th>Date Status updated</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       $query = "SELECT * FROM applicant_perosnal_info WHERE applicant_status != 'Inactive'";
                       $query_run = mysqli_query($conn,$query);
                       if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $applicant){
                          ?>
                          <tr>
                            <td><?= $applicant['applicant_number'];?></td>
                            <td><?= $applicant['firstname'];?> <?= $applicant['middlename'];?> <?= $applicant['lastname'];?></td>
                         
                            <td><?= $applicant['applicant_status'];?></td>
                            <td><?= $applicant['data_apply'];?></td>
                            <td><?= $applicant['date_status_updated'];?></td>
                            <td>

                           <a href="Inactive.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn btn-danger btn-sm">Inactive</a>
                           <!-- <a href="delete.php?applicant_number=<?=$applicant['applicant_number'];?>" class="btn btn-danger btn-sm">Delete</a> -->

<!-- <form action="dataTable.php" method="POST" class="d-inline">
    <div class="modal" id="confirmInactiveModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Inactive Status</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to set this applicant as INACTIVE?  <?=$applicant['applicant_number'];?></p>
        
        <div class="form-group">
          <label for="reason">Please state the reason for inactivation:</label>
          <input type="text" class="form-control" name="reason" id="reason">
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
        <button type="submit" name="inactive"  value="<?=$applicant['applicant_number']; ?>" class="btn btn-danger" id="confirmInactiveButton">Yes, set as inactive</button>
      </div>
        </form>
    </div>
  </div>
</div> -->
                            </td>
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
                          $(document).ready(function () {
    var table = $('#mytable').DataTable({
      order: [0, 'desc']
    });

   
    
});
function showConfirmInactiveModal(event) {
  event.preventDefault(); // prevent form submission
  
  // show modal
  $('#confirmInactiveModal').modal('show');
  
  // handle confirmation button click
  $('#confirmInactiveButton').click(function() {
    // submit form when confirmation button is clicked
    $('form').submit();
  });
}

                  </script>
            
                </div>
            </div>
        </div>
    </div>
  </div>


  <main class="contentbody">

  </main>



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
  



<!-- Delete Code here -->
<?php
require 'mainConnect.php';

   // this for delete for datas 
 if(isset($_POST['out'])){
   $reference_no = $_POST['out'];

   $query1 = "DELETE FROM character_reference WHERE applicant_number = ?";
   $stmt1 = mysqli_prepare($conn, $query1);
   mysqli_stmt_bind_param($stmt1, "i", $reference_no);
   $query_run1 = mysqli_stmt_execute($stmt1);

   $query2 = "DELETE FROM third_work_exp WHERE applicant_number = ?";
   $stmt2 = mysqli_prepare($conn, $query2);
   mysqli_stmt_bind_param($stmt2, "i", $reference_no);
   $query_run2 = mysqli_stmt_execute($stmt2);

   $query3 = "DELETE FROM second_work_exp WHERE applicant_number = ?";
   $stmt3 = mysqli_prepare($conn, $query3);
   mysqli_stmt_bind_param($stmt3, "i", $reference_no);
   $query_run3 = mysqli_stmt_execute($stmt3);

   $query4 = "DELETE FROM first_work_exp WHERE applicant_number = ?";
   $stmt4 = mysqli_prepare($conn, $query4);
   mysqli_stmt_bind_param($stmt4, "i", $reference_no);
   $query_run4 = mysqli_stmt_execute($stmt4);

   $query5 = "DELETE FROM educ_attainment WHERE applicant_number = ?";
   $stmt5 = mysqli_prepare($conn, $query5);
   mysqli_stmt_bind_param($stmt5, "i", $reference_no);
   $query_run5 = mysqli_stmt_execute($stmt5);

   $query6 = "DELETE FROM applicant_perosnal_info WHERE applicant_number = ?";
   $stmt6 = mysqli_prepare($conn, $query6);
   mysqli_stmt_bind_param($stmt6, "i", $reference_no);
   $query_run6 = mysqli_stmt_execute($stmt6);

   $query7 = "DELETE FROM cv_file WHERE applicant_number = ?";
   $stmt7 = mysqli_prepare($conn, $query7);
   mysqli_stmt_bind_param($stmt7, "i", $reference_no);
   $query_run7 = mysqli_stmt_execute($stmt7);

   if($query_run1 && $query_run2 && $query_run3 && $query_run4 && $query_run5 && $query_run6 && $query_run7) {
       echo "<script>
             Swal.fire({
               title: 'Successfully Deleted!',
               icon: 'success',
               confirmButtonText: 'OK'
             }).then(() => {
               window.location.href = 'dataTable.php';
             });
           </script>";
   }
   else{
       echo "<script>
             Swal.fire({
               title: 'Applicant Not Deleted',
               icon: 'error',
               confirmButtonText: 'OK'
             }).then(() => {
               window.location.href = 'dataTable.php';
             });
           </script>";
   }
 }

  




// if(isset($_POST['update'])){
//   $reference_no = $_POST['reference_no'];
//   $firstname = $_POST['fname'];
//   $middlename = $_POST['mname'];
//   $lastname = $_POST['lname'];
//   $bplace = $_POST['bplace'];
//   $bdate = $_POST['birthdate'];
//   $age = $_POST['age'];
//   $gender = $_POST['gender'];
//   $email = $_POST['email'];
//   $phone = $_POST['phone'];
//   $civil = $_POST['civil'];
//   $province = $_POST['province'];
//   $city = $_POST['city'];
//   $baranggay = $_POST['baranggay'];
//   $street = $_POST['street'];
//   $postal = $_POST['postal'];
//   $father_name = $_POST['father'];
//   $father_occu = $_POST['f_occu'];
//   $mother_name = $_POST['mother'];
//   $mother_occu = $_POST['m-occu'];
//   $status = $_POST['status_'];
//   $cv_file = $_POST['cv_file'];

//   $sql1="INSERT INTO `applicant_perosnal_info`(firstname, middlename, lastname, 
//                                                birthdate, birthplace, age, 
//                                                gender, civil_status, email_add, 
//                                                contact, street, barangay, city, 
//                                                province, postal_code, father_name,
//                                                 father_occu, mother_name, mother_occu, 
//                                                 applicant_status,cv_file)
//           VALUES ('$firstname', '$middlename', '$lastname', 
//                   '$bdate ','$bplace', '$age',
//                   '$gender','$civil','$email',
//                   '$phone','$street','$baranggay','$city',
//                   '$province','$postal','$father_name',
//                   '$father_occu','$mother_name','$mother_occu',
//                   '$status','$cv_file')";
  
  
  
  
//   //educ_attainment
//   $college_name = $_POST['cname'];
//   $collegeprogram = $_POST['cprogram'];
//   $colleg_graduated = $_POST['cyear'];
//   $senior_name = $_POST['sname'];
//   $senior_program = $_POST['sprogram'];
//   $senior_graduated = $_POST['syear'];
//   $high_name = $_POST['hname'];
//   $high_graduated = $_POST['hyear'];
//   $elem_name = $_POST['ename'];
//   $elem_graduated = $_POST['eyear'];
  
//   $sql2= "INSERT INTO educ_attainment`(college, program, cyear_grad, 
//                                         S_high, S_program, Syear_grad, 
//                                         J_high, Jyear_grad, 
//                                         elem, Eyear_grad) 
//                                 VALUES ('$college_name','$collegeprogram','$colleg_graduated',
//                                         '$senior_name','$senior_program ','$senior_graduated',
//                                         '$high_name','$high_graduated',
//                                         '$elem_name','$elem_graduated')";
  
  
  
  
//   //first_work_exp
//   $firstExpName = $_POST['company_name1'];
//   $firstExpAdd = $_POST['company_address1'];
//   $firstposition = $_POST['position1'];
//   $firstdate_start = $_POST['work_date_start1'];
//   $firstdate_end = $_POST['date_ended1'];
  
  
//   $sql3 = "INSERT INTO first_work_exp(work_date_start, date_ended, position, 
//                                         company_name, company_add) 
//                    VALUES ('$firstdate_start ','$firstdate_end','$firstposition',
//                            '$firstExpName','$firstExpAdd')";
  
  
//   //second_work_exp
//   $secondExpName = $_POST['company_name2'];
//   $secondExpAdd = $_POST['company_address2'];
//   $secondposition = $_POST['position2'];
//   $seconddate_start = $_POST['work_date_start2'];
//   $seconddate_end = $_POST['date_ended2'];
  
//   $sql4="INSERT INTO second_work_exp(work_date_start, date_ended, position, 
//                                        company_name, company_add) 
//                                   VALUES ('$seconddate_start','$seconddate_end','$secondposition',
//                                           '$secondExpName','$secondExpAdd')";
  
  
  
//   //third_work_exp
//   $thirdExpName = $_POST['company_name3'];
//   $thirdExpAdd = $_POST['company_address3'];
//   $thirdposition = $_POST['position3'];
//   $thirddate_start = $_POST['work_date_start3'];
//   $thirddate_end = $_POST['date_ended3'];
  
//   $sql5="INSERT INTO third_work_exp(work_date_start, date_ended, position, 
//                                       company_name, company_add) 
//                              VALUES  ('$thirddate_start','$thirddate_end ','$thirdposition',
//                                         '$thirdExpName','$thirdExpAdd')";
  
  
  
//   //character_reference
//   $cfirst = $_POST['cfname'];
//   $clast = $_POST['clname'];
//   $email_ref = $_POST['email_ref'];
//   $phone_ref = $_POST['phone_ref'];
//   $occu_ref = $_POST['occu_ref'];
  
//   $sql6="INSERT INTO character_reference(firstname, lastname, email, 
//                                            contact, occupation) 
//                                            VALUES ('$cfirst','$clast','$email_ref',
//                                               '$phone_ref','$occu_ref')";
  



// $query1 = mysqli_query($conn,$sql1);
// $query2 = mysqli_query($conn,$sql2);
// $query3= mysqli_query($conn,$sql3);
// $query4 = mysqli_query($conn,$sql4);
// $query5 = mysqli_query($conn,$sql5);

//   if($query1 && $query2 && $query3 && $query4 && $query5){
//     echo "<script>
//     Swal.fire({
//       title: 'Successfully Edited!',
//       icon: 'success',
//       confirmButtonText: 'OK'
//     }).then(() => {
//       window.location.href = 'dataTable.php';
//     });
//   </script>";

//   }else{
//     echo "<script>
//               Swal.fire({
//                 title: 'Applicant Not Edited',
//                 icon: 'error',
//                 confirmButtonText: 'OK'
//               }).then(() => {
//                 window.location.href = 'dataTable.php';
//               });
//             </script>";
//   }
// }

// ?>




</body>

</html>