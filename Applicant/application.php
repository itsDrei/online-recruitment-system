<?php
require 'mainConnect.php';
session_start();
/**
 * Creates a token usable in a form
 * @return string
 */
function getToken(){
  $token = sha1(mt_rand());
  if(!isset($_SESSION['tokens'])){
    $_SESSION['tokens'] = array($token => 1);
  }
  else{
    $_SESSION['tokens'][$token] = 1;
  }
  return $token;
}

/**
 * Check if a token is valid. Removes it from the valid tokens list
 * @param string $token The token
 * @return bool
 */
function isTokenValid($token){
  if(!empty($_SESSION['tokens'][$token])){
    unset($_SESSION['tokens'][$token]);
    return true;
  }
  return false;
}

// Check if a form has been sent
$postedToken = filter_input(INPUT_POST, 'token');
if(!empty($postedToken)){
  if(isTokenValid($postedToken)){
    // Process form
  }
  else{
    // Do something about the error
  }
}

// Get a token for the form we're displaying
$token = getToken();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Form</title>
    <link rel="icon" href="images/aoe.png">
    <link rel="stylesheet" href="app.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <script src="birthday.js" defer></script>
    <script src="validation.js" defer></script>
    <script src="Validations.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap CSS and JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/XpZ4y3RSKB8kSk" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Include the SweetAlert library using a CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<style>
  .modal-content{
    width:250%;
    position:absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,1%);
  }
  @media only screen and (min-width: 320px) and (max-width: 480px) {
  /* styles for phone screens */
  .modal-content{
    width:100%;
    position:absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,1%);
  }
}
span{
  color:red;
}
</style>
    <body>
  
    <header>
      <a href="index.php"><img src="images/aoe.png" class="logo" /></a>
        <div class="comDetails">
          <p class="compName">
            Academy of Operation Excellence and Services Inc.
          </p>
        </div>
      </header>

  <form id="myForm" class="needs-validation" novalidate action="applicationConnect.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="token" value="<?php echo $token;?>"/>


 <!-- PERSONAL INFORMATION ROW -->
 <div class="row" style="max-width: 90%; margin: 0 auto;"> 

  <div style="margin-bottom:3%;" class="row">
  <?php if(isset($_POST['job'])){ 
      $jobt=$_POST['jobt'];?>
 <h2><label for="userName" class="form-label">Job Position:</label><?php echo" $jobt";?></h2>
 <input type="hidden" name ="jobt" value="<?= $jobt?>">
      
<?php }?>
  </div>

  <legend>Personal Information</legend>
  <div class="col-lg-4">
  <label for="userName" class="form-label">First Name <span>&#42;</span></label>
  <input type="text" class="form-control" id="userName" name="fname" placeholder="Enter first name e.g Juan" minlength="3" maxlength="31" pattern="[A-Za-z-Ññ ]+" required>
  <div class="invalid-feedback">Please enter a valid first name.</div>
</div>

  <br>
  <div class="col-lg-4">
  <label for="middlename">Middle Name<span>&#42;</span></label>
  <input type="text" class="form-control" name="mname" id="userLastName" placeholder="Enter middle Initial e.g R." minlength="1" maxlength="31" pattern="[A-Za-z-/. ]" >
  <div class="invalid-feedback">Please enter a valid middle initial.</div>
</div>
  <div class="col-lg-4">
    <label for="lastname">Last Name <span>&#42;</span></label>
    <input type="text" class="form-control" name="lname" id="email1" placeholder="Enter last name e.g Dela Cruz" minlength="1" maxlength="31" pattern="[A-Za-z-Ññ ]+" required>
    <div class="invalid-feedback">Please enter your last name</div>
  </div>
</div>
<br>
<br>
  <!-- BIRTHDAYS -->
 <div class="row" style="max-width: 90%; margin: 0 auto;"> 
    <div class="col-lg-4">
      <label for="birthplace">Birthplace <span>&#42;</span></label>
      <input type="text" class="form-control" name="bplace" id="bplace" placeholder = "Enter Birthplace" minlength="3" maxlength="31" pattern="[A-Za-z-Ññ ]+" required>  
      <div class="invalid-feedback">Please enter valid birthplace</div>      
    </div>
  <br>
  <div class="col-lg-3">
  <label for="Birthdate">Birthdate <span>&#42;</span></label>
  <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Enter birthdate" required>
  <div class="invalid-feedback">Please enter valid birthdate</div>
  
