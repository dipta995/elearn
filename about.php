<?php include 'include/header.php'?>

    
    <!-- <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">About Us</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">About Us</span>
      </div>
    </div>

   

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <img src="images/course_4.jpg" alt="Image" class="img-fluid"> 
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>Why Academics Works</span>
                    </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque dolore libero corrupti! Itaque, delectus?</p>
                    <p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum totam facere.</p>
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                        <img src="images/course_5.jpg" alt="Image" class="img-fluid"> 
                    </div>
                    <div class="col-lg-5 mr-auto align-self-center order-2 order-lg-1">
                        <h2 class="section-title-underline mb-5">
                            <span>Personalized Learning</span>
                        </h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque dolore libero corrupti! Itaque, delectus?</p>
                        <p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum totam facere.</p>
                    </div>
                </div>
        </div>
    </div>
 -->

    <div>
      <br>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center text-center">
          <div class="col-lg-4 mb-5">
            <h2 class="section-title-underline mb-5">
              <span>Our Teachers</span>
            </h2>
          </div>
        </div>
        <div class="row">

          <?php
                $getCourse = $ot->teacherView();
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">

            <div class="feature-1 border person text-center">
                <img src="<?php echo $result['image']?>" alt="Image" class="img-fluid">
              <div class="feature-1-content">
                <h2><?php echo $result['first_name']." ".$result['last_name']; ?></h2>
                <!-- <span class="position mb-3 d-block">Math Teacher</span>  -->   
                <p><?php echo $result['email']?></p>
              </div>
            </div>
          </div>

      <?php } }?>
          
        </div>
      </div>
    </div>


    
    



    <?php include 'include/footer.php'?>