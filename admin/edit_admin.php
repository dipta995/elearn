
 <?php include 'include_a/header.php';?>
		  <div class="col-md-10">
		  	<h3>Update Admin || || <a href="view_admin.php">Admin List</a></h3>
		     <div class="tab-pane" id="tab2">
<?php

$adminid = $_GET['adminid'];
$value="";
 	
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $update_data = $ot->updateAdminNameByid($_POST,$adminid);
  }	
  ?>
			      <form method="post" action="" class="form-inline" role="form">
				 <?php if (isset($update_data)){
                 echo $update_data;
                 } 


		                  $getCat = $ot->AdminViewById($adminid);
			if ($getCat) {	
			while ($result = $getCat->fetch_assoc()) {

                  ?>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">First Name</label>
										<input type="text" class="form-control" name="first_name" id="exampleInputEmail2" value="<?php echo $result['first_name'];?>">
									</div>
								</div>

								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Last Name</label>
										<input type="text" class="form-control" name="last_name" id="exampleInputEmail2" value="<?php echo $result['last_name'];?>">
									</div>
								</div>
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Email Address</label>
										<input type="text" class="form-control" name="email" id="exampleInputEmail2" value="<?php echo $result['email'];?>">
									</div>
								</div>
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Password</label>
										<input type="text" class="form-control" name="password" id="exampleInputEmail2"value="<?php echo $result['password'];?>">
									</div>
								</div>
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Role</label>
										<select name="status">
											<option value="<?php echo $value = $result['status'];?>">
												<?php 
												if ($value==0) {
													echo "Super Admin";
												}
												elseif ($value==1) {
													echo "Admin";
												}
												elseif ($value==2) {
													echo "Editor";
												}else{
													echo "Something Wrong";
												}
												
												?>	
											</option>
											<option value="2">Editor</option>
											<option value="1">Admin</option>
											<option value="0">Super Admin</option>
										</select>
									</div>
								</div>
								
								
								
							</div>
							
							<input class="btn btn-primary" type="submit" name="submit" value="Update Now">
						</fieldset>
						
				<?php } } ?>
					</form>
			    </div>
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>