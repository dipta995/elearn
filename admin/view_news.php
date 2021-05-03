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
				                  <th>Details</th>
				                </tr>
				              </thead>
				              <tbody>
				<?php
		if (isset($_GET['delnews'])) {
        $delnews = $_GET['delnews'];
       $view = $dl->delnews($delnews);
    }
    else{
    	
    }
				 $getCat = $ot->newsfeed();
				if ($getCat) {
					$i = 0;
				while ($result = $getCat->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                  <td><?php echo $result['news_title'];?></td>
				                  <td><img style="height: 100px; width: 80px;" src="../<?php echo $result['image'];?>"></td>
				                  <td><?php echo $result['news_details'];?></td>
				                  <td><a href="edit_news.php?editnewsid=<?php echo $result['news_id'];?>">Edit</a>  
				                  	
				                   || <a href="?delnews=<?php echo $result['news_id'];?>">Delete</a></td>
				               
				                </tr>
				               <?php } }?>
				              </tbody>
				            </table>
		  				</div>

 
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>