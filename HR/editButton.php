<?php
require 'mainConnect.php';

session_start();
require 'mainConnect.php';
if (!isset($_SESSION['authenticated'])) {
  // If the user is not authenticated, show an empty page and exit
  echo "<script>alert('Please login first.')</script>";

  exit();
}

// Check if the user has the correct role
if ($_SESSION['role'] !== 'System Administrator') {
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
    <link rel="stylesheet" href="css/Update.css">
    <title>Form Edit</title>
  </head>
  <body>

<body>
   <div class="container mt-5">
  
    <?php include('message.php');?>
    <div class ="row"> 
        <div class ="col-md-15">
            <div class ="card">
                <div class="card-header">
                    <h4>
                        Set Status 
                        <a  onclick="window.location.href = document.referrer;"
   class="btn btn-danger float-end" class = "btn btn-danger float-end">Back</a>
                
                        
                
                    </h4>
                </div>
                
                <div class="card-body" >
       <form action="sysadEdit.php" method="POST">
       <?php
                     if(isset($_GET['applicant_number'])){

                       $reference_no= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                       $query = "SELECT * FROM applicant_perosnal_info WHERE applicant_number = '$reference_no'";
                       $query_run=mysqli_query($conn,$query);
                       if(mysqli_num_rows($query_run)>0){
                        $reference_no = mysqli_fetch_array($query_run);
                        
                        ?>

                    <button type="submit" name="update_status" class ="btn btn-primary float-end">Save Edit</button>
                    <div class="row" style="max-width: 90%; margin: 0 auto;"> 
                    <div class="mb-3">
                        <input type="hidden" name="reference_no" id="reference_no" value = "<?=$reference_no['applicant_number'];?>" class="form-control">
                        </label>      
                    </div>
                    
      <legend><b>Personal Information</b></legend>
      <div class="col-lg-4"></div>
            <div class="row"  style="max-width: 90%; margin: 0 auto;" >
            
            <label ><b>Set Status: </b> </label> 
                <select class="form-control" id="status" name="status_">
                <?php
        $query = "SELECT * FROM create_status";
        $query_run= mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run)>0){
            foreach($query_run as $create_status){
                ?>
                <option value="<?= $create_status['status_'];?>"><?= $create_status['status_'];?></option>
                <?php
            }
        }
        ?>
</select>

            </div>
            <br>
      
            
            
    <div class="row"  style="max-width: 90%; margin: 0 auto;" >
    <div class="col-lg-4">
      <br>
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" name="fname" id="userName" value = "<?=$reference_no['firstname'];?>" readonly>        
    </div>
  <br>
    <div class="col-lg-4">
      <br>
      <label for="middlename">Middle Name:</label>
      <input type="text" class="form-control" name="mname" id="userLastName" value = "<?=$reference_no['middlename'];?>"  readonly>
    </div>
  <br>
    <div class=" col-lg-4">
      <br>
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" name="lname" id="lname1" value = "<?=$reference_no['lastname'];?>"  readonly>
    </div>
  </div>
  <br>
  <br>
  <!-- BIRTHDAYS -->
 <div class="row" style="max-width: 90%; margin: 0 auto;"> 
    <div class="col-lg-4">
      <label for="birthplace">Birthplace:</label>
      <input type="text" class="form-control" name="bplace" id="bplace" value = "<?=$reference_no['birthplace'];?>"  readonly>        
    </div>
  <br>
  <div class="col-lg-3">
  <label for="Birthdate">Birthdate:</label>
  <input type="date" class="form-control" name="birthdate" id="birthdate" value = "<?=$reference_no['birthdate'];?>" readonly>
</div>
<br>
<div class="col-lg-2">
  <label for="Age">Age:</label>
  <input type="text" class="form-control" name="age" id="age" placeholder="Age" value = "<?=$reference_no['age'];?>" class="form-control" readonly>
</div>
    <div class="col-lg-3">
    <label for="gender">Gender:</label>
    <select class="form-control" id="gender" name="gender" readonly>
  <option value="secret"disabled selected><?php echo $reference_no['gender']?></option >
  <option value="male" <?php if ($reference_no['gender'] === 'Male') { echo 'selected'; } ?>>Male</option>
  <option value="female" <?php if ($reference_no['gender'] === 'Female') { echo 'selected'; } ?>>Female</option>
  <option value="other" <?php if ($reference_no['gender'] === 'Other') { echo 'selected'; } ?>>Other</option>
</select>
        </div>
  </div>
 <br>
 <br>
 <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        
        <div class="col-lg-4">
          <label for="email">Email:</label>
              <input class="form-control"type="email"id="emailAdd"name="email"value = "<?=$reference_no['emails'];?>" readonly/>
        </div>
        <div class="col-lg-4">
          <label for="number">Contact Number:</label>
              <input class="form-control" type="tel" id="phone" name="phone" value = "<?=$reference_no['contact'];?>" pattern="[0-9]{11}" readonly/>
        </div>
        <div class="col-lg-4">
  <label for="status">Civil Status:</label>
  <select class="form-control" id="civil-status" name="civil" readonly>
  <option value="secret"disabled selected><?php echo $reference_no['civil_status']?></option>
    <option value="single" <?php if($reference_no['civil_status'] === 'Single') {echo 'selected';} ?>>Single</option>
    <option value="married" <?php if($reference_no['civil_status'] === 'Married') {echo 'selected';} ?>>Married</option>
    <option value="widowed" <?php if($reference_no['civil_status'] === 'Widowed') { echo 'selected';}?>>Widowed</option>
    <option value="divorced" <?php if($reference_no['civil_status'] === 'Divorced') {echo 'selected'; }?>>Divorced</option>
  </select>
</div>

        </div>
        <br> 
        <br> 

 <div class="row" style="max-width: 90%; margin: 0 auto;"> 
       <legend>Address</legend>
       <div class="col-lg-2">
          <label for="province/state">Province/State:</label>
              <input class="form-control" type="text" id="province" name="province" value = "<?=$reference_no['province'];?>" readonly/>
        </div>
        <div class="col-lg-2">
          <label for="city">City:</label>
              <input class="form-control" type="text" id="city" name="city" value = "<?=$reference_no['city'];?>" readonly/>
        </div>
        <div class="col-lg-3">
          <label for="baranggay">Baranggay:</label>
          <input class="form-control" type="text" id="baranggay" name="baranggay" value = "<?=$reference_no['barangay'];?>" readonly/>
        </div>
        <div class="col-lg-3">
          <label for="address">Street Address:</label>
              <input class="form-control" type="text" id="street-address" name="street" value = "<?=$reference_no['street'];?>" readonly/>
        </div>
        <div class="col-lg-2">
          <label for="postal">Enter Postal Code:</label>
              <input class="form-control" type="tel" id="postal-code" name="postal" value = "<?=$reference_no['postal_code'];?>" readonly/>
        </div>
       
  </div>
        
        <br> 
       <div class="row" style="max-width: 90%; margin: 0 auto;">  
         <legend>Parent / Guardian</legend>
        <div class="col-lg-4">
          <label for="father">Father's Full Name:</label>
              <input class="form-control" type="text" id="father-name" name="father"value = "<?=$reference_no['father_name'];?>" readonly/>
        </div>
        <div class="col-lg-4">
          <label for="fatherOccupation">Father Occupation:</label>
              <input class="form-control" type="text"id="f_occu"name="f_occu" value = "<?=$reference_no['father_occu'];?>"readonly/>
        </div>
           </div>
        <br> 
        <br> 
        <div class="row" style="max-width: 90%; margin: 0 auto;"> <!--row 7-->
        <div class="col-lg-4">
                 <label for="mother">Mother's Full Name:</label>
              <input class="form-control" type="text" id="mother-name" value = "<?=$reference_no['mother_name'];?>" name="mother" readonly/>
        </div>
        <div class="col-lg-4">
           <label for="motherOccupation">Mother Occupation:</label>
              <input class="form-control" type="text" id="m_occu" name="m-occu" value = "<?=$reference_no['mother_occu'];?>"readonly/>
        </div>
        </div>
        
        <?php
                       }
                       else{
                        echo "no record found";
                       }
                       
                     }
                     ?>
        <br>
        <br>


        <?php  if(isset($_GET['applicant_number'])){ $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM educ_attainment WHERE applicant_number= '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run); ?>

        <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        <legend>College:</legend>
        <div class="col-lg-4">
          <label for="collegeName">College Name:</label>
          <input class="form-control" type="text" id="cname" name="cname" value = "<?=$applicant['college'];?>" readonly/>
        </div>
        <div class="col-lg-4">
          <label for="program">Study Program:</label>
          <input class="form-control" type="text" id="cprogram" name="cprogram" value = "<?=$applicant['program'];?>" readonly/>
        </div>
        <div class="col-lg-2">
          <label for="year">Year Graduated:</label>
          <input class="form-control" type="date" id="cyear" name="cyear" value = "<?=$applicant['cyear_grad'];?>" readonly/>
        </div>
        </div>
        <br> 
        <br> 
    <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        <legend>Senior High School:</legend>
        <div class="col-lg-4">
          <label for="collegeName">Senior High School Name:</label>
          <input class="form-control" type="text" id="school-name" name="sname" value = "<?=$applicant['S_high'];?>"readonly/>
        </div>
        <div class="col-lg-4">
          <label for="program">Study Program:</label>
          <input class="form-control" type="text" id="study-program" name="sprogram" value = "<?=$applicant['S_program'];?>" readonly/>
        </div>
        <div class="col-lg-2">
          <label for="year">Year Graduated:</label>
          <input class="form-control" type="date" id="year-graduated" name="syear" value = "<?=$applicant['Syear_grad'];?>"readonly/>
        </div>
          
        </div>
        <br>
         <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        <legend>HighSchool:</legend>
       
        <div class="col-lg-4">
        <label for="collegeName">College Name:</label>  
          <input class ="form-control"type="text" id="school-name" name="hname" value = "<?=$applicant['J_high'];?>"readonly/>
        </div>
        <div class="col-lg-2">
          <label for="program">Year Graduated:</label>  
          <input  class ="form-control" type="date" id="year-graduated" name="hyear"value = "<?=$applicant['Jyear_grad'];?>" readonly/>
        </div>
  
        </div>
        <br>
         <div class="row" style="max-width: 90%; margin: 0 auto;"> 
          <legend>Elementary:</legend>
        <div class="col-lg-4">
        <label for="school-name">School Name:</label>
          <input  class ="form-control"type="text" id="school-name" name="ename" value = "<?=$applicant['elem'];?>"readonly/>
        </div>
        <div class="col-lg-2">
          <label for="year-graduated">Year Graduated:</label>
          <input class ="form-control" type="date" id="year-graduated" name="eyear" value = "<?=$applicant['Eyear_grad'];?>" readonly/>
        </div>

        <?php }else{ echo "No record found!";  }  }?>
        
        </div>
        <br>
        <br>

        <?php if(isset($_GET['applicant_number'])){ $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM first_work_exp WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run); ?>
       <div class="row" style="max-width: 90%; margin: 0 auto;"> 
          <legend>Work Experience</legend>
          <br>
          <br>
          <legend>First work</legend>
             <div class="col-lg-4">
            <label>Company Name:</label>
            <input type="text" name="company_name1" id="name" class="form-control" value = "<?=$applicant['company_name'];?>" readonly>
          </div>
           <div class="col-lg-4">
            <label>Company Address:</label>
            <input type="text" name="company_address1" id="address" class="form-control" value = "<?=$applicant['company_add'];?>"readonly>
          </div>
          <div class="col-lg-4" style="margin-bottom:2%;">
            <label>Position:</label>
            <input type="text" name="position1" id="position1" class="form-control" value = "<?=$applicant['position'];?>"readonly>
          </div>
          <div class="col-lg-2">
            <label>Date Started:</label>
            <input type="date" name="work_date_start1" id="work_start" class="form-control" value = "<?=$applicant['work_date_start'];?>"readonly>
          </div>
          <div class="col-lg-2">
            <label>Date Ended:</label>
            <input type="date" name="date_ended1" id="work_end"class="form-control"  value = "<?=$applicant['date_ended'];?>"readonly>
          </div>
        </div>

        <?php }else{ echo "No record found!";  }  }?>


        <br>
        <?php if(isset($_GET['applicant_number'])){ $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM second_work_exp WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run); ?>
       <div class="row" style="max-width: 90%; margin: 0 auto;"> 
          <legend>Work Experience</legend>
          <br>
          <br>
          <legend>Second Work Expeirence</legend>
             <div class="col-lg-4">
            <label>Company Name:</label>
            <input type="text" name="company_name2" id="name" class="form-control" value = "<?=$applicant['company_name'];?>" readonly>
          </div>
           <div class="col-lg-4">
            <label>Company Address:</label>
            <input type="text" name="company_address2" id="address" class="form-control" value = "<?=$applicant['company_add'];?>"readonly>
          </div>
          <div class="col-lg-4" style="margin-bottom:2%;">
            <label>Position:</label>
            <input type="text" name="position2" id="position2" class="form-control" value = "<?=$applicant['position'];?>"readonly>
          </div>
          <div class="col-lg-2">
            <label>Date Started:</label>
            <input type="date" name="work_date_start2" id="work_start" class="form-control" value = "<?=$applicant['work_date_start'];?>"readonly>
          </div>
          <div class="col-lg-2">
            <label>Date Ended:</label>
            <input type="date" name="date_ended2" id="work_end"class="form-control"  value = "<?=$applicant['date_ended'];?>"readonly>
          </div>
        </div>

        <?php }else{ echo "No record found!";  }  }?>
        <br>



        <?php if(isset($_GET['applicant_number'])){ $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM third_work_exp WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run); ?>
       <div class="row" style="max-width: 90%; margin: 0 auto;"> 
          <legend>Work Experience</legend>
          <br>
          <br>
          <legend>First work</legend>
             <div class="col-lg-4">
            <label>Company Name:</label>
            <input type="text" name="company_name3" id="name" class="form-control" value = "<?=$applicant['company_name'];?>" readonly>
          </div>
           <div class="col-lg-4">
            <label>Company Address:</label>
            <input type="text" name="company_address3" id="address" class="form-control" value = "<?=$applicant['company_add'];?>"readonly>
          </div>
          <div class="col-lg-4" style="margin-bottom:2%;">
            <label>Position:</label>
            <input type="text" name="position3" id="position3" class="form-control" value = "<?=$applicant['position'];?>"readonly>
          </div>
          <div class="col-lg-2">
            <label>Date Started:</label>
            <input type="date" name="work_date_start3" id="work_start" class="form-control" value = "<?=$applicant['work_date_start'];?>"readonly>
          </div>
          <div class="col-lg-2">
            <label>Date Ended:</label>
            <input type="date" name="date_ended3" id="work_end"class="form-control"  value = "<?=$applicant['date_ended'];?>"readonly>
          </div>
        </div>

        <?php }else{ echo "No record found!";  }  }?>


        <br>
        <br>

        <?php if(isset($_GET['applicant_number'])){ $applicant= mysqli_real_escape_string($conn,$_GET['applicant_number']);
                           $query = "SELECT * FROM character_reference WHERE applicant_number = '$applicant'";
                           $query_run=mysqli_query($conn,$query);
                           if(mysqli_num_rows($query_run)>0){
                            $applicant = mysqli_fetch_array($query_run); ?>
     <div class="row" style="max-width: 90%; margin: 0 auto;"> 
            <legend>Character Reference</legend>
            <div class="col-lg-4">
            <label for="email">First name:</label>
            <input class="form-control" type="text  " name="cfname" id="rfname" value = "<?=$applicant['ref_firstname'];?>"readonly>
          </div>
          <div class="col-lg-4">
            <label for="email">Last name:</label>
            <input class="form-control" type="text  " name="clname" id="rlname" value = "<?=$applicant['ref_lastname'];?>"readonly>
          </div>
           <div class="col-lg-4">
            <label for="email">Email address:</label>
            <input class="form-control" type="text  " name="email_ref" id="email" value = "<?=$applicant['ref_email'];?>"readonly> <br>
          </div>
           <div class="col-lg-4">
            <label for="number">Contact Number:</label>
            <input class="form-control" type="tel" name="phone_ref" id="email" value = "<?=$applicant['ref_contact'];?>"readonly>
          </div>
           <div class="col-lg-4" style="margin-bottom:5%;">
            <label for="occupation">Occupation:</label>
            <input class="form-control" type="text" name="occu_ref" id="email" value = "<?=$applicant['ref_occupation'];?>"readonly>
          </div>
           <div class="col-lg-4" style="margin-bottom:5%;">
            
           <?php } else{ echo "No record found!";  }  }?>
<br>
                 
                    </form>
                    
                    
              
                </div>
            </div>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>