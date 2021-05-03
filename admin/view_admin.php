 <?php include 'include_a/header.php';?>
		  <div class="col-md-10">
		  <h3>Welcome to Admin panel</h3>

		  	 <div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>NO</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Email</th>
				                  <th>Password</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>
				<?php
						 if (isset($_GET['adminid'])) {
    	
        $adminid = $_GET['adminid'];
       $view = $dl->deleteadmin($adminid);
    }
    else{
    	
    }
				 $getCat = $ot->AdminView();
				if ($getCat) {
					$i = 0;
				while ($result = $getCat->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                  <td><?php echo $result['first_name'];?></td>
				                  <td><?php echo $result['last_name'];?></td>
				                  <td><?php echo $result['email'];?></td>
				                   <?php if($status==0) {?>
				                  <td><?php echo $result['password'];?></td>
				                  <td><a href="edit_admin.php?adminid=<?php echo $result['admin_id'];?>">Edit</a> || <a href="?adminid=<?php echo $result['admin_id'];?>">Delete</a></td>
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