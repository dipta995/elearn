 <?php include 'include_t/header.php';?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<?php
if (isset($_GET['delid'])) {
$delid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delid']);
$delid =$del->delpostbyid($delid);
}
?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
      <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="viewpostaudio.php">Audio</a>
         <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="viewpost.php">Video</a>
         <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="viewpostfile.php">Files</a>
        <?php 
                  if (isset($delid)) {
                    echo $delid;
                  }
                ?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tutorial</th>
              <th>Course Name</th>
              <th>Post Summery</th>
              <th>Action</th>

            </tr>
          </thead>

          <tbody>
            <?php

            $getCourse = $ad->postViewByteacher($teacherId);
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
            <tr>

              <td>
                <iframe width="300px" height="200px" src="https://www.youtube.com/embed/<?php echo $result['video'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </td>


              <td><?php echo $result['course_name'];?></td>
              <td><?php 
                  if ($result['status']==0) {
                   echo "Pending";
                  }else{
                    echo "Approved";
                  }
              ?></td>
              <td>
                <a style="background-color: #f44336; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="editpost.php?editid=<?php echo $result['data_id'];?>">Edit</a>
                <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" onclick="return confirm('are you sure to delete')"  href="?delid=<?php echo $result['data_id'];?>">Delete</a>
           
         

              </td>

            </tr>
          <?php } } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?php include 'include_t/footer.php';?>
