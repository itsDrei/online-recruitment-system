<?php
require 'mainConnect.php';
session_start();

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
    <link rel="icon" href="images/aoe.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Form Edit</title>
  </head>

<body>
   <div class="container mt-5">
  
    <?php include('message.php');?>
    <div class ="row"> 
        <div class ="col-md-5">
            <div class ="card">
                <div class="card-header">
                    <h4>
                        Applicant Status
                        <a href="createStatus.php" class = "btn btn-danger float-end">Back to Create Status</a>
                    </h4>
                </div>
                <div class="card-body" >
                <?php
                     if(isset($_GET['id'])){

                       $id= mysqli_real_escape_string($conn,$_GET['id']);
                       $query = "SELECT * FROM create_status WHERE id = '$id'";
                       $query_run=mysqli_query($conn,$query);
                       if(mysqli_num_rows($query_run)>0){
                        $id = mysqli_fetch_array($query_run);

                        ?>

                    <form action="editStatus.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" id="id" value = "<?=$id['id'];?>" class="form-control">
                        <label >Status:
                        <input type="text"  name ="status" value = "<?=$id['status_'];?>"class="form-control" >
                        </label>
                    </div>
                    
                <div class="mb-3">
               
   
                    <div class = "mb-3">
                        <button type="submit" name="submit" class ="btn btn-primary float-end">Save Edit</button>
                    </div>
                       </form>
                    <?php
                       }
                       else{
                        echo "no record found";
                       }
                       
                     }
                    


                     


                ?>



                </div>
            </div>
        </div>
     </div>
                    </body>
                    </html>