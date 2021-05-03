
<?php include 'include/header.php';
Session::checkSession($redirect_link_var);
$courseid= $_GET['courseid'];
$course_name ="";
$teacher ="";
?>
<div>
    <br>
</div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p><br>
                        <button class="btn btn-success vdo">Course Video</button>
                        <table class="video">
                          <?php
                          $getCourse = $ad->postViewStudent($courseid);
                            if ($getCourse) {
                              while ($result = $getCourse->fetch_assoc()) {
                          ?>
                          <tr>
                            <td>
                              <iframe width="450px" height="200px" src="https://www.youtube.com/embed/<?php echo $result['video'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </td>
                          </tr>
                        <?php } } ?>
                        </table>
                    </p>
                    
                    <p>
                      <button class="btn btn-success ado">Attast Files</button>
                        <table class="audio">

                          <?php
                          $getCourse = $ad->postViewStudentfile($courseid);
                            if ($getCourse) {
                              $a =0;
                              while ($result = $getCourse->fetch_assoc()) {
                                $a++;
                          ?>
                          <tr>
                            <td>

                            <strong style="color: green; font-size: 16px;"><?php echo $a.'. '.$result['file_title']; ?></strong> <a class="btn btn-primary" href="#">Download</a><form method="get" action="<?php echo $result['file_txt'];?>">
                                    
                                </form>
                    </td>
                          </tr>
                        <?php } } ?>
                        </table>
                    </p> 

                   
                    <p>
                      <button class="btn btn-success fil">Course Audio</button>
                        <table class="file">

                          <tr>
                            <td>
                          <?php
                          $getCourse = $ad->postViewStudentaudio($courseid);
                            if ($getCourse) {
                              while ($result = $getCourse->fetch_assoc()) {
                          ?>
                             <audio width="320" height="240" controls>
                            <source src="<?php echo $result['audio'];?>" type="video/mp4">
                            </audio>
                        <?php } } ?>
                            </td>
                          </tr>
                        </table>
                    </p>
                </div>
            
                <div class="col-lg-5 ml-auto align-self-center">
                  <?php 
                          $getCourses = $ad->postdetailview($courseid);
                            if ($getCourses) {
                              while ($result = $getCourses->fetch_assoc()) {
                  ?>
                        <h2 class="section-title-underline mb-5">
                            <span>Course Details</span>
                        </h2>
                        <p><strong class="text-black d-block">Course name:</strong> <?php  echo $teacher = $result['course_name']; ?></p>
                        <p><strong class="text-black d-block">Teacher:</strong> <?php  echo $teacher = $result['first_name'] ." ". $result['last_name']; ?></p>

                        <p><?php  echo $result['course_overview'] ?></p>
                         
                      <?php } } ?>
                        <ul class="ul-check primary list-unstyled mb-5">
                          <strong class="text-black d-block">Comments ---</strong>
                             <?php
                          $comment = $com->commentviewBystudent($courseid);
                          if ($comment) {
                          while ($result = $comment->fetch_assoc()) {
                          ?>
                            <span style="color: #634be6;font-size: 16px;font-weight: 600;"><?php  echo $result['first_name'].":" ?></span><span style="margin-left: 40px; color: black;font-size: 20px; background-color: #51be7842; padding: 5px;"><?php  echo $result['student_comment'] ?></span><br><br>
                            <?php
                              if ($result['teacher_status']=="0") {
                                 }else{ ?>
                             <span style="color: #634be6;font-size: 16px;font-weight: 600;"><?php echo $teacher; ?></span><span style="margin-left: 20px; color: black;font-size: 20px; background-color: #d8878e66; padding: 5px;"> <?php echo $result['teacher_comment'];?></span>
                        
                            <hr>
                           <?php } } }?>
                           
                           
                        </ul>
                        <?php
  if (isset($_POST['sendcmd'])){
      $insertdata = $com->insertComment($_POST,$courseid);

  }
                   if (Session::get('student_id') == true) {
?>
                        <form method="post" action="">
                          <textarea class="form-control form-control-user" name="student_comment" id="exampleInputEmail" aria-describedby="emailHelp"></textarea>
                          <input type="hidden" name="s_id" value="<?php  echo $studentId; ?>">
                          <br>
                          <input class="btn btn-success" type="submit" name="sendcmd" value="Comment">
                        </form>
                      <?php } else{?>
                         <p>Comment section is not available For you</p>
                    <?php  } ?>
                        <p>
                             <?php include 'rating/index.php'; ?>
                        </p>

                    </div>
            </div>
        </div>
    </div>
<script>
$(document).ready(function(){
  $(".vdo").click(function(){
    $(".video").toggle();
  });

  $(".ado").click(function(){
    $(".audio").toggle();
  });$(".fil").click(function(){
    $(".file").toggle();
  });
});
</script>
    
  <?php include 'include/footer.php'; ?>