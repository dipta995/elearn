<?php include 'include/header.php'; ?>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
                      <?php
                $getCourse = $ot->newsfeedviewid($_GET['newsid']);
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0"><?php echo $result['news_title']; ?></h2>
              <p><?php echo $result['date']; ?></p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">News</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 mb-4">
        
                    <p class="mb-5">
                        <img src="<?php echo $result['image']; ?>" alt="Image" class="img-fluid">
                    </p>
                    <p><?php echo $result['news_details']; ?></p>
                  <?php } } ?>
                </div>
                
            </div>
        </div>
    </div>

    
      
<?php include 'include/footer.php'; ?>
    