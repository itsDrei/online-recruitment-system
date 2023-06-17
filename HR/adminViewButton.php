<?php
require 'mainConnect.php';
include 'adminViewCV.php';

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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/viewForm.css">
    <title>Employee Details</title>
  </head>
  <body>

  <div class="container">

  <div class="card-body" >

   <!-- APPLICANT_PEROSNAL_INFO -->   
                    
                    <?php
                         if(isset($_GET['applicant_number'])){
    
                           $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM applicant_perosnal_info WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run);
                            ?>
                            <br>
<div class="row" style="max-width: 90%; margin: 0 auto;"> 
      
      
<legend><b>PERSONAL INFORMATION
   <a style="margin-left:2%;" href="adminDatatable.php" class = "btn btn-danger float-end">Back</a>
   <a href="adminPDF.php?applicant_number=<?=$applicant['applicant_number'];?>" class = "btn btn-danger float-end" target="_blank">PDF</a>
   
   
   <a style="margin-right:2%;" href="adminViewCV.php?file_id=<?php echo $applicant['applicant_number']; ?>" class="btn btn-primary float-end">View CV</a>

  </b></legend>
 
           <div class="col-lg-4">
           <label  for="status"><b>Status:</b> <p class="form"><?=$applicant['applicant_status'];?></p></label>
           </div>
           <div class="col-lg-4">
           <label  for="date_apply"><b>Date Apply:</b> <p class="form"><?=$applicant['data_apply'];?></p></label>
           </div>

        <!--row 1-->   <div class="row">
<br>
  <div class="col-lg-4  ">
    <label  for="firstname"><b>Firstname:</b> <p class = "form"><?=$applicant['firstname'];?></p></label>
                </div>
  <br>
    <div class="col-lg-4">
      <label for="middlename"><B>Middle Name: </B><p class="form"><?=$applicant['middlename'];?></p></label>
    </div>
   
  <br>
    <div class=" col-lg-4">
      <label for="lastname"><b>lastname: </b><p class="form"><?=$applicant['lastname'];?></p></label>
    </div>
  </div>
            </div>  

            <br>
          <!--row 2-->   <div class="row">
            <div class="row" style="max-width: 90%; margin: 0 auto;"> 
    <div class="col-lg-4">
    <label for="bplace"><b>Birthplace: </b><p class="form"><?=$applicant['birthplace'];?></p></label>       
    </div>
  <br>
  <div class="col-lg-3">
  <label for="bdate"><b>Birhdate: </b><p class="form"><?=$applicant['birthdate'];?></p></label>
</div>
<br>
<div class="col-lg-2">
<label for="age"><b>age:</b> <p class="form"><?=$applicant['age'];?></p></label>
</div>
    <div class="col-lg-1">
    <label for="gender"><b>gender: </b><p class="form"><?=$applicant['gender'];?></p></label>
  </div>
  </div>
   </div>
<br>
             <!--row 3-->   <div class="row">
             <div class="row" style="max-width: 90%; margin: 0 auto;"> 
    <div class="col-lg-4">
    <label for="email"><b>Email Address: </b><p class="form"><?=$applicant['emails'];?></p></label>       
    </div>
  <br>
  <div class="col-lg-4">
  <label for="phone"><b>Contact Number: </b><p class="form"><?=$applicant['contact'];?></p></label>
</div>
<br>

    <div class="col-lg-4">
    <label for="civil"><b>Civil Status:</b> <p class="form"><?=$applicant['civil_status'];?></p></label>
  </div>
  </div>
   </div>
