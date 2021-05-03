<?php
 include '../lib/Session.php'; 
Session::checkSessions();

spl_autoload_register(function($class){
 include_once "../classes/".$class.".php";
});
$ad = new AddCourse();
$ca = new Catagory();
$co = new Course();
$ot = new Other();
$ms = new Message();
$dl = new Delete();
$sr = new Search();
 $admin_id = Session::get('admin_id');
 $status = Session::get('status');

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Elearn Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


    <style>

</style>
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-4">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php"> Admin Panel</a></h1>
	              </div>
	           </div>
	           <div class="col-md-4">
	              <div class="row">
	                <div class="col-lg-12">
                    <form action="searchadmin.php" method="get">
                      
	                  <div class="input-group form">
	                       <input type="text" class="form-control" name="search" placeholder="Search...">
	                       <span class="input-group-btn">
	                        
                          <input class="btn btn-primary"  type="submit"  value="search">
	                       </span>
	                  </div>

                    </form>
	                </div>
	              </div>
	           </div>
              <div class="col-md-2">
                <!-- Logo -->
                <div class="logo">
                   <h4><a href="student_message.php">Message<span style="color: red;">
                     <?php
                        $getCourse = $ms->studentMessageView();
                         
                                 if ($getCourse) {
                                     $count = mysqli_num_rows($getCourse);
                                     echo "(".$count.")";
                                 } else{
                                     echo "(0)";
                                 }
                       ?>
                   </span></a></h4>
                </div>
             </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" >
                  <div class="dropdown">
                  <button class="dropbtn">
                    <?php
                     
                      echo Session::get('first_name')." ".Session::get('last_name');
                  
                    
                    ?>
                  </button>
                    <div class="dropdown-content">
                <!--       <a href="profile.php">RESET PASSCODE</a> -->
                      <a href="?action=logout">Logout</a>
                    </div>
                  </div>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
	                           <?php
                    if (isset($_GET['action']) && $_GET['action']== 'logout') {
                        Session::destroy();
                       
                    }
                ?>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                 <div class="navbar navbar-inverse" >
                  <div class="dropdown navbarSS">
                  <button class="dropbtn">Catagory</button>
                    <div class="dropdown-content">
                      <a href="add_catagory.php">Add Catagory</a>
                      <a href="view_catagory.php">View Catagory</a>
                    </div>
                  </div>
                  <div style="height: 10px; background-color: white;"></div>
                  <div class="dropdown">
                  <button class="dropbtn">Users</button>
                    <div class="dropdown-content">
                      <a href="students.php">Students</a>
                      <a href="teachers.php">Teachers</a>
                    </div>
                  </div>

                    <div style="height: 10px; background-color: white;"></div>
                  <div class="dropdown">
                  <button class="dropbtn">Controll</button>
                    <div class="dropdown-content">
                      <a href="add_admin.php">Add Admin</a>
                      <a href="view_admin.php">View Admin</a>
                    </div>
                  </div>


                    <div style="height: 10px; background-color: white;"></div>
                  <div class="dropdown">
                  <button class="dropbtn">Social</button>
                    <div class="dropdown-content">
                      <a href="add_social.php">Social</a>
                      <a href="about.php">About</a>
                      
                    </div>
                  </div>
                  <div style="height: 10px; background-color: white;"></div>
                  <div class="dropdown">
                  <button class="dropbtn">Course</button>
                    <div class="dropdown-content">
                      <a href="coursesaudio.php">course view</a>
                     
                      
                    </div>
                  </div>
                  <div style="height: 10px; background-color: white;"></div>
                  <div class="dropdown">
                  <button class="dropbtn">Slides</button>
                    <div class="dropdown-content">
                      <a href="add_slide.php">Create Slides</a>
                      <a href="view_slide.php">View Slides</a>
                     
                      
                    </div>
                  </div>
                  <div style="height: 10px; background-color: white;"></div>
                  <div class="dropdown">
                  <button class="dropbtn">News Feed</button>
                    <div class="dropdown-content">
                      <a href="add_news.php">Create News</a>
                      <a href="view_news.php">View News</a>
                     
                      
                    </div>
                  </div>
                </div>
             </div>
		  </div>