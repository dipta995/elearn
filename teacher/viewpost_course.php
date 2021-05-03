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
            $getCourse = $ad->postViewBycoursegroup($courseid);
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
                <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="delete/deletepost.php?delid=<?php echo $result['data_id'];?>">Delete</a>

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
