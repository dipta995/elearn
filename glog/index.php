<?php 
 
//include '../lib/Session.php';
   // Session::checkLogin();

require "vendor/autoload.php";
require "GoogleAuth.php";
spl_autoload_register(function($class){
 include_once "../classes/".$class.".php";
  
});
$client = new Google_Client;
$google = new GoogleAuth($client);
$ca = new Catagory();
$co = new Course();
$ad = new AddCourse();
$ot = new Other();
$ms = new Message();
$rt = new Rate();
$com = new Comment();
$lg = new Login();

 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache")



 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Academics &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">

  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="../css/aos.css">
  <link href="../css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="../css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8 d-none d-lg-block">
           <?php  
$getCourse = $ot->officeview();
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
           
           
              
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span><?php echo $result['phone']; ?></a>
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> <?php echo $result['email']; ?></a>
             <?php } } ?>
          </div>
          <div class="col-lg-4 text-right">
        
            <a href="../register.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Sign UP</a> 
            <a href="../teacher/login.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>Teacher</a>
            
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="../index.php" class="d-block">
              <img src="../images/logo.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="../index.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="#" class="nav-link text-left">Course</a>
  <div class="dropdown">
                  
                      <?php
  
         $getCat = $ca->catView();
        if ($getCat) {
          
        while ($result = $getCat->fetch_assoc()) {
    
        ?>
                    <div class="dropdown-content">
                      <a href="../courses.php?catid=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a>
                    </div>
                    <?php }} ?>
                  </div>
                </li>

                <li>
                  <a href="../about.php" class="nav-link text-left">About Us</a>
                </li>
                <li>
                    <a href="../contact.php" class="nav-link text-left">Contact</a>
                  </li>
              </ul>                                                                                                                                                                                               
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
                   <?php 
$getCourse = $ot->socialview();
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
           
              <a href="<?php echo $result['facebook'];?>"><span class="icon-facebook"></span></a>
              <a href="<?php echo $result['twit'];?>"><span class="icon-twitter"></span></a>
              <a href="<?php echo $result['linked'];?>"><span class="icon-linkedin"></span></a>
<?php } } ?>
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
         
        </div>
      </div>

    </header>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('../images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Student Login Form</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 
 

    <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-5">
                  <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      $studentEmail = $_POST['email'];
                      $studentPass = $_POST['password'];
                      if (isset($_GET['re_link'])) {
                      $login = $lg->studentLoginre($studentEmail,$studentPass,$_GET['re_link']);
                        
                      }else{
                         $login = $lg->studentLogin($studentEmail,$studentPass);
                      }

                    }
                    ?>
                  <form action="" method="post">
                      <span style="color:red; font-weight: 200px;"> 

                  <?php if (isset($login)){
                  echo $login;
                  }  ?>
                </span>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Email</label>
                            <input type="text" name="email" id="username" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" name="password" id="pword" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
                           

                            <a style="font-family: 'Arial'; font-weight: 12px; color:blue;" href="<?=$google->getAuthUrl(); ?>">Sign in with Google</a>
                        </div>
                    </div>

                  </form>
                </div>
            </div>
            

          
        </div>
    </div>

    


    <div class="footer">
      <div class="container">
        <div class="row">
       
          <div class="col-lg-2"></div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                 <?php
                $getCourse = $ot->courseView();
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>
                  <li><a href="../courses.php?catid=<?php echo $result['catId']?>"><?php echo $result['catName']?></a></li>
                 <?php } } ?>
              </ul>
          </div>
          <div class="col-lg-4">
              <h3 class="footer-heading"><span>Office Address</span></h3>
                <?php
            //$courseid= $_GET['courseid'];
            $getCourse = $ot->officeview();
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
              <p><?php echo $result['address']; ?></p>
              <p><?php echo $result['email']; ?></p>
              <p><?php echo $result['phone']; ?></p>
              
             <?php } } ?>

          </div>
          <div class="col-lg-3">
              <div class="copyright">
                <p>
                    
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
                   
                    </p>
            </div>
          </div>
        </div>

        <!-- <div class="row">
          <div class="col-12">
          
          </div>
        </div> -->
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->
<script>
    $("#review").rating({
        "value": 5,
        "click": function (e) {
            console.log(e);
            $("#starsInput").val(e.stars);
        }
    });

    
</script>

  <!-- loader -->
<!--   <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div> -->

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/bootstrap-datepicker.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.fancybox.min.js"></script>
  <script src="../js/jquery.sticky.js"></script>
  <script src="../js/jquery.mb.YTPlayer.min.js"></script>




  <script src="../js/main.js"></script>


</body>

</html>