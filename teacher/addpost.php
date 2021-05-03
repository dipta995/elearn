 <?php include 'include_t/header.php';?>
<div class="container-fluid">
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['video_url'])) {
      $insvideo = $ad->insertVideoUrl($_POST);
  }
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['file_text'])) {
      $insfile = $ad->insertFiles($_POST,$_FILES);
  }
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['audio_file'])) {
      $insaudio = $ad->insertAudio($_POST,$_FILES);
  }
  ?>

  <div class="row">
    <div class="col-md-4">
      <p>Share your video url (Youtube)</p>
      <form method="post" action="" class="user">
            <span style="color:red; font-weight: 200px;">

                 <?php if (isset($insvideo)){
                 echo $insvideo;
                 }  ?>
               </span>
                    <div class="form-group">

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="data_title" placeholder="Enter Video title here..">
                    </div>
                    <div class="form-group">
                      <select name="course_id" style="border-radius: 35px; padding: 13px; min-width: 100%;" >
                        <option  value="">Select Couse Name</option>
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

                      <input type="url" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="video" placeholder="Video Url...">
                    </div>
                    <input type="hidden" name="teacher_id" value="<?php echo Session::get('teacher_id'); ?>">

                   <button name="video_url" class="btn btn-primary btn-user btn-block">Add Course</button>
                    <hr>


                  </form>



    </div>
    <div class="col-md-4">
      <p>share your text file </p>
                  <form method="post" action="" class="user" enctype="multipart/form-data">
            <span style="color:red; font-weight: 200px;">

                 <?php if (isset($insfile)){
                 echo $insfile;
                 }  ?>
               </span>
                     <div class="form-group">

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="file_title" placeholder="Enter the file title here">
                    </div>
                    <div class="form-group">
                      <select name="course_id" style="border-radius: 35px; padding: 13px; min-width: 100%;" >
                        <option  value="">Select Couse Name</option>
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

                      <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="file_txt">
                    </div>
                    <input type="hidden" name="teacher_id" value="<?php echo Session::get('teacher_id'); ?>">

                   <button name="file_text" class="btn btn-primary btn-user btn-block">Add document</button>
                    <hr>


                  </form>
    </div>
    <div class="col-md-4">
      <p>share your Audio file</p>
                  <form method="post" action="" class="user" enctype="multipart/form-data">
            <span style="color:red; font-weight: 200px;">

                 <?php if (isset($insaudio)){
                 echo $insaudio;
                 }  ?>
               </span>
                    <div class="form-group">

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="audio_title" placeholder="enter audio file title ">
                    </div>
                    <div class="form-group">
                      <select name="course_id" style="border-radius: 35px; padding: 13px; min-width: 100%;" >
                        <option  value="">Select Couse Name</option>
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
                    </div>
                    <input type="hidden" name="teacher_id" value="<?php echo Session::get('teacher_id'); ?>">

                   <button name="audio_file" class="btn btn-primary btn-user btn-block">Add Course</button>
                    <hr>


                  </form>
    </div>
  </div>
          







        </div>


              <?php include 'include_t/footer.php';?>
