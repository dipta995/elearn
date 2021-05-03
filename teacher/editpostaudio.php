 <?php include 'include_t/header.php';?>
<div class="container-fluid">
  <h3>Audio Table</h3>
  <?php
  $editid = $_GET['editid'];


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $insertdata = $ad->updateaudio($_POST,$_FILES,$editid);
  }
  ?>
                        <?php
                       $viewCourse = $co->courseaudioViewbyId($teacherId,$editid);
                         if ($viewCourse) {
                           while ($results = $viewCourse->fetch_assoc()) {
                        ?>
          <form method="post" action="" class="user"  enctype="multipart/form-data">
            <span style="color:red; font-weight: 200px;">

                 <?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>
               </span>
                <div class="form-group">

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="audio_title" value="<?php echo $results['audio_title']; ?>">
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
                     

                      <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="audio">

                       <p><?php echo $results['audio'];?></p>

                      
                    </div>
                    <input type="hidden" name="teacher_id" value="<?php echo Session::get('teacher_id'); ?>">

                   <button class="btn btn-primary btn-user btn-block">Update Course</button>
                    <hr>


                  </form>
                    <?php } }?>

        </div>


              <?php include 'include_t/footer.php';?>