</div>
<br>
<div class="col-lg-2">
  <label for="Age">Age <span>&#42;</span></label>
  <input type="text" class="form-control" name="age" id="age" placeholder="Age" readonly>
  <div id="age-feedback" class="invalid-feedback">You must be at least 18 years old above!</div>
</div>
    <div class="col-lg-3">
          <label for="gender">Gender <span>&#42;</span></label>
              <select class="form-control" id="gender" name="gender"  required>
              <option value="" disabled selected>Please Select a Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Rather Not Say">Rather Not Say</option>
              </select>
              <div class="invalid-feedback">Please enter your gender</div>
        </div>
  </div>
 <br>
 <br>
 <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        
 <div class="col-lg-4">
    <label for="emails">Email <span>&#42;</span></label>
    <input class="form-control" type="email" id="emails" name="emails" placeholder="example@example.com"  minlength="8" maxlength="50" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
 required />
    <div class="invalid-feedback">Please enter a valid email address</div>
</div>

<div class="col-lg-4">
  <label for="number">Contact Number <span>&#42;</span></label>
  <input class="form-control" type="tel" id="phone" name="number" placeholder="Enter cellphone or telephone number"  minlength="8" pattern="^(\+63|0)?(2|3[0-9]{2}|4[0-9]{2}|5[0-9]{2}|6[0-9]{2}|7[0-9]{2}|8[0-9]{2}|9[0-9]{2})?[0-9]{7}$" required/>
  <div class="invalid-feedback">Please enter a valid Contact Number</div>
