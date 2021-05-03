
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class AddCourse{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}


  public function insertVideoUrl($data){
    $course_id = $this->fm->validation($data['course_id']);
    $course_id = mysqli_real_escape_string($this->db->con, $course_id);
    $data_title = $this->fm->validation($data['data_title']);
    $data_title = mysqli_real_escape_string($this->db->con, $data_title);
    $video = $this->fm->validation($data['video']);
		$findme = '=';
	  $pos = strpos($video,$findme);
		$video = substr($video,$pos+1);
    $video = mysqli_real_escape_string($this->db->con, $video);
    $teacher_id = $this->fm->validation($data['teacher_id']);
    $teacher_id = mysqli_real_escape_string($this->db->con, $teacher_id);


      if (empty($course_id) || empty($data_title) || empty($video)) {
        $loginmsg = "<div class='alert alert-danger'>Please insert required data</div>";
        return $loginmsg;


    }else{

    $query = "INSERT INTO data_table(course_id,data_title,video,teacher_id)VALUES('$course_id','$data_title','$video','$teacher_id')";
     $insert_row = $this->db->datainsert($query);
        if ($insert_row) {
          $loginmsg = "<div class='alert alert-success'>Video Created Successfully</div>";
        return $loginmsg;
        }else{
          $loginmsg = "<div class='alert alert-danger'>Something wrong please try again</div>";
        return $loginmsg;
        }
    }

  }

    public function updateVideoUrl($data,$id){
    $course_id = $this->fm->validation($data['course_id']);
    $course_id = mysqli_real_escape_string($this->db->con, $course_id);
    $data_title = $this->fm->validation($data['data_title']);
    $data_title = mysqli_real_escape_string($this->db->con, $data_title);
    $video = $this->fm->validation($data['video']);
    $findme = '=';
    $pos = strpos($video,$findme);
    $video = substr($video,$pos+1);
    $video = mysqli_real_escape_string($this->db->con, $video);



      if (empty($course_id) ||empty($data_title) || empty($video)) {
        $loginmsg = "<div class='alert alert-danger'>All Field is required</div>";
        return $loginmsg;
    }

    $query = "UPDATE data_table
                        SET
                        course_id                 = '$course_id',
                        data_title                 = '$data_title',
                        video                     = '$video'
                        WHERE data_id             = '$id'";
     $insert_row = $this->db->dataupdate($query);
        if ($insert_row) {
        
          $loginmsg = "<div class='alert alert-success'>SuccessFully Updated</div>";
        return $loginmsg;
          
        }else{
          $msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
          return $msg;
        }
  }

     public function updatefile($data,$file,$id){
     $course_id = $this->fm->validation($data['course_id']);
    $course_id = mysqli_real_escape_string($this->db->con, $course_id);
    $file_title = $this->fm->validation($data['file_title']);
    $file_title = mysqli_real_escape_string($this->db->con, $file_title);


     $permited  = array('jpg', 'jpeg', 'png', 'docs', 'pdf', 'pptx', 'gif');
    $file_name = $file['file_txt']['name'];
    $file_size = $file['file_txt']['size'];
    $file_temp = $file['file_txt']['tmp_name'];


    $div            = explode('.', $file_name);
    $file_ext       = strtolower(end($div));
    $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_file = "images/".$unique_file;
    $move_file = "../images/".$unique_file;



      if (empty($course_id) || empty($file_title)) {
        $loginmsg = "<div class='alert alert-danger'>All Field is required</div>";
        return $loginmsg;
        return $loginmsg;
    }else{
      if (!empty($file_name)) {
        move_uploaded_file($file_temp, $move_file);
         $query = "UPDATE file_table
                        SET
                         course_id                 = '$course_id',
                         file_title                 = '$file_title',
                        file_txt                       = '$uploaded_file'
                        WHERE file_id              = '$id'";
      } else{
         $query = "UPDATE file_table
                        SET
                        file_title                 = '$file_title',
                        course_id                 = '$course_id'
                        WHERE file_id             = '$id'";
      }
   
 
     $insert_row = $this->db->dataupdate($query);
        if ($insert_row) {
 
          $loginmsg = "<div class='alert alert-success'>SuccessFully Updated</div>";
        return $loginmsg;
        }else{
          $msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
          return $msg;
        }
         }
  }

        public function updatenewsfeed($data,$file,$id){
             $news_title = $this->fm->validation($data['news_title']);
            $news_title = mysqli_real_escape_string($this->db->con, $news_title);
            $news_details = $this->fm->validation($data['news_details']);
            $news_details = mysqli_real_escape_string($this->db->con, $news_details);


             $permited  = array('jpg', 'jpeg', 'png', 'docs', 'pdf', 'pptx', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];


            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_file = "images/".$unique_file;
            $move_file = "../images/".$unique_file;



              if (empty($news_title)) {
                $loginmsg = "<span style='color:red; font-size: 15px;'>Course title must not be empty</span>";
                return $loginmsg;
            }else{
              if (!empty($file_name)) {
                move_uploaded_file($file_temp, $move_file);
                 $query = "UPDATE news_table
                                SET
                                 news_title                 = '$news_title',
                                 news_details                 = '$news_details',
                                image                       = '$uploaded_file'
                                WHERE news_id              = '$id'";
              } else{
                 $query = "UPDATE news_table
                                SET
                                news_title                 = '$news_title',
                                news_details                 = '$news_details'
                                WHERE news_id             = '$id'";
              }
            }
         
             $insert_row = $this->db->dataupdate($query);
                if ($insert_row) {
                  $msg=  "<span style='color:green; font-size: 15px;'>SuccessFully Updated</span>";
                  return $msg;
                }else{
                  $msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
                  return $msg;
                }
          }



          public function updateprofileteacher($data,$file,$id){
            $first_name = $this->fm->validation($data['first_name']);
            $first_name = mysqli_real_escape_string($this->db->con, $first_name);
            $last_name = $this->fm->validation($data['last_name']);
            $last_name = mysqli_real_escape_string($this->db->con, $last_name);
            $email = $this->fm->validation($data['email']);
            $email = mysqli_real_escape_string($this->db->con, $email);
            $phone = $this->fm->validation($data['phone']);
            $phone = mysqli_real_escape_string($this->db->con, $phone);


             $permited  = array('jpg', 'jpeg', 'png', 'docs', 'pdf', 'pptx', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];


            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_file = "images/".$unique_file;
            $move_file = "../images/".$unique_file;



              if (empty($first_name) || empty($last_name) || empty($email)|| empty($phone)) {
                $loginmsg = "<span style='color:red; font-size: 15px;'>Course title must not be empty</span>";
                return $loginmsg;
            }else{
              if (!empty($file_name)) {
                move_uploaded_file($file_temp, $move_file);
                 $query = "UPDATE teacher_table
                                SET
                                 first_name                 = '$first_name',
                                 last_name                 = '$last_name',
                                 email                 = '$email',
                                 phone                 = '$phone',
                                image                       = '$uploaded_file'
                                WHERE teacher_id              = '$id'";
              } else{
                 $query = "UPDATE teacher_table
                                SET
                               first_name                 = '$first_name',
                                 last_name                 = '$last_name',
                                 email                 = '$email',
                                 phone                 = '$phone'
                                WHERE teacher_id             = '$id'";
              }
            }
         
             $insert_row = $this->db->dataupdate($query);
                if ($insert_row) {
                  $msg=  "<span style='color:green; font-size: 15px;'>SuccessFully Updated</span>";
                  return $msg;
                }else{
                  $msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
                  return $msg;
                }
          }



     public function updateaudio($data,$file,$id){
     $course_id = $this->fm->validation($data['course_id']);
    $course_id = mysqli_real_escape_string($this->db->con, $course_id); 
    $audio_title = $this->fm->validation($data['audio_title']);
    $audio_title = mysqli_real_escape_string($this->db->con, $audio_title);


     $permited  = array('mp4','3gp','mp3');
    $file_name = $file['audio']['name'];
    $file_size = $file['audio']['size'];
    $file_temp = $file['audio']['tmp_name'];


    $div            = explode('.', $file_name);
    $file_ext       = strtolower(end($div));
    $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_file = "images/".$unique_file;
    $move_file = "../images/".$unique_file;



      if (empty($course_id)|| empty($audio_title)) {
        $loginmsg = "<div class='alert alert-danger'>All Field is required</div>";
        return $loginmsg;
    }else{
      if (!empty($file_name)) {
        move_uploaded_file($file_temp, $move_file);
         $query = "UPDATE audio_table
                        SET
                         course_id                 = '$course_id',
                         audio_title                 = '$audio_title',
                        audio                       = '$uploaded_file'
                        WHERE audio_id              = '$id'";
      } else{
         $query = "UPDATE audio_table
                        SET
                        audio_title                 = '$audio_title',
                        course_id                 = '$course_id'
                        WHERE audio_id             = '$id'";
      }
    }
 
     $insert_row = $this->db->dataupdate($query);
        if ($insert_row) {
          $loginmsg = "<div class='alert alert-success'>Successfully Updated</div>";
        return $loginmsg;
        }else{
          $msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
          return $msg;
        }
  }




