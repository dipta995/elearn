 <?php include 'include_t/header.php';?>
 <?php $courseid = $_GET['courseid'];?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
          
              <th>Course Name</th>
              <th>Course Picture</th>
              <th>Student Comment</th>
              <th>Teacher Comment</th>

            </tr>
          </thead>

          <tbody>
            <?php

            $comment = $com->commentviewByteacher($teacherId,$courseid);
              if ($comment) {
               
                while ($result = $comment->fetch_assoc()) {
                 
            ?>
            <tr>

            


              <td><?php echo $result['course_name'];?></td>
              <td style="width: 30px;">
                <img style='height: 80px; width: 120px; ' src="../<?php echo $result['image'];?>">
              </td>


              <td><?php echo $result['student_comment'];?></td>
              <?php if ($result['teacher_status']=='0'){
                ?>
              <td>     <a style="background-color: #f44336; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="replaycomment.php?replayid=<?php echo $result['c_id'];?>">Replay</a></td>
                
                <?php 
              }else{ ?>
              <td><?php echo $result['teacher_comment'];?></td>

<?php } ?>



              <td>
           
             

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
