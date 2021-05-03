<?php include 'include/header.php'?>
  <?php
   
  $per_page = 9;
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
                $getCourse = $ot->newsfeedpagination($start_form,$per_page);
                  if ($getCourse) {
                    while ($result = $getCourse->fetch_assoc()) {
                        $id = $result['news_id'];

                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <a href="news-single.php?newsid=<?php echo $id;?>"><img style="height: 150px; width: 300px; margin-left: 25px;" src="<?php echo $result['image']; ?>" alt="Image" class="img-fluid"></a>
                        <!-- <div class="price">$99.00</div> -->
                        <div class="category"><h3><?php echo $fm->textShorten($result['news_title'],30);?></h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2><?php echo $fm->textShorten($result['news_details'],80);?></h2>
                    
                           
                        </div>
                        <dir class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-5">
                            <a href="news-single.php?newsid=<?php echo $id;?>" class="btn btn-primary">Read the news</a>
                          </div>
                          <div class="col-md-4"></div>
                        </dir>
                       

                        </div>
                    </div>
               <?php } }?>
                </div>

            </div>
        </div>
    </div>

<?php 


$getCourse = $ot->newsfeed();
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
                        <div class="center">
                            <div class="pagination">
                            <?php echo "<a href='news.php?page=1'>".'&laquo;'."</a>";
                            for ($i=1; $i <= $total_page; $i++) { 
                                    echo "<a class='active' href='news.php?page=".$i."'>".$i."</a>";
                                };
                                echo "<a href='news.php?page=$total_page'>".'&raquo;'."</a>"; ?>
                                         
                            </div>
                        </div>
    <?php include 'include/footer.php'?>