<br>


  <!--row 4-->  <div class="row" style="max-width: 90%; margin: 0 auto;"> <!--row 4-->
       <legend><b>ADDRESS:</b></legend>
       
      <div class="col-lg-2">
      <label for="state"><b>Province:</b> <p class="form"><?=$applicant['province'];?></p></label>
                           </div>
      <br>
      <div class="col-lg-2">
      <label for="city"><b>City:</b> <p class="form"><?=$applicant['city'];?></p></label>
      </div>
      <br>
      <div class="col-lg-3">
      <label for="state"><b>Barangay:</b> <p class="form"><?=$applicant['barangay'];?></p></label>
      </div>
      <br>
      <div class="col-lg-3">
      <label for="street"><b>Street:</b> <p class="form"><?=$applicant['street'];?></p></label>
      </div>
      <br>
      <div class="col-lg-2">
      <label for="postal"><b>Postal Code:</b> <p class="form"><?=$applicant['postal_code'];?></p></label>
      </div>

   </div>
   <br>




 <!--row 5-->  <div class="row" style="max-width: 90%; margin: 0 auto;"> <!--row 5-->
       <legend><b>Parent / Guardian:</b></legend>
       <div class="col-lg-4">
       <label for="f_name"><b>Father's Name:</b> <p class="form"><?=$applicant['father_name'];?></p></label>
       </div>
       <div class="col-lg-4">
       <label for="f_occu"><b>Father's occupation:</b> <p class="form"><?=$applicant['father_occu'];?></p></label>
       </div>
       </div>
      

       <div class="row" style="max-width: 90%; margin: 0 auto;"> <!--row 6-->
       <div class="col-lg-4">
        <label for="m_name"><b>Mother's Name:</b> <p class="form"><?=$applicant['mother_name'];?></p></label>
       </div>
       <div class="col-lg-4">
       <label for="m_occu"><b>Mother's occupation:</b> <p class="form"><?=$applicant['mother_occu'];?></p></label>
       </div>
       <div class="col-lg-4">
<br>
       </div>
       



                        <?php
                           }
                           else{
                            echo "No record found!";
                           }
                         }
                        
                    ?>

   <!-- EDUCATIONAL ATTAINMENT -->                 


<?php
                         if(isset($_GET['applicant_number'])){
    
                           $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM educ_attainment WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run);
                            ?>
                              
                              <br>
                              <legend><b>Educational Attainment:</b></legend>
  <div class="col-lg-4  ">
    <label  for="college"><b>College:</b> <p class = "form"><?=$applicant['college'];?></p></label>
                </div>
  <br>
    <div class="col-lg-4">
      <label for="program"><B>College course: </B><p class="form"><?=$applicant['program'];?></p></label>
    </div>
   
  <br>
    <div class=" col-lg-4">
      <label for="year grad"><b>Year graduated: </b><p class="form"><?=$applicant['cyear_grad'];?></p></label>
    </div>
  


                              <div class="col-lg-4  ">
    <label  for="shigh"><b>Senior High school:</b> <p class = "form"><?=$applicant['S_high'];?></p></label>
                </div>
  
    <div class="col-lg-4">
      <label for="sprogram"><B>Senior high course: </B><p class="form"><?=$applicant['S_program'];?></p></label>
    </div>
   
  
    <div class=" col-lg-4">
      <label for="sgrad"><b>Year graduated: </b><p class="form"><?=$applicant['Syear_grad'];?></p></label>
    </div>
  


                              <div class="col-lg-4  ">
    <label  for="firstname"><b>Junior high school:</b> <p class = "form"><?=$applicant['J_high'];?></p></label>
                </div>
  
    <div class=" col-lg-5">
      <label for="lastname"><b>Year graduated: </b><p class="form"><?=$applicant['Jyear_grad'];?></p></label>
    </div>

<br>
    <div class="col-lg-4  ">
    <label  for="firstname"><b>Elementary:</b> <p class = "form"><?=$applicant['elem'];?></p></label>
                </div>
  
    <div class=" col-lg-5">
      <label for="lastname"><b>Year graduated: </b><p class="form"><?=$applicant['Eyear_grad'];?></p></label>
    </div>
                
                              
                              <?php }else{ echo "No record found!";  }  }?>




<!--FIRST WORK EXPERIENCE-->

                              <?php
                         if(isset($_GET['applicant_number'])){
    
                           $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM first_work_exp WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run);
                            ?>
<legend><b>First Work Experience:</b></legend>