</div>

         <div class="col-lg-4">
          <label for="status">Civil Status <span>&#42;</span></label>
              <select class="form-control" id="civil-status" name="civil" required>
                <option value="" disabled selected>Please Select Civil Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Legally Seperated">Legally seperated</option>
              </select>
              <div class="invalid-feedback">Please enter your Civil Status</div>
        </div>
        </div>
        <br> 
        <br> 

 <div class="row" style="max-width: 90%; margin: 0 auto;"> 
       <legend>Current  Address <span>&#42;</span></legend>
       <div class="col-lg-2">
          <label for="province/state">Province/Region <span>&#42;</span></label>
              <input class="form-control" type="text" id="province" name="province" placeholder="Enter Province/Region"  minlength="3" maxlength="15" pattern="[A-Za-z-Ññ ]+"  required/>
              <div class="invalid-feedback">Please enter a valid Province / State</div>
        </div>
        <div class="col-lg-2">
          <label for="city">City/Municipality <span>&#42;</span></label>
              <input class="form-control" type="text" id="city" name="city" placeholder="Enter City/Municipality" minlength="3" maxlength="15" pattern="[A-Za-z-Ññ ]+" required/>
              <div class="invalid-feedback">Please enter a valid City</div>
        </div>
        <div class="col-lg-3">
          <label for="baranggay">Barangay <span>&#42;</span></label>
          <input class="form-control" type="text" id="baranggay" name="baranggay" placeholder="Enter Baranggay" minlength="1" maxlength="20" pattern="[A-Za-z-Ññ ]+" required/>
          <div class="invalid-feedback">Please enter a valid Baranggay</div>
        </div>
        <div class="col-lg-3">
          <label for="address">Street Address <span>&#42;</span></label>
              <input class="form-control" type="text" id="street-address" name="street" placeholder="Enter Street Address" minlength="3" maxlength="40" pattern="[a-zA-Z0-9Ññ#._%+,- ]$"
 required/>
              <div class="invalid-feedback">Please enter a valid Address</div>
        </div>
        <div class="col-lg-2">
          <label for="postal">Enter Postal Code:<span></span></label>
              <input class="form-control" type="tel" id="postal-code" name="postal" placeholder="Enter Postal Code" maxlength="4" pattern="[0-9]+" />
              <div class="invalid-feedback">Please Enter valid Postal Code</div>
        </div>
       
  </div>
        
        <br> 
       <div class="row" style="max-width: 90%; margin: 0 auto;"> 
         <legend>Parent / Guardian: <span style="font-size:13px;">(Put N/A if not applicable)</span></legend>
        <div class="col-lg-4">
          <label for="father">Father's Full Name:</label>
              <input class="form-control" type="text" id="father-name" name="father" minlength="3" maxlength="31" pattern="[A-Za-z/. ]+" placeholder="Enter Full Name " />
              <div class="invalid-feedback">Please Enter a Valid Name</div>
            </div>
        <div class="col-lg-4">
          <label for="fatherOccupation">Father Occupation:</label>
              <input class="form-control" type="text"id="f_occu"name="f_occu" placeholder="Enter Father's Occupation" minlength="3" maxlength="31" pattern="[A-Za-z/ ]+" />
              <div class="invalid-feedback">Please Enter a Valid Occupation</div>
            </div>
           </div>
        <br> 
        <br> 
        <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        <div class="col-lg-4">
                 <label for="mother">Mother's Full Name:</label>
              <input class="form-control" type="text" id="mother-name" placeholder="Enter Full Name" name="mother" minlength="3" maxlength="31" pattern="[A-Za-z/ ]+" />
              <div class="invalid-feedback">Please Enter a Valid Name</div>
            </div>
        <div class="col-lg-4">
           <label for="motherOccupation">Mother Occupation:</label>
              <input class="form-control" type="text" id="m_occu" name="m_occu" placeholder="Enter Mother's Occupation"  minlength="3" maxlength="31" pattern="[A-Za-z/ ]+"/>
              <div class="invalid-feedback">Please Enter a Valid Occupation</div>
            </div>
        </div>
        <br>
        <br>
        <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        <legend>Educational Attainment <span style="font-size:13px;">(Enter the Latest School Attented / Put N/A if not applicable)</span></legend>
        <legend>College:</legend>
        <div class="col-lg-4">
          <label for="collegeName">College School Name:</label>
          <input class="form-control" type="text" id="cname" name="cname" placeholder="Enter College School Name"  minlength="3" maxlength="50" pattern="[A-Za-z./ ]+" />
          <div class="invalid-feedback">Please enter a valid school name.</div>
        </div>
        <div class="col-lg-4">
          <label for="program">Study Program:</label>
          <input class="form-control" type="text" id="cprogram" name="cprogram" placeholder = "Enter Study Program"  minlength="3" maxlength="31" pattern="[A-Za-z./ ]+" />
          <div class="invalid-feedback">Please enter a valid study program.</div>
        </div>
        <div class="col-lg-2">
          <label for="year">Year Graduated:</label>
          <input class="form-control" type="date" id="cyear" name="cyear" placeholder="Enter Year Graduated"pattern="\d{2}/\d{2}/\d{4}" />
        </div>
        </div>
        <br> 
        <br> 
    <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        <legend>Senior High School:</legend>
        <div class="col-lg-4">
          <label for="collegeName">Senior High School Name:</label>
          <input class="form-control" type="text" id="school-name" name="sname" placeholder="Enter Senior High School Name" minlength="3" maxlength="50" pattern="[A-Za-z./ ]+"/>
          <div class="invalid-feedback">Please enter a valid school name.</div>
        </div>
        <div class="col-lg-4">
          <label for="program">Study Program / Track:</label>
          <input class="form-control" type="text" id="study-program" name="sprogram" placeholder="Enter Study Program" minlength="3" maxlength="31"  pattern="[A-Za-z./ ]+"/>
          <div class="invalid-feedback">Please enter a valid Study Program / Track.</div>
        </div>
        <div class="col-lg-2">
          <label for="year">Year Graduated:</label>
          <input class="form-control" type="date" id="year-graduated" name="syear" placeholder="Enter Year Grasuated" />
        </div>
          
        </div>
        <br>
         <div class="row" style="max-width: 90%; margin: 0 auto;"> 
        <legend>HighSchool:</legend>
       
        <div class="col-lg-4">
        <label for="collegeName">School Name:</label>  
          <input class ="form-control"type="text" id="school-name" name="hname" placeholder="Enter School name"  minlength="3" maxlength="50" pattern="[A-Za-z./ ]+"/>
          <div class="invalid-feedback">Please enter a valid school name.</div>
        </div>
        <div class="col-lg-2">
          <label for="program">Year Graduated:</label>  
          <input  class ="form-control" type="date" id="year-graduated" name="hyear" placeholder="Enter Year Graduated" />
        </div>
  
        </div>
        <br>
         <div class="row" style="max-width: 90%; margin: 0 auto;"> 
          <legend>Elementary:</legend>
        <div class="col-lg-4">
        <label for="school-name">School Name:</label>
          <input  class ="form-control"type="text" id="school-name" name="ename" placeholder = "Enter Name of School"  minlength="3" maxlength="50" pattern="[A-Za-z./ ]+"/>
          <div class="invalid-feedback">Please enter a valid school name.</div>
        </div>
        <div class="col-lg-2">
          <label for="year-graduated">Year Graduated:</label>
          <input class ="form-control" type="date" id="year-graduated" name="eyear" />
        </div>
        
        </div>
        <br>
        <br>
        <div class="row" style="max-width: 90%; margin: 0 auto;"> 
  <legend>Work Experience: <span style="font-size:13px;">(Put N/A if not applicable)</span></legend>
  <br>
  <br>
  <div class="row work-experience" id="work-experience-1">
    <legend>First work</legend>
    <div class="col-lg-4">
      <label>Company Name:</label>
      <input type="text" name="company_name1" id="name" class="form-control" placeholder="Enter Company Name" minlength="3" maxlength="50" pattern="[A-Za-z0-9./ ]+">
      <div class="invalid-feedback">Please enter a valid company name.</div>
    </div>
    <div class="col-lg-4">
      <label>Company Address:</label>
      <input type="text" name="company_address1" id="address" class="form-control" placeholder="Enter Company Address" minlength="3" maxlength="60" pattern="[A-Za-z0-9.,#/ ]+">
      <div class="invalid-feedback">Please enter a valid company address.</div>
    </div>
    <div class="col-lg-4" style="margin-bottom:2%;">
      <label>Position:</label>
      <input type="text" name="position1" id="position1" class="form-control" placeholder="Enter Position" minlength="3" maxlength="30" pattern="[A-Za-z./ ]+">
      <div class="invalid-feedback">Please enter a valid position.</div>
    </div>
    <div class="col-lg-2">
      <label>Date Started:</label>
      <input type="date" name="work_date_start1" id="work_start" class="form-control">
    </div>
    <div class="col-lg-2">
      <label>Date Ended:</label>
      <input type="date" name="date_ended1" id="work_end" class="form-control">
    </div>
  </div>
  <br>
  <div class="col-12 col-md-6">
    <a href="#" id="showSecond" class="add-work-experience btn btn-outline-info" data-work-experience="2"
    style="margin-top:2%; ">Add More Work Experience</a>
  </div>
  <div class="row work-experience" id="work-experience-2" style="display:none;"> 
    <legend style="margin-top:5%">Second Work</legend>
    <div class="col-lg-4">
      <label>Company Name:</label>
      <input type="text" name="company_name2" id="name" class="form-control" placeholder="Enter Company Name" minlength="3" maxlength="50" pattern="[A-Za-z0-9./ ]+">
      <div class="invalid-feedback">Please enter a valid company name.</div>
    </div>
    <div class="col-lg-4">
      <label>Company Address:</label>
      <input type="text" name="company_address2" id="address" class="form-control" placeholder="Enter Company Address" minlength="3" maxlength="60"pattern="[A-Za-z0-9.,#/ ]+">
      <div class="invalid-feedback">Please enter a valid company address.</div>
    </div>
    <div class="col-lg-4" style="margin-bottom:2%;">
      <label>Position:</label>
      <input type="text" name="position2" id="position" class="form-control" placeholder="Enter Position" minlength="3" maxlength="30" pattern="[A-Za-z./ ]+">
      <div class="invalid-feedback">Please enter a valid position.</div>
    </div>
    <div class="col-lg-2">
      <label>Date Started:</label>
      <input type="date" name="work_date_start2" id="work_start" class="form-control">
    </div>
    <div class="col-lg-2">
      <label>Date Ended:</label>
      <input type="date" name="date_ended2" id="work_end" class="form-control">
    </div>
    <div class="row">
  <div class="col-12 col-md-6">
  <a href="#" id="showThird" class="add-work-experience btn btn-outline-info" data-work-experience="3" style="margin-top:2%;" >Add More Work Experience</a>
  </div>
