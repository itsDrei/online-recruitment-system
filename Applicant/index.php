<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academy of Operation Excellence Services Inc</title>
    <link rel="icon" href="images/aoe.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://unpkg.com/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    body {
    font-family: 'Roboto', sans-serif;
    background-color: #E5E5E5;
}
div {
    display: block;
    /* border: 1px solid; */
}

h1 {
    font-family: 'Bebas Neue';
    font-size: 80px;
    color: #363958;
    padding: 0px;
    margin: 0px;
    /* border: 1px solid; */
}
h2 {
    font-family: 'Bebas Neue';
    font-size: 48px;
    color: #363958;
}
h4 {
    font-family: 'Roboto';
    font-size: 24px;
    font-weight: 1000;
    color: #363958;
}
h5 {
    font-family: 'Roboto';
    font-size: 20px;
    font-weight: 1000;
    color: #363958;
}
a:hover {
    transition: 1s;
    box-shadow: box-shadow: 20px 20px 30px #3D4FF3;
}

/* header */
#header {
    height: auto;
    padding: 80px 0px 70px 0px;
    background-color: white;
}
#header span {
    font-weight: 1000;
}
.custom-navbar {
    background-color: #fff9f4;
}
.custom-ul {
    text-align: center;
    background-color: #fff9f4;
}
.custom-li {
    font-weight: 700;
    padding: 0px 25px;
}
.custom-logo {
    width: 15%;
}
/* end header */

/* header, casual shoes, formal shoes */
.custom-highlight {
    color: #ff8367;
}
.custom-btn {
    background-color: #3D4FF3;
    padding: 10px;
    border: none;
}
/* end header, casual shoes, formal shoes */

/* casual shoes, formal shoes */
.custom-card {
    border-radius: 20px;
    padding: 12px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
    border: none;
}
.custom-footer {
    background-color: transparent;
    border: none;
}
/* end casual shoes, formal shoes */

/* casual shoes */
.custom-bg {
    height: 350px;
    background: #F1F1F1;
    border-radius: 12px;
}
/* end casual shoes */

/* services section */
.custom-img-width {
    width: 80px;
    /* border: 1px solid; */
}
.custom-service-card {
    border-radius: 10px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
    border: none;
}
/* end services section */

/* subscribe */
/* end subscribe */

/* footer */
#footer {
    padding: 25px 0px;
}
footer h5 {
    padding: 10px 0px;
    /* border: 1px solid; */
}
#footer li a {
    text-decoration: none;
}
/* end footer */
.btn{
    background-color: red;
}
.icons {
  display: inline-flex;
  color: black;
}
@media (max-width: 480px) {
  .navbar-toggler {
    position: absolute;
    right: 0;
    margin-right:5%;
   
  }
  .custom-btn {
   margin-top: 10px;
   padding: 3%;
}

.custom-btn {
   margin-top: 10px;
   padding: 3%;
}

.tagline {
   line-height: 0.8;
   font-size:3ch;
}



}


</style>
<body>
    <!-- header -->
    <header id="header">
        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow custom-navbar">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img style="width:50px" class="img-responsive custom-logo" src="images/aoe.png" alt="AOE LOGO">
                        <span class="custom-highlight">AOE</span> 
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto custom-ul">
                        <li class="nav-item custom-li">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item custom-li">
                            <a class="nav-link" href="#jobs">See Jobs</a>
                        </li>
                        <li class="nav-item custom-li">
                            <a class="nav-link" href="#footer">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navigation -->

        <!-- cover section -->
        <section id="cover" class="container">
            <div class="row g-2 justify-content-around">
                <div class="col-md-6 d-flex justify-content-center align-items-center order-lg-2">
                    <div class="p-3">
                        <img class="mx-auto d-block w-100 img-fluid" src="vector.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center order-2">
                    <div class="p-3">
                        <h1 class="custom-highlight">Looking for a Job?</h1>
                        <h5>Start your Journey with Us Today!</h5>
                      
                    </div>
                </div>
            </div>
        </section>
        <!-- end cover section -->
    </header>
    <!-- end header -->
    
    <!-- main -->
    <main class="container" id="jobs">
        <!-- formal shoes section -->
        <section id="formal-shoes" class="mt-5">
            <h2>See Jobs Available:</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    include('../HR/jobpost.php');
                ?>
                        </div>
                    </div>
                </div>
            </div>
</section>
    </main>
    <!-- end main -->

    <!-- footer -->
    <footer id="footer" class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Office</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-dark">Unit 601 Semicon Building, Marcos Highway Dela Paz, Pasig City</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark">Unit 3B LE Village 2 
       Barangay Lawa, Calamba, Laguna</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Contact Number</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="text-dark text-decoration-none">Globe &dash; +63917 861 8992</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark">Smart &dash; +63998 964 9320</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Email</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-dark">recruitment@aoe.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Social Media</h5>
                    <ul class="list-unstyled">
                        <li>
                       <a style="margin-right:10px;" href="https://www.facebook.com/aoerecruitment" target="_blank"><i class="bi bi-facebook icons"></i>
        </a>
                        <a href="https://www.tiktok.com/@aoe2018" target="_blank"><i class="bi bi-tiktok icons"></i>
                        </a> 
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="custom-footer-margin">
            <div class="pt-3 container text-center">
                <h6 style="font-size:8px;">&copy; 2023 <span class="custom-highlight">AOE</span> | All Rights Reserved</h6> 
            </div>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end footer -->

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- end script -->
</body>
</html>