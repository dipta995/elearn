 <?php include 'include_a/header.php';?>

		  <div class="col-md-10">
		  <h3>Welcome to Admin panel</h3>

	<?php
		$search = "";
			if (!isset($_GET['search']) || $_GET['search']==NULL) {
	 
			}else {
		$search = $_GET['search'];
			
		?>
		<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr> 
				                  <th>NO</th>
				                  <th>Category Name</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>

		<?php
		$src = $sr->adminsearch($search);
		if ($src) {
			$i = 0;

				while ($result = $src->fetch_assoc()) {
					$i++;

 
		?>
	
								 <tr>
				                  <td><?php echo $i;?></td>
				               
				                  
				                  <td><?php echo $result['catName'];?></td>
				                  <td><?php echo $result['course_name'];?></td>
				                  <td> <a href="coursesaudio.php?catid=<?php echo $result['courseId'];?>">VIEW COURSES</a> </td>
				               
				                   
				                  
                                   
                                </td>
				                
				                 
				                </tr>
							<?php } } else { ?>
     <p style="height:25px; border-radius: 5px; width: 500px; font-weight: 400px;  background-color: #f0917c; text-align: center;">Query not found</p> <?php }  } ?>

							 </tbody>
				            </table>
		  				</div>

 
		  </div>
		</div>
    </div>



   <?php include 'include_a/footer.php';?>