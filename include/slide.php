 <div class="hero-slide owl-carousel site-blocks-cover">

  <?php
  $slide = $ot->slideView();
                  if ($slide) {
                    while ($result = $slide->fetch_assoc()) {
  ?>
      <div class="intro-section" style="background-image: url('<?php echo $result['image']; ?>');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
              <h1><?php echo $result['title']; ?></h1>
            </div>
          </div>
        </div>
      </div>
    <?php } } ?>

    

    </div>


    <div></div>
