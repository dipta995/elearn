 <?php include 'include_t/header.php';?>
<div class="container-fluid">
    <h2>Create A new Course</h2>
  <?php
  $editid = $_GET['editid'];


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $insertdata = $ad->updateCourseTitle($_POST,$_FILES,$editid);
  }
  ?>
                        <?php
                       $viewCourse = $co->coursetitleViewbyId($teacherId,$editid);
                         if ($viewCourse) {
                           while ($results = $viewCourse->fetch_assoc()) {
                        ?>
          <form method="post" action="" class="user" enctype="multipart/form-data">
            <span style="color:red; font-weight: 200px;">

                 <?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>
               </span>
                   
                     <!-- <div class="form-group">
                       <label for="audio">Add Audion file</label>
                      <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Email Address...">
                    </div> -->
                    <div class="form-group">
                     

                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="course_name" value="<?php echo $results['course_name'];?>">
                    </div>
                    <div class="row">
                      
                    <div class="form-group col-md-8">
                     

                      <input type="file" class="form-control form-control-user" name="image">
                    </div>
                    <div class="form-group col-md-8">
                     <textarea name="course_overview" class="form-control form-control-user"><?php echo $results['course_overview'] ?></textarea>
                    </div>
                     <div class="form-group col-md-4">
                     
                      <img style="height: 150px; width: 200px;" name="image" src="../<?php echo $results['image'] ?>">
                    </div>
                    <div class="form-group">
                      <select name="catId" style="border-radius: 35px; padding: 13px; min-width: 1240px;" >
                        <option  value="<?php echo $results['catId'] ?>"><?php echo $results['catName'] ?></option>
            <?php
             $getCat = $ca->catView();
               if ($getCat) {
                 while ($result = $getCat->fetch_assoc()) {
              ?>
                        <option name="catId" value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>

                      <?php } } ?>
                      </select>
                    </div>
                    </div>
                    <input type="hidden" name="teacher_id" value="<?php echo Session::get('teacher_id'); ?>">

                   <button class="btn btn-primary btn-user btn-block">Update Course</button>
                    <hr>


                  </form>
                    <?php } }?>

        </div>


              <?php include 'include_t/footer.php';?>
