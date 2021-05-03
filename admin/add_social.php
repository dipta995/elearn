
 <?php include 'include_a/header.php';

 ?>
		  <div class="col-md-10">
		  	<h3>
		  		
		  	</h3>
		     <div class="tab-pane" id="tab2">
<?php
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertdata = $ot->updateSocial($_POST);
  }
  ?>
			      <form method="POST" action="" class="form-inline" role="form">
				<?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>

            
						<fieldset>     <?php
				 $getCat = $ot->socialview();
				if ($getCat) {
				
				while ($result = $getCat->fetch_assoc()) {
			
				?>
							<div class="form-group col-sm-3">
								<label class="sr-only" for="exampleInputEmail2">Facebook</label>
								<input type="text" class="form-control" name="facebook" id="exampleInputEmail2" value="<?php echo $result['facebook'];?>">
							</div>
							<div class="form-group col-sm-3">
								<label class="sr-only" for="exampleInputEmail2">Linked in</label>
								<input type="text" class="form-control" name="linked" id="exampleInputEmail2" value="<?php echo $result['linked'];?>">
							</div>
							<div class="form-group col-sm-3">
								<label class="sr-only" for="exampleInputEmail2">Twitter</label>
								<input type="text" class="form-control" name="twit" id="exampleInputEmail2" value="<?php echo $result['twit'];?>">
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