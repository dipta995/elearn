 <?php include 'include_t/header.php';?>
<!-- Begin Page Content -->
<div class="container-fluid">
<?php
if (isset($_GET['delid'])) {
$delid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delid']);
$delid =$del->delcoursebyid($delid);
}
?>

  <!-- Page Heading -->
<style>
.checked {
  color: orange;
}
</style>
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
              <th>NO</th>
              <th>Course Name</th>
              <th>Image</th>
              <th>Action</th>

            </tr>
          </thead>

          <tbody>
            <?php
 $course_id = "";
            $getCourse = $co->courseViewByteacher($teacherId);
              if ($getCourse) {
                $i = 0;
                while ($result = $getCourse->fetch_assoc()) {
                  $i++;
            ?>
            <tr>

              <td><?php echo $i; ?></td>


              <td><?php echo $course_name =  $result['course_name'];?></td>
              <td style="width: 30px;">
                <img style='height: 80px; width: 120px; ' src="../<?php echo $result['image'];?>">
              </td>
              <td>
                <a style="background-color: #f44336; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="editcourse.php?editid=<?php echo $result['courseId'];?>">Edit</a>
                <a style="background-color: green; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" onclick="return confirm('are you sure to delete')"  href="?delid=<?php echo $result['courseId'];?>">Delete</a>
                <a style="background-color: blue; color: white; padding: 12px 22px; text-decoration: none; display: inline-block;" href="commentcourse.php?courseid=<?php echo $course_id = $result['courseId'];?>">Check Comment</a> <br>
              <?php  $course_id = $result['courseId'];?>
                

                 <?php
               
                $getCourses = $rt->avgRate($course_name);
                if ($getCourses) {
                  while ($result = $getCourses->fetch_assoc()) {
                    if ($result['totalHit']==0) {
                      echo "<span style='color:red;'>NO RETTING</span>";

                    }else{
                    ?>
                    <p><?php $avgrating = round($result['rateNum']/$result['totalHit']);?></p>
                    <?php
                    switch ($avgrating) {
  case 1:
    ?>
    <span class="fa fa-star checked"></span>
    <?php
    break;
  case 2:
    ?>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <?php
    break;
  case 3:
     ?>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <?php
    break;
 case 4:
     ?>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <?php
    break;
 case 5:
     ?>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <?php
    break;

  default:
    ?>
         <span class="fa fa-star"></span>
    <?php
}
                     
                      }}}
//$course_id  = $result['courseId'];
                ?>

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
