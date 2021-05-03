
 <?php include 'include_a/header.php';

 ?>
		  <div class="col-md-10">
		  	<h3>
		  		
		  	</h3>
		     <div class="tab-pane" id="tab2">
<?php
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertdata = $ot->updateAbout($_POST);
  }
  ?>
			      <form method="POST" action="" class="form-inline" role="form">
				<?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>

            
						<fieldset>     <?php
				 $getCat = $ot->aboutView();
				if ($getCat) {
				
				while ($result = $getCat->fetch_assoc()) {
			
				?>
							<div class="form-group col-sm-3">
								<label class="sr-only" for="exampleInputEmail2">Title</label>
								<input type="text" class="form-control" name="head" id="exampleInputEmail2" value="<?php echo $result['head'];?>">
							</div>
							<div class="form-group col-sm-3">
								<label class="sr-only" for="exampleInputEmail2">Details</label>
								<textarea class="form-control" name="body" id="exampleInputEmail2" > <?php echo $result['body'];?></textarea> 
							</div>
						
							<?php } } ?>
							<button type="submit" class="btn btn-primary">
								Update
							</button>
						</fieldset>

						
					</form>
			    </div>
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>