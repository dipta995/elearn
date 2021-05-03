<?php 
spl_autoload_register(function($class){
 include_once "../classes/".$class.".php";  
});
$lga = new Login();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache")
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12"> 
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php"> Admin </a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			            	<?php
			            	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			            		$adminEmail = $_POST['email'];
			            		$adminPass = $_POST['password'];
			            		$login = $lga->adminLogin($adminEmail,$adminPass);

			            	}
			            	?>
			            	<form action="" method="post">
			            		
			                <h6>Sign In</h6>
								<span style="color:red; font-weight: 200px;">

									<?php if (isset($login)){
									echo $login;
									}  ?>
								</span>
			                 
			                <input class="form-control" name="email" type="email" placeholder="E-mail address">
			                <br>
			                <input class="form-control" name="password" type="password" placeholder="Password">
			               
			                	<button style="background-color: green; border: 2px solid green; border-radius: 3px; color: #fff; padding: 10px 15px; ">Log In</button>
			                   
			                        

			            	</form>
			            </div>
			        </div>

			        
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>