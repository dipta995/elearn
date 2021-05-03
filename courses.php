<?php include 'include/header.php'?>
  <?php
  $catid = $_GET["catid"];
  $per_page = 1;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page; //start for every page
  ?>
    <style type="text/css">
        .center {
  text-align: center;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
    </style>

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Courses</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">


                 <?php             
                $getCourse = $co->courseViewStudentlimit($start_form,$per_page,$catid);
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {
                        $course_id = $result['courseId'];

                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <a href="course-single.php?courseid=<?php echo $course_id;?>"><img style="height: 150px; width: 300px; margin-left: 25px;" src="<?php echo $result['image']?>" alt="Image" class="img-fluid"></a>
                        <!-- <div class="price">$99.00</div> -->
                        <div class="category"><h3><?php echo $result['catName']?></h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2><?php echo $course_name =  $result['course_name']?></h2>
                        <p class="desc mb-4"><?php echo $fm->textShorten($result['course_overview'],80);?></p>
                          <?php
               
                $getCourses = $rt->avgRate($course_name);
                if ($getCourses) {
                  while ($result = $getCourses->fetch_assoc()) {
                    ?>
                    <p><?php
                    if ($result['totalHit'] !=0) {
                      
                     $avgrating = round($result['rateNum']/$result['totalHit']);
                    }elseif($result['totalHit'] ==0){
                      $avgrating = 0;
                    }

                     ?></p>
                    <?php
    switch ($avgrating) {
  case 0:
    ?>
     <span> no rating</span>
    <?php
    break;
    case 1:
    ?>
     <span class="icon-star2 text-warning"></span>
    <?php
    break;
  case 2:
    ?>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
    <?php
    break;
  case 3:
     ?>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
    <?php
    break;
 case 4:
     ?>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
    <?php
    break;
 case 5:
     ?>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
     <span class="icon-star2 text-warning"></span>
    <?php
    break;

  default:
    ?>
     <p>No Rating</p>
    <?php
}
                     
                      }}

                ?>
                 
                        </div>
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-5">
                             <a href="course-single.php?courseid=<?php echo $course_id;?>" class="btn btn-success">Enroll In This Course</a>
                          </div>
                          <div class="col-md-4"></div>
                          
                      
                        </div>

                        </div>
                    </div>
               <?php } }?>
                </div>

            </div>
        </div>
    </div>

<?php 
$getCourse = $co->courseViewStudentids($catid);
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
                        <div class="center">
                            <div class="pagination">
                            <?php echo "<a href='courses.php?catid=$catid&page=1'>".'&laquo;'."</a>";
                            for ($i=1; $i <= $total_page; $i++) { 
                                    echo "<a class='active' href='courses.php?catid=$catid&page=".$i."'>".$i."</a>";
                                };
                                echo "<a href='courses.php?catid=$catid&page=$total_page'>".'&raquo;'."</a>"; ?>
                                         
                            </div>
                        </div>
                    
    <?php include 'include/footer.php'?>