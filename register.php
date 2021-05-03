<?php
spl_autoload_register(function($class){
 include_once "classes/".$class.".php";
}); 
 $lg = new Login();
 $ot = new Other();
$ca = new Catagory();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertdata = $lg->studentDataInsert($_POST);  
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Academics &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">

<script src="validation.js"></script>
 


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
          <div class="col-lg-9 d-none d-lg-block">
             <?php  
              $getCourse = $ot->officeview();
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
           
           
              
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span><?php echo $result['phone']; ?></a>
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> <?php echo $result['email']; ?></a>
             <?php } } ?>          </div>
          <div class="col-lg-3 text-right">
            <a href="glog/index.php" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
            <a href="teacher/login.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>Teacher</a>
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.php" class="d-block">
              <img src="images/logo.jpg" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li>
                  <a href="about.php" class="nav-link text-left">About Us</a>
                 
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
                      <a href="courses.php?catid=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a>
                    </div>
                    <?php }} ?>
                  </div>
                </li>
                
                <li>
                    <a href="contact.php" class="nav-link text-left">Contact</a>
                  </li>
              </ul>                                                                                                                                                                                                                                                                                           
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
         
        </div>
      </div>

    </header>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Student Register Form</h2>
              <p>Fill Up the form and Support Us</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Register</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
                <div class="row justify-content-center">
              <form action="" method="post" name="registration">
                
             
                    <div class="row">
                        

                      <?php if (isset($insertdata)){
                      echo $insertdata;
                      }  ?>
                     
                        <div class="col-md-12 form-group">
                            <label for="name">First Name</label>
                            <input type="text" name="first_name" id="firstname" class="form-control form-control-lg" >
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name">Last Name</label>
                            <input type="text" name="last_name" id="lastname" class="form-control form-control-lg" >
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-lg" >
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
                            
                        </div>
                    </div>
    
              </form>
            </div>
            </div>
            <div class="col-md-6">
              <img style="width: 100%; height: 400px;" src="images/regpic.jpg">
            </div>
          </div>


          
            

          
        </div>
    </div>
 
    

   <?php include 'include/footer.php'; ?>