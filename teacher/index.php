
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
                  <h6 class="m-0 font-weight-bold text-primary">Courses Overview</h6>
                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <div class="row">
                         <?php

            $getCourse = $co->courseView($teacherId);
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
                      <div class="col-md-3">
                        <a href="viewpost_course.php?courseid=<?php echo $result['courseId']?>">
                        <img style="width: auto; height: 100px; " src="../<?php echo $result['image'];?>">
                        <p><?php echo $result['course_name'];?></p>
                       
                        </a>
                      </div>

<?php } }?>
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