 <?php include 'include_a/header.php';?>
		  <div class="col-md-10">
		  <h3>Catagory List</h3>

		  	 <div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>NO</th>
				                  <th>Catagory Name</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>
				<?php
				 if (isset($_GET['delcatid'])) {
    	
        $delcatid = $_GET['delcatid'];
       $view = $dl->deletecat($delcatid);
    }
    else{
    	
    }
				 $getCat = $ca->catView();
				if ($getCat) {
					$i = 0;
				while ($result = $getCat->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                  <td><?php echo $result['catName'];?></td>
				                  <td><a href="edit_catagory.php?catid=<?php echo $result['catId'];?>">Edit</a>  <?php if($status==1 || $status==0) {?>
				                  	
				                   || <a href="?delcatid=<?php echo $result['catId'];?>">Delete</a></td>
				                 <?php } ?>
				                </tr>
				               <?php } }?>
				              </tbody>
				            </table>
		  				</div>

 
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>