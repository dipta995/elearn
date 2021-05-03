<?php

 include 'lib/Session.php';
 include 'helpers/Format.php';
Session::blankSession();
  $protocol = $_SERVER['SERVER_PROTOCOL'];
if (strpos($protocol,"HTTPS")) {
   $protocol = "HTTPS://";
}else{
    $protocol = "HTTP://";
}
$redirect_link_var = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

spl_autoload_register(function($class){
 include_once "classes/".$class.".php";
});

$ca = new Catagory();
$co = new Course();
$ad = new AddCourse();
$ot = new Other();
$ms = new Message();
$rt = new Rate();
$com = new Comment();
$fm = new Format();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$studentId = Session::get('student_id');

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Learn From Online</title>
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
    <script src="js/js/jquery-3.4.1.slim.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <script src="rating/dist/rating.js"></script>



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
            <p>
              
            <?php
                    if (Session::get('student_id') == true) {
                      echo Session::get('first_name'). " ". Session::get('last_name');
                      ?>
                       <a href="?action=logout" class="small mr-3"><span class="icon-unlock-alt"></span>LogOut</a>
                             <a href="?action_t=logout" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>Teacher</a>
                      <?php
                       if (isset($_GET['action']) && $_GET['action'] == "logout") {
                                Session:: destroy();
                                header('Location:../elearn/glog/index.php');
                            }
                     
                    }elseif(Session::get('teacher_id') == true){
echo Session::get('first_name'). " ". Session::get('last_name');
                      ?>
                       <a href="?action=logout" class="small mr-3"><span class="icon-unlock-alt"></span>LogOut</a>
                       <a href="teacher/">My Panel</a>
                      <?php
                       if (isset($_GET['action']) && $_GET['action'] == "logout") {
                                Session:: destroy();
                               header('Location:../elearn/glog/index.php');
                            }

?>
  <a href="?action=logout" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>Student</a>


                <?php    }  


                    else{?>

                       <a href="?action_t=logout" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>Teacher</a>
                 
            </p>
            <a href="glog/" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
            <a href="register.php" class="small mr-3"><span class="icon-unlock-alt"></span> Sign Up</a>
          <?php }  if (isset($_GET['action_t']) && $_GET['action_t'] == "logout") {
                                Session:: destroy();
                                header('Location:teacher/login.php');
                            }?>

                           
               
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
                <li class="active">
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="#" class="nav-link text-left">Course</a>
                    <div style="background-color: #fff;width: auto;" class="dropdown">
                  
     
                    <div style="width: 270px;" class="row">
                                       <?php
  
         $getCat = $ca->catView();
        if ($getCat) {
          
        while ($result = $getCat->fetch_assoc()) {
    
        ?>
                      <div class="col-sm-5">
                        
                      <a  href="courses.php?catid=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a> 
                      </div>
                    <?php }} ?>
                    </div>
                  </div>
                </li>

                <li>
                  <a href="about.php" class="nav-link text-left">About Us</a>
                </li>
                <li>
                    <a href="contact.php" class="nav-link text-left">Contact</a>
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


   