 <?php include 'include_t/header.php';?> 
<div class="container-fluid">
  <h2>Create A new Course</h2>
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertCourseName = $co->courseInsert($_POST,$_FILES);  
}
  ?>
          <form method="post" action="" class="user" enctype="multipart/form-data">
                <span>

              <?php if (isset($insertCourseName)){
              echo $insertCourseName;
              }  ?>
              </span>
                    
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="course_name" placeholder="Enter Course Name...">
                    </div>
                    <div class="form-group">
                       
                      <textarea class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Course Overview (100 To 600 Words)" name="course_overview" ></textarea>
                    </div>
                     <div class="form-group">
                      <label style="color: red;">Course Banner: </label>
                      <input type="file" name="image">
                    </div>
                     <div class="form-group">
                      <select name="catId" style="border-radius: 35px; padding: 13px; min-width: 1240px;" >
                        <option  value="">Select Catagory</option>
            <?php
             $getCat = $ca->catView();
               if ($getCat) {
                 while ($result = $getCat->fetch_assoc()) {
              ?>
                        <option name="catId" value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>

                      <?php } } ?>
                      </select>
                    </div>
                      
                    <input type="hidden" name="teacherId" value="<?php echo Session::get('teacher_id'); ?>">
                   <button class="btn btn-primary btn-user btn-block">Add Course</button>
                    <hr>
                    
                    
                  </form>

        </div>


              <?php include 'include_t/footer.php';?>