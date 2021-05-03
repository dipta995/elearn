
 <?php include 'include_a/header.php';?>

		  <div class="col-md-10">
		  	<h3>Add News Feed</h3>
		     <div class="tab-pane" id="tab2">
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $insertdata = $ot->insertNewsfeed($_POST,$_FILES);
  }
  ?>
			     <div class="tab-pane active" id="tab1">
								      <form action="" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
								      	<?php
								      	if (isset($insertdata)) {
								      		echo $insertdata;
								      	}
								      	?>
										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
										    <div class="col-sm-10">
										      <input type="text" name="news_title" class="form-control" id="inputEmail3" placeholder="Title">
										    </div>
										  </div>
										   
										  <div class="form-group">
										    <label class="col-sm-2 control-label">News Details</label>
										    <div class="col-sm-10">
										      <textarea name="news_details" class="form-control" placeholder="Details" rows="3"></textarea>
										    </div>
										  </div>
										  
										   	<div class="form-group">
												<label class="col-sm-2 control-label">File input</label>
												<div class="col-sm-10">
													<input type="file" name="image" class="form-control" id="exampleInputFile1">
													 
												</div>
											</div>

										<input type="submit" class="btn btn-primary" value="Add post" name="submit">
										</form>
								    </div>
			    </div>
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>