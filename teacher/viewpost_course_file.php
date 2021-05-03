 <?php include 'include_t/header.php';
 $courseid= $_GET['courseid'];
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
           <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="viewpost_course_audio.php?courseid=<?php echo $courseid;?>">Audio</a>
         <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="viewpost_course.php?courseid=<?php echo $courseid;?>">Video</a>
         <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="viewpost_course_file.php?courseid=<?php echo $courseid;?>">Files</a>
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
            $courseid= $_GET['courseid'];
            $getCourse = $ad->postViewBycoursegroupfile($courseid);
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
            <tr>

              <td>
               <a href="#"><?php echo $result['file_txt'];?></a><form method="get" action="../<?php echo $result['file_txt'];?>">
                                   <button type="submit">Download!</button>
                                </form>
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
                <a style="background-color: #f44336; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="editpostfile.php?editid=<?php echo $result['file_id'];?>">Edit</a>
                <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" onclick="return confirm('are you sure to delete')"  href="?delid=<?php echo $result['file_id'];?>">Delete</a>
           
         

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