</div>
  </div>
  <br>
  <div class="row work-experience" id="work-experience-3" style="display:none;"> 
    <legend style="margin-top:5%">Third Work</legend>
    <div class="col-lg-4">
      <label>CompanyName:</label>
<input type="text" name="company_name3" id="name" class="form-control" placeholder="Enter Company Name" minlength="3" maxlength="50" pattern="[A-Za-z0-9./ ]+">
<div class="invalid-feedback">Please enter a valid company name.</div>
</div>
<div class="col-lg-4">
<label>Company Address:</label>
<input type="text" name="company_address3" id="address" class="form-control" placeholder="Enter Company Address" minlength="3" maxlength="60" pattern="[A-Za-z0-9.,#/ ]+">
<div class="invalid-feedback">Please enter a valid company address.</div>
</div>
<div class="col-lg-4" style="margin-bottom:2%;">
<label>Position:</label>
<input type="text" name="position3" id="position" class="form-control" placeholder="Enter Position" minlength="3" maxlength="30" pattern="[A-Za-z./ ]+">
<div class="invalid-feedback">Please enter a valid position.</div>
</div>
<div class="col-lg-2">
<label>Date Started:</label>
<input type="date" name="work_date_start3" id="work_start" class="form-control">
</div>
<div class="col-lg-2">
<label>Date Ended:</label>
<input type="date" name="date_ended3" id="work_end" class="form-control">
</div>
</div>
  </div>

        <br>
        <br>
  
     <div class="row" style="max-width: 90%; margin: 0 auto;"> 
            <legend>Character Reference: <span style="font-size:13px;">(Put N/A if not applicable)</span></legend>
            <div class="col-lg-4">
            <label for="email">First name:</label>
            <input class="form-control" type="text" name="cfname" id="email" placeholder="Enter Firstname e.g juan" minlength="3" maxlength="31" pattern="[A-Za-z/ ]+">
            <div class="invalid-feedback">Please enter a valid first name.</div>
          </div>
          <div class="col-lg-4">
            <label for="email">Last name:</label>
            <input class="form-control" type="text" name="clname" id="email" placeholder="Enter Last name e.g dela cruz" minlength="2" maxlength="31" pattern="[A-Za-z/ ]+">
            <div class="invalid-feedback">Please enter a valid last name.</div>
            <br>
          </div>
           <div class="col-lg-4">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email_ref" id="email" placeholder="Enter Email e.g juan@gmail.com"  minlength="8" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
            <div class="invalid-feedback">Please enter a valid email.</div>
          </div>
           <div class="col-lg-4">
            <label for="number">Contact Number:</label>
              <input class="form-control" type="tel" id="phone" name="phone_ref" placeholder="Enter cellphone or telephone number"  minlength="8" pattern="^(\+63|0)?(2|3[0-9]{2}|4[0-9]{2}|5[0-9]{2}|6[0-9]{2}|7[0-9]{2}|8[0-9]{2}|9[0-9]{2})?[0-9]{7}$"/>
              <div class="invalid-feedback">Please Proper Contact Number</div>
          </div>
           <div class="col-lg-4" style="margin-bottom:5%;">
            <label for="occupation">Occupation:</label>
            <input class="form-control" type="text" name="occu_ref" id="email" placeholder="Enter Occupation" minlength="3" maxlength="31" pattern="[A-Za-z/ ]+">
            <div class="invalid-feedback">Please enter a valid occupation.</div>
          </div>

