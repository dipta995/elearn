
    <div class="footer">
      <div class="container">
        <div class="row">
       
          <div class="col-lg-2"></div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                 <?php
                $getCourse = $ot->courseView();
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {

                ?>
                  <li><a href="courses.php?catid=<?php echo $result['catId']?>"><?php echo $result['catName']?></a></li>
                 <?php } } ?>
              </ul>
          </div>
          <div class="col-lg-4">
              <h3 class="footer-heading"><span>Office Address</span></h3>
                <?php
            //$courseid= $_GET['courseid'];
            $getCourse = $ot->officeview();
              if ($getCourse) {
                while ($result = $getCourse->fetch_assoc()) {
            ?>
              <p><?php echo $result['address']; ?></p>
              <p><?php echo $result['email']; ?></p>
              <p><?php echo $result['phone']; ?></p>
              
             <?php } } ?>

          </div>
          <div class="col-lg-3">
              <div class="copyright">
                <p>
                    
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
                   
                    </p>
            </div>
          </div>
        </div>

        <!-- <div class="row">
          <div class="col-12">
          
          </div>
        </div> -->
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->
<script>
    $("#review").rating({
        "value": 5,
        "click": function (e) {
            console.log(e);
            $("#starsInput").val(e.stars);
        }
    });

    
</script>

  <!-- loader -->
<!--   <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div> -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>


</body>

</html>