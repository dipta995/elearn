 <?php include 'include_a/header.php';?>
		  <div class="col-md-10">
		  <h3>Catagory List</h3>

		  	 <div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>NO</th>
				                  <th>Title</th>
				                  <th>Image</th>
				                  
				                </tr>
				              </thead>
				              <tbody>
				<?php
		if (isset($_GET['delslide'])) {
        $delslide = $_GET['delslide'];
       $view = $dl->delslide($delslide);
    }
    else{
    	
    }
				 $getCat = $ot->slideView();
				if ($getCat) {
					$i = 0;
				while ($result = $getCat->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                  <td><?php echo $result['title'];?></td>
				                  <td><img style="height: 100px; width: 80px;" src="../<?php echo $result['image'];?>"></td>
				                  
				                  <td><a href="edit_slide.php?editslideid=<?php echo $result['id'];?>">Edit</a>  
				                  	
				                   || <a href="?delslide=<?php echo $result['id'];?>">Delete</a></td>
				               
				                </tr>
				               <?php } }?>
				              </tbody>
				            </table>
		  				</div>

 
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>