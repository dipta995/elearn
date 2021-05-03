 <?php include 'include_a/header.php';?>
		  <div class="col-md-10">
		  <h3 id="message">Unread Messages</h3>
<?php 
    if (isset($_GET['seenid'])) {
    	
        $seenid = $_GET['seenid'];
       $view = $ms->seenup($seenid);
    }
    else{
    	
    }
    if (isset($_GET['seenid'])) {
    	
        $seenid = $_GET['seenid'];
       $view = $ms->seenup($seenid);
    }
    else{
    	
    }
    
?>
		  	 <div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>NO</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Email</th>
				                  <th>phone</th>
				                  <th>message</th>
				                  <th>Date</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>
				<?php
				 $getCourse = $ms->studentMessageView();;
				if ($getCourse) {
					$i = 0;
				while ($result = $getCourse->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                  <td><?php echo $result['f_name'];?></td>
				                  <td><?php echo $result['l_name'];?></td>
				                  <td><?php echo $result['email'];?></td>
				                  <td><?php echo $result['phone'];?></td>
				                  <td><?php echo $result['message'];?></td>
				                  <td><?php echo $result['rcv_date'];?></td>
				                  <td><a onclick="return confirm('are you sure to send seen box');"  href="?seenid=<?php echo $result['message_id']; ?>">Seen</a> <?php if($status==1 || $status==0) {?>  || <a href="?delid=<?php echo $result['message_id']; ?>">Delete</a></td> <?php } ?>
				                 
				                </tr>
				               <?php } }?>
				              </tbody>
				            </table>
		  				</div>

 
		  </div>

 <div class="col-md-10">
		  <h3 id="message">Read Messages</h3>
<?php 
 
    if (isset($_GET['unseenid'])) {
    	
        $unseenid = $_GET['unseenid'];
       $view = $ms->unseenup($unseenid);
    }
    else{
    	
    }
    if (isset($_GET['delid'])) {
    	
        $delid = $_GET['delid'];
       $view = $dl->deletemsg($delid);
    }
    else{
    	
    }
    
?>
		  	 <div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>NO</th>
				                  <th>First Name</th>
				                  <th>Last Name</th>
				                  <th>Email</th>
				                  <th>phone</th>
				                  <th>message</th>
				                  <th>Date</th>
				                  <th>Action</th>
				                </tr>
				              </thead>
				              <tbody>
				<?php
				 $getCourse = $ms->studentMessageViewseen();;
				if ($getCourse) {
					$i = 0;
				while ($result = $getCourse->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                  <td><?php echo $result['f_name'];?></td>
				                  <td><?php echo $result['l_name'];?></td>
				                  <td><?php echo $result['email'];?></td>
				                  <td><?php echo $result['phone'];?></td>
				                  <td><?php echo $result['message'];?></td>
				                  <td><?php echo $result['rcv_date'];?></td>
				                  <td><a onclick="return confirm('are you sure to send unseen box');"  href="?unseenid=<?php echo $result['message_id']; ?>">UnSeen</a>  || <a href="?delid=<?php echo $result['message_id']; ?>">Delete</a></td>
				                 
				                </tr>
				               <?php } }?>
				              </tbody>
				            </table>
		  				</div>

 
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>