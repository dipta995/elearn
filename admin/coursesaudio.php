 <?php include 'include_a/header.php';

	



 ?>
     <style type="text/css">
        .center {
  text-align: center;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
    <?php
if (!isset($_GET['catid']) || $_GET['catid']==NULL) {
    ?>
		  <div class="col-md-10">
		  <h3>Welcome to Admin panel</h3>
		  <a href="coursesaudio.php">Audio</a>
		  <a href="coursevideo.php">video</a>
		  <a href="coursefile.php">file</a>
		  	<?php
		  	$per_page = 6;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page; //start for every page
		  	
if (isset($_GET['publishid'])) {
$publishid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['publishid']);
$publishid =$ot->updateaudiostatus($publishid);
}

if (isset($_GET['unpublishid'])) {
$unpublishid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['unpublishid']);
$unpublishid =$ot->updateaudiostatusA($unpublishid);
}


 if (isset($_GET['delid'])) {
    	
        $delid = $_GET['delid'];
       $view = $dl->delfilepostbyid($delid);
    }
    else{
    	
    }
?>
		  	 <div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>NO</th>
				                  <th>Course Name</th>
				                  <th>course overview</th>
				                  <th>Audio Title</th>
				                  <th>Audio File</th>
				                  <th>Action</th>
				                </tr>
		 		              </thead>
				              <tbody>
				<?php
				 $getCat = $ot->courseViewStudentaudiopagi($start_form,$per_page);
				if ($getCat) {
					$i = 0;
				while ($result = $getCat->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                
				                  <td><?php echo $result['course_name'];?></td>
				                  <td><?php echo $result['course_overview'];?></td>
				                  <td><?php echo $result['audio_title'];?></td>
				                  <td><audio width="320" height="240" controls>
                            <source src="../<?php echo $result['audio'];?>" type="video/mp4">
                            </audio></td>
				                   <td>	<?php
				                  if ($result['status']==1) {
				                  		?>
				                  	<a href="?unpublishid=<?php echo $result['audio_id'];?>">unPublish now</a> 
				                  	<?php
				                  }else{
				                  	?>
				                  	<a href="?publishid=<?php echo $result['audio_id'];?>">Publish now</a> 
				                  	<?php
				                  }


				                  ?> 	<?php if($status==1 || $status==0) {?> || <a href="?delid=<?php echo $result['audio_id'];?>">Delete</a> <?php } ?></td>
				                 
				                </tr>
				               <?php } }?>
				              </tbody>
				            </table>
		  				</div>

 
		  </div>
		</div>
    </div>


   <?php 


$getCourse = $ot->courseViewStudentaudio();
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
                        <div class="center">
                            <div class="pagination">
                            <?php echo "<a href='courses.php?page=1'>".'&laquo;'."</a>";
                            for ($i=1; $i <= $total_page; $i++) { 
                                    echo "<a class='active' href='courses.php?page=".$i."'>".$i."</a>";
                                };
                                echo "<a href='courses.php?page=$total_page'>".'&raquo;'."</a>"; ?>
                                         
                            </div>
                        </div>
                        <?php }elseif (isset($_GET['catid'])) {
                        	
                        

                        ?>
                        <div class="col-md-10">
		  <h3>Welcome to Admin panel</h3>
		  <a href="coursesaudio.php?catid=<?php echo $_GET['catid']; ?>">Audio</a>
		  <a href="coursevideo.php?catid=<?php echo $_GET['catid']; ?>">video</a>
		  <a href="coursefile.php?catid=<?php echo $_GET['catid'];?>">file</a>
		  	<?php
		  	$per_page = 6;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page; //start for every page
		  	
if (isset($_GET['publishid'])) {
$publishid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['publishid']);
$publishid =$ot->updateaudiostatus($publishid);
}

if (isset($_GET['unpublishid'])) {
$unpublishid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['unpublishid']);
$unpublishid =$ot->updateaudiostatusA($unpublishid);
}


 if (isset($_GET['delid'])) {
    	
        $delid = $_GET['delid'];
       $view = $dl->delfilepostbyid($delid);
    }
    else{
    	
    }
?>
		  	 <div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>NO</th>
				                  <th>Course Name</th>
				                  <th>course overview</th>
				                  <th>Audio Title</th>
				                  <th>Audio File</th>
				                  <th>Action</th>
				                </tr>
		 		              </thead>
				              <tbody>
				<?php
				 $getCat = $ot->courseViewStudentaudiopagibyid($_GET['catid'],$start_form,$per_page);
				if ($getCat) {
					$i = 0;
				while ($result = $getCat->fetch_assoc()) {
					$i++;
				?>
				                <tr>
				                  <td><?php echo $i;?></td>
				                
				                  <td><?php echo $result['course_name'];?></td>
				                  <td><?php echo $result['course_overview'];?></td>
				                  <td><?php echo $result['audio_title'];?></td>
				                  <td><audio width="320" height="240" controls>
                            <source src="../<?php echo $result['audio'];?>" type="video/mp4">
                            </audio></td>
				                   <td>	<?php
				                  if ($result['status']==1) {
				                  		?>
				                  	<a href="?unpublishid=<?php echo $result['audio_id'];?>">unPublish now</a> 
				                  	<?php
				                  }else{
				                  	?>
				                  	<a href="?publishid=<?php echo $result['audio_id'];?>">Publish now</a> 
				                  	<?php
				                  }


				                  ?> 	<?php if($status==1 || $status==0) {?> || <a href="?delid=<?php echo $result['audio_id'];?>">Delete</a> <?php } ?></td>
				                 
				                </tr>
				               <?php } }?>
				              </tbody>
				            </table>
		  				</div>

 
		  </div>
		</div>
    </div>


   <?php 


$getCourse = $ot->courseViewStudentaudio();
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
                        <div class="center">
                            <div class="pagination">
                            <?php echo "<a href='courses.php?page=1'>".'&laquo;'."</a>";
                            for ($i=1; $i <= $total_page; $i++) { 
                                    echo "<a class='active' href='courses.php?page=".$i."'>".$i."</a>";
                                };
                                echo "<a href='courses.php?page=$total_page'>".'&raquo;'."</a>"; ?>
                                         
                            </div>
                        </div>
                        <?php } ?>
   <?php include 'include_a/footer.php';?>