public function updateCourseTitle($data,$file,$id){
    $course_name = $this->fm->validation($data['course_name']);
    $catId = $this->fm->validation($data['catId']);
    $course_name = mysqli_real_escape_string($this->db->con, $course_name);
    $catId = mysqli_real_escape_string($this->db->con, $catId);
    $course_overview = $this->fm->validation($data['course_overview']);
    $course_overview = mysqli_real_escape_string($this->db->con, $course_overview);


    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div            = explode('.', $file_name);
    $file_ext       = strtolower(end($div));
    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "images/".$unique_image;
    $move_image = "../images/".$unique_image;



      if (empty($course_name) || empty($course_overview) ) {
          $loginmsg = "<div class='alert alert-danger'>All Field is Required</div>";
        return $loginmsg;
    }else{
      if (!empty($file_name)) {
        move_uploaded_file($file_temp, $move_image);
         $query = "UPDATE course_table
                        SET
                        course_name                 = '$course_name',
                        course_overview                 = '$course_overview',
                        catId                 = '$catId',
                        image                       = '$uploaded_image'
                        WHERE courseId              = '$id'";
      } else{
         $query = "UPDATE course_table
                        SET
                        course_name                 = '$course_name',
                        catId                 = '$catId',
                        course_overview                 = '$course_overview'
                        WHERE courseId             = '$id'";
      }
    
 
     $insert_row = $this->db->dataupdate($query);
        if ($insert_row) {
     
          $loginmsg = "<div class='alert alert-success'>Successfully Updated Your Course</div>";
        return $loginmsg;
        }else{
         $loginmsg = "<div class='alert alert-danger'>Try Again</div>";
        return $loginmsg;
        } 
        }
  }

    public function postViewByteacher($id){
  		$query = "SELECT * FROM data_table LEFT JOIN course_table On course_table.courseId = data_table.course_id WHERE data_table.teacher_id=$id ORDER BY status ASC";
  		$result = $this->db->dataselect($query);
  		return $result;
  	}
     public function postViewByteacherfile($id){
      $query = "SELECT * FROM file_table LEFT JOIN course_table On course_table.courseId = file_table.course_id WHERE file_table.teacher_id=$id";
      $result = $this->db->dataselect($query);
      return $result;
    }
     function postViewByteacheraudio($id){
      $query = "SELECT * FROM audio_table LEFT JOIN course_table On course_table.courseId = audio_table.course_id WHERE audio_table.teacher_id=$id";
      $result = $this->db->dataselect($query);
      return $result;
    }
    public function postViewStudent($id){
  		$query = "SELECT * FROM data_table LEFT JOIN course_table On course_table.courseId = data_table.course_id WHERE data_table.course_id='$id' AND status=1";
  		$result = $this->db->dataselect($query);
  		return $result;
  	}
    public function postViewStudentaudio($id){
      $query = "SELECT * FROM audio_table LEFT JOIN course_table On course_table.courseId = audio_table.course_id WHERE audio_table.course_id='$id' AND status = '1'";
      $result = $this->db->dataselect($query);
      return $result;
    }
     public function postViewStudentfile($id){
      $query = "SELECT * FROM file_table LEFT JOIN course_table On course_table.courseId = file_table.course_id WHERE file_table.course_id='$id' AND status = '1'";
      $result = $this->db->dataselect($query);
      return $result;
    }
    public function postdetailview($id){
      $query = "SELECT * FROM teacher_table LEFT JOIN course_table On course_table.teacherId = teacher_table.teacher_id WHERE course_table.courseId='$id'";
      $result = $this->db->dataselect($query);
      return $result;
    }
    public function postViewBycoursegroup($id){
      $query = "SELECT * FROM data_table LEFT JOIN course_table On course_table.courseId = data_table.course_id WHERE course_id='$id'";
      $result = $this->db->dataselect($query);
      return $result;
    }

   public function postViewBycoursegroupaudio($id){
        $query = "SELECT * FROM audio_table LEFT JOIN course_table On course_table.courseId = audio_table.course_id WHERE audio_table.course_id='$id'";
        $result = $this->db->dataselect($query);
        return $result;
      }

     public function postViewBycoursegroupfile($id){
          $query = "SELECT * FROM file_table LEFT JOIN course_table On course_table.courseId = file_table.course_id WHERE file_table.course_id='$id'";
          $result = $this->db->dataselect($query);
          return $result;
        }



    public function insertFiles($data,$file){
    $course_id = $this->fm->validation($data['course_id']);
    $course_id = mysqli_real_escape_string($this->db->con, $course_id);
    $file_title = $this->fm->validation($data['file_title']);
    $file_title = mysqli_real_escape_string($this->db->con, $file_title);
    $teacher_id = $this->fm->validation($data['teacher_id']);
    $teacher_id = mysqli_real_escape_string($this->db->con, $teacher_id);



    $permited  = array('jpg', 'jpeg', 'png', 'docs', 'pdf', 'pptx', 'gif');
    $file_name = $file['file_txt']['name'];
    $file_size = $file['file_txt']['size'];
    $file_temp = $file['file_txt']['tmp_name'];


    $div            = explode('.', $file_name);
    $file_ext       = strtolower(end($div));
    $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_file = "images/".$unique_file;
    $move_file = "../images/".$unique_file;



      if (empty($course_id) || empty($file_title) || empty($teacher_id)) {
        $loginmsg = "<div class='alert alert-danger'>Please Fill Up All field</div>";
        return $loginmsg;
    }elseif (empty($file_ext)) {
       $loginmsg = "<div class='alert alert-danger'>docs of pdf is required</div>";
        return $loginmsg;
    }


    else{
    move_uploaded_file($file_temp, $move_file);
    $query = "INSERT INTO file_table(course_id,file_title,file_txt,teacher_id)VALUES('$course_id','$file_title','$uploaded_file','$teacher_id')";
     $insert_row = $this->db->datainsert($query);
        if ($insert_row) {
         $loginmsg = "<div class='alert alert-success'>File Uploaded</div>";
        return $loginmsg;
        }else{
          $loginmsg = "<div class='alert alert-danger'>something wrong try again</div>";
        return $loginmsg;
        }
        }
  }

  public function insertAudio($data,$file){
    $audio_title = $this->fm->validation($data['audio_title']);
    $audio_title = mysqli_real_escape_string($this->db->con, $audio_title);
    $course_id = $this->fm->validation($data['course_id']);
    $course_id = mysqli_real_escape_string($this->db->con, $course_id);
    $teacher_id = $this->fm->validation($data['teacher_id']);
    $teacher_id = mysqli_real_escape_string($this->db->con, $teacher_id);



    $permited  = array('mp3','mp4');
    $file_name = $file['audio']['name'];
    $file_size = $file['audio']['size'];
    $file_temp = $file['audio']['tmp_name'];


    $div            = explode('.', $file_name);
    $file_ext       = strtolower(end($div));
    $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_file = "images/".$unique_file;
    $move_file = "../images/".$unique_file;



      if (empty($course_id) ||empty($audio_title) || empty($teacher_id)) {
        $loginmsg = "<div class='alert alert-danger'>Fill up All field</div>";
        return $loginmsg;


    }elseif (empty($file_ext)) {
       $loginmsg = "<div class='alert alert-danger'>Audio file is required</div>";
        return $loginmsg;
    }else{


    move_uploaded_file($file_temp, $move_file);
    $query = "INSERT INTO audio_table(course_id,audio_title,audio,teacher_id)VALUES('$course_id','$audio_title','$uploaded_file','$teacher_id')";
     $insert_row = $this->db->datainsert($query);
        if ($insert_row) {
          
          $loginmsg = "<div class='alert alert-success'>SuccessFully Uploaded</div>";
        return $loginmsg;
        }else{
          $loginmsg = "<div class='alert alert-danger'>try again</div>";
        return $loginmsg;
        }
      }
  }

}




