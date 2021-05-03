
<main class="container mt-4">
    <div class="row">
        

        <div class="col-12">
            <hr>
            <div class="row">
<?php
$totalHit = "";
$rateNum ="";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
$insertdata = $rt->updateRating($_POST,$course_name,$studentId);
//$insertdata = $rt->insertRating($studentId,$course_name);

}

$getCourses = $rt->avgRate($course_name);
                if ($getCourses) {
                  while ($result = $getCourses->fetch_assoc()) {

        

   
?>
           
                <div  style="font-size: 2em;">
                    <h5>Rate it now</h5>
                    <?php
                    if (isset($insertdata)) {
                      echo $insertdata;
                    }
                    ?>
                    <div id="review"></div>
               <form method="post" action="">
                   
                    <input type="hidden" readonly id="starsInput" name="rateNum" class="form-control form-control-sm">
                    <input type="hidden" value="<?php echo $result['totalHit']+1;?>" readonly id="starsInput" name="totalhit" class="form-control form-control-sm">
                    <input type="hidden" value="<?php echo $result['rateNum'];?>" readonly id="starsInput" name="ratenumber" class="form-control form-control-sm">
                   <?php
                 if (Session::get('student_id') == true) {
                    ?>
                    <input  class="icon-unlock-alt btn btn-success" type="submit" name="submit" value="Rate it Now">
                    <?php
               }else{
                    ?>
                    <h2>To Rate the course Please <a href="glog/">Log in</a>As student first</h2>
                    <?php 
               }

                    ?>

               </form>
                  
                </div>

              <?php } } ?>

                <div class="col-12">
                    
                </div>
            </div>
        </div>
    </div>
</main>