</div>


<div class="row"  style="max-width: 90%; margin: 0 auto;">

<div class="row ">
<div class="col-lg-4">
  <label for="cv">Upload Resume Here:</label>
  <input accept=".pdf,.doc,.docx" style="background:#ECEFF1; padding:8px  15px; border-radius:50px;" type="file" class="form-control-file" id="cv" name="cv_file"
    required
    onchange="if(this.files[0].size > 1000000){this.setCustomValidity('File size must be less than 1 MB');} else if(!/\.pdf$|\.docx?$|\.doc?$/.test(this.value)){this.setCustomValidity('Please upload a PDF or DOCX file only'); this.value='';} else{this.setCustomValidity('');}"
    >
  <div class="invalid-feedback">Please upload a resume</div>
  <div class="valid-feedback">Resume uploaded</div>
  <div class="invalid-feedback">File size must be less than 1 MB</div>
  <div class="invalid-feedback">Please upload a PDF or DOCX file only</div>
</div>

</div>


    
  <div class="row"> 
    <div class="col-lg-4">
    <button style="margin-top:3%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="checkBtn">Check</button>
  </div>
</div>

<!-- Modal -->
<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header form-control">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
            <!-- Content -->

            </div> 
            <div class="modal-footer row">
            <div class="row"> 
    <div class="col-lg-4">
      <h2>Terms and Agreements</h2>
      <p style="margin-top: 3%;">
        I hereby certify that all details provided are true and correct to my knowledge. False information may lead to cancellation of application and/or termination of employment.
      </p>
      <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        I Agree 
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div style="margin-top:3%;">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
  <button type="submit" name="save" id="modalSubmit" value="Submit" class="btn btn-primary">Submit</button>
  </div>
           </div>
        </div>
    </div>