<div class=" col-lg-4">
      <label for="#"><b>Company Name: </b><p class="form"><?=$applicant['company_name'];?></p></label>
    </div>
  


        <div class="col-lg-4  ">
    <label  for="#"><b>Company Address:</b> <p class = "form"><?=$applicant['company_add'];?></p></label>
                </div>
  
    <div class=" col-lg-4">
      <label for="#"><b>Position: </b><p class="form"><?=$applicant['position'];?></p></label>
    </div>

<br>
    <div class="col-lg-4  ">
    <label  for="#"><b>Date Started::</b> <p class = "form"><?=$applicant['work_date_start'];?></p></label>
                </div>
  
                <div class="col-lg-4  ">
    <label  for="#"><b>Date Ended:</b> <p class = "form"><?=$applicant['date_ended'];?></p></label>
                </div>
                            <?php }else{ echo "No record found!";  }  }?>



                            <!--Second WORK EXPERIENCE-->

                            <?php
                         if(isset($_GET['applicant_number'])){
    
                           $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM second_work_exp WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run);
                            ?>
<legend><b>Second Work Experience:</b></legend>

<div class=" col-lg-4">
      <label for="#"><b>Company Name: </b><p class="form"><?=$applicant['company_name'];?></p></label>
    </div>
  


        <div class="col-lg-4  ">
    <label  for="#"><b>Company Address:</b> <p class = "form"><?=$applicant['company_add'];?></p></label>
                </div>
  
    <div class=" col-lg-4">
      <label for="#"><b>Position: </b><p class="form"><?=$applicant['position'];?></p></label>
    </div>

<br>
    <div class="col-lg-4  ">
    <label  for="#"><b>Date Started::</b> <p class = "form"><?=$applicant['work_date_start'];?></p></label>
                </div>
  
                <div class="col-lg-4  ">
    <label  for="#"><b>Date Ended:</b> <p class = "form"><?=$applicant['date_ended'];?></p></label>
                </div>
                            <?php }else{ echo "No record found!";  }  }?>



                            <!--THIRD WORK EXPERIENCE-->

                            <?php
                         if(isset($_GET['applicant_number'])){
    
                           $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM third_work_exp WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run);
                            ?>
<legend><b>Third Work Experience:</b></legend>

<div class=" col-lg-4">
      <label for="#"><b>Company Name: </b><p class="form"><?=$applicant['company_name'];?></p></label>
    </div>
  


        <div class="col-lg-4  ">
    <label  for="#"><b>Company Address:</b> <p class = "form"><?=$applicant['company_add'];?></p></label>
                </div>
  
    <div class=" col-lg-4">
      <label for="#"><b>Position: </b><p class="form"><?=$applicant['position'];?></p></label>
    </div>

<br>
    <div class="col-lg-4  ">
    <label  for="#"><b>Date Started::</b> <p class = "form"><?=$applicant['work_date_start'];?></p></label>
                </div>
  
                <div class="col-lg-4  ">
    <label  for="#"><b>Date Ended:</b> <p class = "form"><?=$applicant['date_ended'];?></p></label>
                </div>
                            <?php }else{ echo "No record found!";  }  }?>



<!--CHARACTER REFERENCE-->

<?php
                         if(isset($_GET['applicant_number'])){
    
                           $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM character_reference WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run);
                            ?>
<legend><b>Character Reference:</b></legend>

<div class=" col-lg-4">
      <label for="#"><b>Firstname: </b><p class="form"><?=$applicant['ref_firstname'];?></p></label>
    </div>
  


        <div class="col-lg-4  ">
    <label  for="#"><b>Lastname:</b> <p class = "form"><?=$applicant['ref_lastname'];?></p></label>
                </div>
  
    <div class=" col-lg-4">
      <label for="#"><b>Email: </b><p class="form"><?=$applicant['ref_email'];?></p></label>
    </div>

<br>
    <div class="col-lg-4  ">
    <label  for="#"><b>Contact Number:</b> <p class = "form"><?=$applicant['ref_contact'];?></p></label>
                </div>
  
                <div class="col-lg-4  ">
    <label  for="#"><b>Occupation:</b> <p class = "form"><?=$applicant['ref_occupation'];?></p></label>
                </div>
                            <?php }else{ echo "No record found!";  }  }?>


</div>

                    </div>

  </div>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html> 