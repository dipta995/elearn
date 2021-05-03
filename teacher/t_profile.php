
    <?php include 'include_t/header.php';?>     <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
           

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-11 col-lg-10">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">MY PROFILE</h6>
                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div >
                    <div class="row">
                      
            <?php
             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $insertdata = $ad->updateprofileteacher($_POST,$_FILES,$teacherId);
                }

            $getCourse = $co->teacher_profile($teacherId);
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <input class="form-control form-control-user" type="text" value="<?php echo $result['first_name']; ?>" name="first_name"> <br>
                  <input class="form-control form-control-user" type="text" value="<?php echo $result['last_name']; ?>" name="last_name"> <br>
                  <input class="form-control form-control-user" type="text" value="<?php echo $result['email']; ?>" name="email"> <br>
                  <input class="form-control form-control-user" type="text" value="<?php echo $result['phone']; ?>" name="phone"> <br>
                  <div class="row">
                    <div class="col-sm-4">
                  <input class="form-control form-control-user" type="file" name="image">
                      
                    </div>
                    <div class="col-sm-8">
                       <img style="width: 100px; height: 100px; border: 25px; float: right;" src="../<?php echo $result['image']; ?>"> 
                    </div>
                  </div>
                  <input class="btn btn-success" type="submit" name="submit" value="Update Profile">
                </form>
              <?php } } ?>
                     

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
          
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
        
            
              </div>

              <!-- Color System -->
              <div class="row">
                <div class="col-md-12"></div>  
              </div>

            </div>

            <div class="col-lg-6 mb-4">

            

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include 'include_t/footer.php';?>