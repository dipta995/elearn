
 <?php include 'include_a/header.php';?>
		  <div class="col-md-10">
		  	<h3>Add Catagory</h3>
		     <div class="tab-pane" id="tab2">
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $insertdata = $ca->insertCatName($_POST);
  }
  ?>
			      <form method="POST" action="" class="form-inline" role="form">
				<?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>
						<fieldset>
							<div class="form-group col-sm-3">
								<label class="sr-only" for="exampleInputEmail2">Catagory Name</label>
								<input type="text" class="form-control" name="catName" id="exampleInputEmail2" placeholder="Enter Catagory Name">
							</div>
							
							
							<button type="submit" class="btn btn-primary">
								Add
							</button>
						</fieldset>
						
					</form>
			    </div>
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>