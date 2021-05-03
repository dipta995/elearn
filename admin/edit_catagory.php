
 <?php include 'include_a/header.php';
$id = "";
if($_GET['catid']==NULL || !isset($_GET['catid'])){
	"<script>window.location = 'view_catagory.php'; </script>"; 
}else{
	$id = $_GET['catid'];
}


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $updata = $ca->updateCatName($_POST,$id);
  }
  ?>
		  <div class="col-md-10">
		  	<h3>Update Catagory || || <a href="view_catagory.php">Catagory List</a></h3>
		     <div class="tab-pane" id="tab2">
		     	<?php 
		     	if (isset($updata)){
                 echo $updata;
                 }
                  ?>
								      <form method="post" action="" class="form-inline" role="form">
											<fieldset>
												<div class="form-group col-sm-3">
													<label class="sr-only" for="exampleInputEmail2"> Catagory Name</label>
						<?php
						 $getCat = $ca->catViewById($id);
						if ($getCat) {
						while ($result = $getCat->fetch_assoc()) {
						?>
													<input type="text" class="form-control" id="exampleInputEmail2" name="catName" value="<?php echo $result['catName'];?>">
												<?php } } ?>
												</div>
												
												
												<input class="btn btn-primary" value="Update Now" type="submit" name="submit" >
											</fieldset>
											
										</form>
								    </div>

 
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>