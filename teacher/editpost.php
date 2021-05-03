 <?php include 'include_t/header.php';?>
<div class="container-fluid">
  <?php
  $editid = $_GET['editid'];


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $insertdata = $ad->updateVideoUrl($_POST,$editid);
  }
  ?>
                        <?php
                       $viewCourse = $co->courseViewbyId($teacherId,$editid);
                         if ($viewCourse) {
                           while ($results = $viewCourse->fetch_assoc()) {
                        ?>
          <form method="post" action="" class="user">
            <span style="color:red; font-weight: 200px;">

                 <?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>
               </span>
                <div class="form-group">

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="data_title" value="<?php echo $results['data_title']; ?>">
                    </div>
                    <div class="form-group">
                      <select name="course_id" style="border-radius: 35px; padding: 13px; min-width: 1240px;" >
                        <option  value="<?php echo $results['courseId'];?>"><?php echo $results['course_name'];?></option>
                    
                        <?php
                       $getCourse = $co->courseView($teacherId);
                         if ($getCourse) {
                           while ($result = $getCourse->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result['courseId'];?>"><?php echo $result['course_name'];?></option>
                      <?php } }?>
                      </select>
                    </div>
                     <!-- <div class="form-group">
                       <label for="audio">Add Audion file</label>
                      <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Email Address...">
                    </div> -->
                    <div class="form-group">
                     

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="video" value="https://www.youtube.com/watch?v=<?php echo $results['video'];?>">
                    </div>
                    <input type="hidden" name="teacher_id" value="<?php echo Session::get('teacher_id'); ?>">

                   <button class="btn btn-primary btn-user btn-block">Update Course</button>
                    <hr>


                  </form>
                    <?php } }?>

        </div>


              <?php include 'include_t/footer.php';?>