</div>
</div>
</div>
</form>

<!-- Include jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




<script>

document.getElementById('myForm').addEventListener('submit', function(event) {
    // Check if all fields except the checkbox are valid
    var formIsValid = true;
    var formInputs = this.querySelectorAll('input:not([type="checkbox"])');
    for (var i = 0; i < formInputs.length; i++) {
      if (formInputs[i].checkValidity() !== true) {
        formIsValid = false;
        break;
      }
    }
    if (formIsValid !== true) {
      // Display an error message using SweetAlert
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Please fill in all required fields with valid values.'
  
    });
      // Prevent the form from being submitted
      event.preventDefault();
      event.stopPropagation();
      return false;
    }
  });


// Check button element
const checkBtn = document.querySelector('.btn-primary[data-target="#exampleModal"]');

//click event listener to the Check button
checkBtn.addEventListener('click', function(event) {
  // prevent the default behavior of the button
  event.preventDefault();
  
  // Get the Submit button element inside the modal
  const submitBtn = document.querySelector('#modalSubmit');
  // Simulate a click on the Submit button
  submitBtn.click();

});


  //modal pop up code
const form = document.querySelector('form');
  const modalBody = document.querySelector('.modal-body');

  // form.querySelectorAll('input').forEach(input => {
  // input.addEventListener('input', () => {

  form.addEventListener('submit', () => {
    // prevent form from submitting

    const firstName = form.fname.value;
    const middleName = form.mname.value;
    const lastName = form.lname.value;
    const birthplace = form.bplace.value;
    const birthdate = form.birthdate.value;
    const age_ = form.age.value;
    const gender_ = form.gender.value;
    const emails = form.emails.value;
    const phone_ = form.number.value;
    const civil_ = form.civil.value;
    const province_ = form.province.value;
    const city_ = form.city.value;
    const baranggay_ = form.baranggay.value;
    const street_ = form.street.value;
    const postal_ = form.postal.value;
   
    const father_ = form.father.value;
    const f_occu_ = form.f_occu.value;
    const mother_ = form.mother.value;
    const m_occu_ = form.m_occu.value;

    const cname_ = form.cname.value;
    const cprogram_ = form.cprogram.value;
    const cyear_ = form.cyear.value;
    
    const sname_ = form.sname.value;
    const sprogram_ = form.sprogram.value;
    const syear_ = form.syear.value;


    const hname_ = form.hname.value;
    const hyear_ = form.hyear.value;

    const ename_ = form.ename.value;
    const eyear_ = form.eyear.value;

    const company_name1_ = form.company_name1.value;
    const company_address1_ = form.company_address1.value;
    const position1_ = form.position1.value;
    const work_date_start1_ = form.work_date_start1.value;
    const date_ended1_= form.date_ended1.value; 

    const company_name2_ = form.company_name2.value;
    const company_address2_ = form.company_address2.value;
    const position2_ = form.position2.value;
    const work_date_start2_ = form.work_date_start2.value;
    const date_ended2_= form.date_ended2.value; 

    const company_name3_ = form.company_name3.value;
    const company_address3_ = form.company_address3.value;
    const position3_ = form.position3.value;
    const work_date_start3_ = form.work_date_start3.value;
    const date_ended3_= form.date_ended3.value;


    const cfname_ = form.cfname.value;
    const clname_ = form.clname.value;
    const email_ref_ = form.email_ref.value;
    const phone_ref_ = form.phone_ref.value;
    const occu_ref_= form.occu_ref.value;


    const cv_file_= form.cv_file.value;

    modalBody.innerHTML = `
    
    <div class="container">
    <h2 class="mb-4"><b>Personal Information:</b></h2> 
    <div class="row">

        <div class="col-lg-4 form-control">
         <p><b>First Name:</b> ${firstName}</p>
        </div>

        <div class="col-lg-4 form-control">
         <p><b>Middle Initial:</b> ${middleName}</p>
        </div>

        <div class="col-lg-4 form-control">
         <p><b>Last Name:</b> ${lastName}</p>
        </div>

    </div>
    </div>

      <div class="container">
      <div class="row">
      <h1></h1>
        <div class="col-lg-4 form-control"> <p><b>Birthplace:</b> ${birthplace}</p></div>
        <div class="col-lg-4 form-control"><p><b>Birthdate:</b> ${birthdate}</p></div>
        <div class="col-lg-4 form-control"><p><b>Age: </b>${age_}</p></div>
        <h1></h1>
        <div></div>
        <div class="col-lg-4 form-control"><p><b>Gender:</b> ${gender_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Email:</b> ${emails}</p></div>
        <div class="col-lg-4 form-control"><p><b>Contact Number:</b> ${phone_}</p></div>
        <h1></h1>
        <div class="col-lg-4 form-control"><p><b>Civil:</b> ${civil_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Province:</b> ${province_}</p></div>
        <div class="col-lg-4 form-control"><p><b>City: </b>${city_}</p></div>
        <h1></h1>
        <div class="col-lg-4 form-control"><p><b>Baranggay:</b> ${baranggay_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Street:</b> ${street_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Postal code:</b> ${postal_}</p></div>
        

        <h1></h1>
        <h1></h1>
        <h1></h1>
        
        
        
        </div>
     </div>



     <div class="container">
     <h2><b>Parent / Guardian Information:</b></h2>
      <div class="row">
      <div class="col-lg-6 form-control"><p><b>Father's Name:</b> ${father_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Father's Occupation:</b> ${f_occu_}</p></div>
        <h1></h1>
        
        <div class="col-lg-6 form-control"><p><b>Mother's Name:</b> ${mother_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Mother's Occupation:</b> ${m_occu_}</p></div>
        <h1></h1>
        <h1></h1>
        <h1></h1>
      </div>
     </div>


     <div class="container">
     <h2><b>Educational Background:</b></h2>
 <div class="row">


        <div class="col-lg-10 form-control"><p><b>College name:</b> ${cname_}</p></div>
        <div class="col-lg-6 form-control"><p><b>Course/program:</b> ${cprogram_}</p></div>  
        <div class="col-lg-4 form-control"><p><b>Year graduated: </b>${cyear_}</p></div>
        <h1></h1>
        <h1></h1>

        <div class="col-lg-10 form-control"><p><b>Senior High School Name:</b> ${sname_}</p></div>
        <div class="col-lg-6 form-control"><p><b>Strand: </b>${sprogram_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Year graduated: </b>${syear_}</p></div>
        <h1></h1>
        <h1></h1>

        <div class="col-lg-6 form-control"><p><b>High School Name: </b>${hname_}</p></div>  
        <div class="col-lg-4 form-control"><p><b>Year graduated:</b> ${hyear_}</p></div>
        <h1></h1>

        <div class="col-lg-6 form-control"><p><b>Elementary Name: </b>${ename_}</p></div>
        <div class="col-lg-4 form-control"><p><b>Year graduated: </b>${eyear_}</p></div>
        <h1></h1>
        <h1></h1>
        <h1></h1>
        
 </div>
</div>

     
<div class="container">
<h2><b>Work Experiences</b></h2>
 <div class="row">
 <h1></h1>
 <h1></h1>
        
 <h5><b>First Job:</b></h5>
 
      
 <div class="col-lg-4 form-control"><p><b>Company Name:</b> ${company_name1_}</p></div>
<div class="col-lg-4 form-control"><p><b>Company Address:</b> ${company_address1_}</p></div>
<div class="col-lg-4 form-control"><p><b>Position:</b> ${position1_}</p></div>
<div class="col-lg-4 form-control"><p><b>Work Date Start:</b> ${work_date_start1_}</p></div>
<div class="col-lg-4 form-control"><p><b>Work Date Ended:</b> ${date_ended1_}</p></div>
<h1></h1>
        <h1></h1>
        <h1></h1>
<h5><b>Second Job:</b></h5>
<div class="col-lg-4 form-control"><p><b>Company Name:</b> ${company_name2_}</p></div>
<div class="col-lg-4 form-control"><p><b>Company Address:</b> ${company_address2_}</p></div>
<div class="col-lg-4 form-control"><p><b>Position:</b> ${position2_}</p></div>
<div class="col-lg-4 form-control"><p><b>Work Date Start:</b> ${work_date_start2_}</p></div>
<div class="col-lg-4 form-control"><p><b>Work Date Ended:</b> ${date_ended2_}</p></div>
<h1></h1>
        <h1></h1>
        <h1></h1>
<h5><b>Third Job:</b></h5>
<div class="col-lg-4 form-control"><p><b>Company name:</b> ${company_name3_}</p></div>
<div class="col-lg-4 form-control"><p><b>Company address:</b> ${company_address3_}</p></div>
<div class="col-lg-4 form-control"><p><b>Position:</b> ${position3_}</p></div>
<div class="col-lg-4 form-control"><p><b>Work Date Start:</b> ${work_date_start3_}</p></div>
<div class="col-lg-4 form-control"><p><b>Work Date Ended:</b> ${date_ended3_}</p></div>
<h1></h1>
        <h1></h1>
        <h1></h1>
</div>
</div>
  
 
<div class="container">
<h2><b>Character References:</b></h2>
 <div class="row">
 <div class="col-lg-4 form-control"><p><b>Firstname:</b> ${cfname_}</p></div>
<div class="col-lg-4 form-control"><p><b>Lastname:</b> ${clname_}</p></div>
<div class="col-lg-4 form-control"><p><b>Email:</b> ${email_ref_}</p></div>
<div class="col-lg-4 form-control"><p><b>Contact Number: </b>${phone_ref_}</p></div>
<div class="col-lg-4 form-control"><p><b>Occupation:</b> ${occu_ref_}</p></div>
<h1></h1>
        <h1></h1>
        <h1></h1>
</div>
</div>
    
<div class="container">
<h2><b>Resume / CV</b></h2>
 <div class="row">
 <div class="col-lg-6 form-control"><p><b>Resume / Curriculum Vitae:</b> ${cv_file_}</p></div>

</div>
</div>

    
  `;
    $('#exampleModal').modal('show'); // show the modal


});



