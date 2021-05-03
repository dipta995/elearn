 <?php include 'include_t/header.php';?>
<div class="container-fluid">
  <?php
  $replayid = $_GET['replayid'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $insertdata = $com->updateComment($_POST,$replayid);

  }
  ?>
          <form method="post" action="" class="user">
            <span style="color:red; font-weight: 200px;">

                 <?php if (isset($insertdata)){
                 echo $insertdata;
                 }  ?>
               </span>
                    
   
                    <div class="form-group">

                 
                      <textarea class="form-control form-control-user" name="teacher_comment" id="exampleInputEmail" aria-describedby="emailHelp"></textarea>
                    </div>
          

                   <button class="btn btn-primary btn-user btn-block">Replay</button>
                    <hr>


                  </form>

        </div>


              <?php include 'include_t/footer.php';?>
