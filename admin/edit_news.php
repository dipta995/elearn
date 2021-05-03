

 <?php include 'include_a/header.php';?>

		  <div class="col-md-10">
		  	<h3>Add News Feed</h3>
		     <div class="tab-pane" id="tab2">

 <?php 
$id = "";
if($_GET['editnewsid']==NULL || !isset($_GET['editnewsid'])){
	"<script>window.location = 'view_news.php'; </script>"; 
}else{
	$id = $_GET['editnewsid'];
}


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $updata = $ad->updatenewsfeed($_POST,$_FILES,$id);
  }
  ?>
				      	<?php
				      	if (isset($insertdata)) {
				      		echo $insertdata;
				      	}
				      	   $getCourse = $ot->newsfeedviewid($_GET['editnewsid']);
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {
				      	?>
			     <div class="tab-pane active" id="tab1">
				      <form action="" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
						    <div class="col-sm-10">
						      <input type="text" name="news_title" class="form-control" id="inputEmail3" value="<?php echo $result['news_title'] ?>">
						    </div>
						  </div>
						   
						  <div class="form-group">
						    <label class="col-sm-2 control-label">News Details</label>
						    <div class="col-sm-10">
						      <textarea name="news_details" class="form-control" rows="3"><?php echo $result['news_details'] ?></textarea>
						    </div>
						  </div>
						  
						   	<div class="form-group">
								<label class="col-sm-2 control-label">File input</label>
								<div class="col-sm-7">
									<input type="file" name="image" class="form-control" id="exampleInputFile1">
									 
								</div>
								<div class="col-sm-3">
									<img style="height: 120px; width: 100px;" src="../<?php echo $result['image'] ?>">
									 
								</div>
							</div>

						<input type="submit" class="btn btn-primary" value="Update post" name="submit">
						</form>
				</div>
						<?php } } ?>
			    </div>
		  </div>
		</div>
    </div>

   <?php include 'include_a/footer.php';?>