// get all the "Add More Work Experience" links
const addLinks = document.querySelectorAll('.add-work-experience');

// loop through each link and add a click event listener
addLinks.forEach((link) => {
  link.addEventListener('click', (event) => {
    event.preventDefault(); // prevent the default behavior of the link
    
    // hide the previous link
    link.style.display = 'none';
    
    // get the ID of the work experience div to show
    const workExperienceId = link.getAttribute('data-work-experience');
    const workExperienceDiv = document.getElementById(`work-experience-${workExperienceId}`);
    
    // show the work experience div
    workExperienceDiv.style.display = 'block';
  });
});

//work Exp button
const secondButton = document.getElementById("showSecond");
const thirdButton = document.getElementById("showThird");

// Add event listeners to the buttons
secondButton.addEventListener("click", () => {
  document.getElementById("work-experience-2").style.display = "";
});

thirdButton.addEventListener("click", () => {
  document.getElementById("work-experience-3").style.display = "";
});


//auto capitalize
 function capitalizeFirstLetter(string) {
    return string.replace(/\b(\w)/g, function(match, capture) {
      return capture.toUpperCase();
    });
  }

    // Get the birthdate input field and age output field
    var birthdateField = document.getElementById("birthdate");
    var ageField = document.getElementById("age");

    // Add event listener to the birthdate field
    birthdateField.addEventListener("change", function() {
        // Calculate the age from the birthdate
        var today = new Date();
        var birthdate = new Date(birthdateField.value);
        var age = today.getFullYear() - birthdate.getFullYear();
        var monthDiff = today.getMonth() - birthdate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
            age--;
        }
        // Set the age output field
        ageField.value = age;
        // Check if the age is at least 18
        if (age < 18 || age >= 60) {
            // Display an error message
            document.getElementById("age-feedback").style.display = "block";
            // Disable the submit button
            document.querySelector("button[name='save']").disabled = true;
        } else {
            // Hide the error message
            document.getElementById("age-feedback").style.display = "none";
            // Enable the submit button
            document.querySelector("button[name='save']").disabled = false;
        }
    });
    

    // when the form is submitted
$('#exampleModal form').on('submit', function (e) {
    e.preventDefault(); // prevent the default form submit action

    // check if all fields are filled in
    var allFieldsFilledIn = true;
    $('#exampleModal input').each(function() {
        if ($(this).val() === '') {
            allFieldsFilledIn = false;
            return false; // exit the loop early
        }
    });

   
});


const inputs = document.querySelectorAll("input:not([type='date']):not([type='checkbox']):not([type='tel']):not([type='email']):not([name='mname']):not([name='mname'])");

inputs.forEach(function(input) {
  input.addEventListener('input', function() {
    const value = this.value.trim();
    if (value === '' || !/^[A-Za-z0-9Ññ/#._%+-,]{2,}(?:[ ](?! )|[A-Za-z0-9#._%+-,]+)*$/.test(value)) {
      input.setCustomValidity('Please enter a valid value (invalid spaces or too short)');
    } else {
      input.setCustomValidity('');
    }
  });

});



</script>

</body>
</html>