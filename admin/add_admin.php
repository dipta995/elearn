
 <?php include 'include_a/header.php';?>
  <?php if($status==0) {?>
		  <div class="col-md-10">
		  	<h3>Create Admin</h3>
		     <div class="tab-pane" id="tab2">
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $insertdata = $ot->insertAdminName($_POST);
  }
  ?>
			      <form method="post" action="" class="form-inline" role="form">
							 <?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">First Name</label>
										<input type="text" class="form-control" name="first_name" id="exampleInputEmail2" placeholder="Enter first Name">
									</div>
								</div>

								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Last Name</label>
										<input type="text" class="form-control" name="last_name" id="exampleInputEmail2" placeholder="Enter last Name">
									</div>
								</div>
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Email Address</label>
										<input type="text" class="form-control" name="email" id="exampleInputEmail2" placeholder="Enter Email Address">
									</div>
								</div>
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Password</label>
										<input type="text" class="form-control" name="password" id="exampleInputEmail2" placeholder="Enter Password">
									</div>
								</div>
								<div class="col-md-12">
									
									<div class="form-group col-sm-3 admincr">
										<label class="sr-only" for="exampleInputEmail2">Role</label>
										<select name="status">
											<option value="2">Editor</option>
											<option value="1">Admin</option>
											<option value="0">Super Admin</option>
										</select>
									</div>
								</div>
								
								
								
							</div>
							<input type="submit"  name="submit" value="Create Admin" class="btn btn-primary">
							 
								
							 
						</fieldset>
						
					</form>
			    </div>
		  </div>
		</div>
    </div>
<?php } ?>
   <?php include 'include_a/footer.php';?>