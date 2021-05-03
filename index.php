<?php include 'include/header.php'?>
<?php include 'include/slide.php'?>

    <div class="site-section">
      <div class="container">


        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title-underline mb-3">
              <span>Popular Courses</span>
            </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              <div class="owl-slide-3 owl-carousel">
                <?php
               $course_id ="";
                $getCourse = $co->courseViewStudentLimits();
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>
                  <div class="course-1-item">
                    <figure class="thumnail">
                      <a href="course-single.php?courseid=<?php echo $result['courseId']?>"><img style="height: 150px;" src="<?php echo $result['image']?>" alt="Image" class="img-fluid"></a>

                      <div class="category"><h3><?php echo $result['catName']?></h3></div>
                      <div class="category"><h3><?php  $course_id  = $result['courseId'];?></h3></div>
                    </figure>
                    <div class="course-1-content pb-4">
                      <h2><?php echo $course_name = $result['course_name']?></h2>
                       
                      <div class="rating text-center mb-3">
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
}        }}

                ?>

                      </div>

                      <p><a href="course-single.php?courseid=<?php echo $course_id;?>" class="btn btn-success rounded-0 px-4">Enroll In This Course</a></p>
                    </div>
                  </div>
                <?php } } ?>

              </div>
               
          </div>
        </div>



      </div>
    </div>

<?php
                $getCourse = $ot->aboutView();
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>


    <div class="section-bg style-1" style="background-image: url('images/bg_1.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline style-2">
              <span><?php echo $result['head']?></span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p class="lead"><?php echo $result['body']?></p>
            
          </div>
        </div>
      </div>
    </div>

<?php } } ?>




    <div class="news-updates">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
             <div class="section-heading">
              <h2 class="text-black">News &amp; Updates</h2>
              <a href="news.php">Read All News</a>
            </div>
            <div class="row">
              <div class="col-lg-6">
                     <?php
                $getCourse = $ot->newsfeedviewspin();
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>
                <div class="post-entry-big">
                  <a href="news-single.php?newsid=<?php echo $result['news_id']; ?>" class="img-link"><img src="<?php echo $result['image']; ?>" alt="Image" class="img-fluid"></a>
                  <div class="post-content">
                    <div class="post-meta">
                      <a href="#">Updated At</a>
                      <span class="mx-1">/</span>
                      <a href="#"><?php echo $result['date']; ?></a>
                    </div>
                    <h3 class="post-heading"><a href="news-single.php?newsid=<?php echo $result['news_id']; ?>"><?php echo $result['news_title']; ?></a></h3>
                  </div>
                </div>
              <?php } } ?>
              </div>
              <div class="col-lg-6">
             

              

                <?php
                $getCourse = $ot->newsfeedview();
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>
                <div class="post-entry-big horizontal d-flex mb-4">
                  <a href="news-single.php?newsid=<?php echo $result['news_id']; ?>" class="img-link mr-4"><img src="<?php echo $result['image']; ?>" alt="Image" class="img-fluid"></a>
                  <div class="post-content">
                    <div class="post-meta">
                      <a href="#">Updated At</a>
                      <span class="mx-1">/</span>
                      <a href="#"><?php echo $result['date']; ?></a>
                    </div>
                    <h3 class="post-heading"><a href="news-single.php?newsid=<?php echo $result['news_id']; ?>"><?php echo $result['news_title']; ?></a></h3>
                  </div>
                </div>
              <?php } }?>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>



    <div>

    </div>

 <?php include 'include/footer.php'; ?>
