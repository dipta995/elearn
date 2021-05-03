
<?php
 
$filepath = realpath(dirname(__FILE__));
 
 
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 

 ?>
 
<?php
 class Other{
 	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}
	public function updateSocial($data){
		$facebook = $this->fm->validation($data['facebook']);
		$facebook = mysqli_real_escape_string($this->db->con, $facebook);
		$linked = $this->fm->validation($data['linked']);
		$linked = mysqli_real_escape_string($this->db->con, $linked);
		$twit = $this->fm->validation($data['twit']);
		$twit = mysqli_real_escape_string($this->db->con, $twit);
		

		if (empty($facebook) || empty($linked) || empty($twit)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
				return $loginmsg;
		}
		else{
			$query = "UPDATE social_table
                        SET
                        facebook                 = '$facebook',
                        linked                 = '$linked',
                        twit                 = '$twit'
                       
                        WHERE id             = '1'";
		 $insert_row = $this->db->dataupdate($query);
				if ($insert_row) {
					$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully Updated</span>";
					return $msg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}public function updateAbout($data){
		$head = $this->fm->validation($data['head']);
		$head = mysqli_real_escape_string($this->db->con, $head);
		$body = $this->fm->validation($data['body']);
		$body = mysqli_real_escape_string($this->db->con, $body);

		

		if (empty($head) || empty($body)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
				return $loginmsg;
		}
		else{
			$query = "UPDATE about_table
                        SET
                        head                 = '$head',
                        body                 = '$body'
                       WHERE id             = '0'";
		 $insert_row = $this->db->dataupdate($query);
				if ($insert_row) {
					$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully Updated</span>";
					return $msg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}

	
		public function StudentView(){
				$query = "SELECT * FROM student_table";
				$result = $this->db->dataselect($query);
				return $result;
		}
		public function TeacherView(){
						$query = "SELECT * FROM teacher_table";
						$result = $this->db->dataselect($query);
						return $result;
				}
		public function AdminView(){
						$query = "SELECT * FROM admin_table";
						$result = $this->db->dataselect($query);
						return $result;
				}

		public function AdminViewById($admin_id){
						$query = "SELECT * FROM admin_table WHERE admin_id = '$admin_id'";
						$result = $this->db->dataselect($query);
						return $result;
		}


		public function slideView(){
						$query = "SELECT * FROM slide_table";
						$result = $this->db->dataselect($query);
						return $result;
		}

	public function slideviewid($id){
							$query = "SELECT * FROM slide_table WHERE id= $id";
							$result = $this->db->dataselect($query);
							return $result;
			}





		public function insertAdminName($data){
		$first_name = $this->fm->validation($data['first_name']);
		$first_name = mysqli_real_escape_string($this->db->con, $first_name);
		$last_name = $this->fm->validation($data['last_name']);
		$last_name = mysqli_real_escape_string($this->db->con, $last_name);
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->con, $email);
		$password = $this->fm->validation($data['password']);
		$password = mysqli_real_escape_string($this->db->con, $password);
		$status = $this->fm->validation($data['status']);
		$status = mysqli_real_escape_string($this->db->con, $status);

		if (empty($first_name)||empty($last_name)||empty($email)||empty($password)||empty($status)) {
				$loginmsg = "<div class='alert alert-danger'>Please insert required data</div>";
        return $loginmsg;
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$loginmsg = "<div class='alert alert-danger'>Invalid Email Formet</div>";
				return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use A-z Character For Name</div>";
				return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use A-z Character For Name</div>";
				return $loginmsg;
		}elseif (strlen($password)<7) {
			$loginmsg = "<div class='alert alert-danger'>Minimum Password Will Eight Character</div>";
				return $loginmsg;
		}else{
			$sql = "SELECT * FROM admin_table WHERE email= '$email'";
				$result = $this->db->dataselect($sql);
				if ($result==false) {
				 
			
			$query = "INSERT INTO admin_table(first_name,last_name,email,password,status)VALUES('$first_name','$last_name','$email','$password','$status')";
		 $insert_row = $this->db->datainsert($query);
				if ($insert_row) {
					$loginmsg = "<div class='alert alert-success'>New Employ Created</div>";
        	return $loginmsg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
			}else{
				$loginmsg = "<div class='alert alert-danger'>Email exist</div>";
				return $loginmsg;
			}
		}
	}
	public function updateAdminNameByid($data,$id){
			$first_name = $this->fm->validation($data['first_name']);
			$first_name = mysqli_real_escape_string($this->db->con, $first_name);
			$last_name = $this->fm->validation($data['last_name']);
			$last_name = mysqli_real_escape_string($this->db->con, $last_name);
			$email = $this->fm->validation($data['email']);
			$email = mysqli_real_escape_string($this->db->con, $email);
			$password = $this->fm->validation($data['password']);
			$password = mysqli_real_escape_string($this->db->con, $password);
			$status = $this->fm->validation($data['status']);
			$status = mysqli_real_escape_string($this->db->con, $status);

			if (empty($first_name)) {
					$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
					return $loginmsg;
			}
			else{
				
			 $query = "UPDATE admin_table
                        SET
                        first_name      = '$first_name',
                        last_name       = '$last_name',
                        email           = '$email',
                        password        = '$password',
                        status          = '$status'
                       
                        WHERE admin_id        = '$id'";
		 $insert_row = $this->db->dataupdate($query);
					if ($insert_row) {
						$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully updated</span>";
						return $msg;
					}else{
						$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
						return $msg;
					}
			}
		}
		public function updatevideostatus($id){
		

					if (empty($id)) {
							$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
							return $loginmsg;
					}
					else{
						
					 $query = "UPDATE data_table
		                        SET
		                       status      = '1'
		                       
		                        WHERE data_id        = '$id'";
				 $insert_row = $this->db->dataupdate($query);
							if ($insert_row) {
								$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully updated</span>";
								return $msg;
							}else{
								$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
								return $msg;
							}
					}
				}public function updatevideostatusA($id){
		

					if (empty($id)) {
							$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
							return $loginmsg;
					}
					else{
						
					 $query = "UPDATE data_table
		                        SET
		                       status      = '0'
		                       
		                        WHERE data_id        = '$id'";
				 $insert_row = $this->db->dataupdate($query);
							if ($insert_row) {
								$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully updated</span>";
								return $msg;
							}else{
								$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
								return $msg;
							}
					}
				}
public function updateaudiostatus($id){
		

					if (empty($id)) {
							$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
							return $loginmsg;
					}
					else{
						
					 $query = "UPDATE audio_table
		                        SET
		                       status      = '1'
		                       
		                        WHERE audio_id        = '$id'";
				 $insert_row = $this->db->dataupdate($query);
							if ($insert_row) {
								$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully updated</span>";
								return $msg;
							}else{
								$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
								return $msg;
							}
					}
				}
				public function updateaudiostatusA($id){
		

					if (empty($id)) {
							$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
							return $loginmsg;
					}
					else{
						
					 $query = "UPDATE audio_table
		                        SET
		                       status      = '0'
		                       
		                        WHERE audio_id        = '$id'";
				 $insert_row = $this->db->dataupdate($query);
							if ($insert_row) {
								$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully updated</span>";
								return $msg;
							}else{
								$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
								return $msg;
							}
					}
				}
public function updatefilestatus($id){
		

					if (empty($id)) {
							$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
							return $loginmsg;
					}
					else{
						
					 $query = "UPDATE file_table
		                        SET
		                       status      = '1'
		                       
		                        WHERE file_id        = '$id'";
				 $insert_row = $this->db->dataupdate($query);
							if ($insert_row) {
								$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully updated</span>";
								return $msg;
							}else{
								$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
								return $msg;
							}
					}
				}


					public function updatefilestatusA($id){
		

				
					if (empty($id)) {
							$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
							return $loginmsg;
					}
					else{
						
					 $query = "UPDATE file_table
		                        SET
		                       status      = '0'
		                       
		                        WHERE file_id        = '$id'";
				 $insert_row = $this->db->dataupdate($query);
							if ($insert_row) {
								$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully updated</span>";
								return $msg;
							}else{
								$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
								return $msg;
							}
					}
				}









		public function aboutView(){
			$query = "SELECT * FROM about_table";
			$result = $this->db->dataselect($query);
			return $result;
		}

	/*	public function teacherView(){
			$query = "SELECT * FROM teacher_table";
			$result = $this->db->dataselect($query);
			return $result;
		}*/
		public function teacherViewbyid($id){
			$query = "SELECT * FROM teacher_table WHERE teacher_id = '$id'";
			$result = $this->db->dataselect($query);
			return $result;
		}


		public function courseView(){
			$query = "SELECT * FROM catagory_table";
			$result = $this->db->dataselect($query);
			return $result;
		}
	public function officeview(){
				$query = "SELECT * FROM office_table";
				$result = $this->db->dataselect($query);
				return $result;
			}
	public function socialview(){
					$query = "SELECT * FROM social_table";
					$result = $this->db->dataselect($query);
					return $result;
				}
public function courseViewStudentaudio(){
					$query = "SELECT * FROM audio_table  LEFT JOIN  course_table ON audio_table.course_id = course_table.courseId";
					$result = $this->db->dataselect($query);
					return $result;
				}


		




				public function courseViewStudentaudiopagi($a,$b){
					$query = "SELECT * FROM audio_table  LEFT JOIN  course_table ON audio_table.course_id = course_table.courseId ORDER BY status ASC limit $a, $b ";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function courseViewStudentaudiopagibyid($id,$a,$b){
					$query = "SELECT * FROM audio_table  LEFT JOIN  course_table ON audio_table.course_id = course_table.courseId where audio_table.course_id=$id limit $a, $b ";
					$result = $this->db->dataselect($query);
					return $result;
				}
public function courseViewStudentvideo(){
					$query = "SELECT * FROM data_table LEFT JOIN course_table ON data_table.course_id = course_table.courseId";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function courseViewStudentvideopagi($a, $b){
					$query = "SELECT * FROM data_table LEFT JOIN course_table ON data_table.course_id = course_table.courseId ORDER BY status ASC limit $a, $b";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function courseViewStudentvideopagibyid($id,$a, $b){
									$query = "SELECT * FROM data_table LEFT JOIN course_table ON data_table.course_id = course_table.courseId where data_table.course_id=$id  limit $a, $b";
									$result = $this->db->dataselect($query);
									return $result;
								}





public function courseViewStudentfile(){
					$query = "SELECT * FROM file_table LEFT JOIN course_table ON file_table.course_id = course_table.courseId";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function courseViewStudentfilepagi($a,$b){
					$query = "SELECT * FROM file_table LEFT JOIN course_table ON file_table.course_id = course_table.courseId ORDER BY status ASC limit $a, $b";
					$result = $this->db->dataselect($query);
					return $result;
				}
	public function courseViewStudentfilepagibyid($id,$a,$b){
						$query = "SELECT * FROM file_table LEFT JOIN course_table ON file_table.course_id = course_table.courseId where file_table.course_id=$id limit $a, $b";
						$result = $this->db->dataselect($query);
						return $result;
					}




				public function newsfeedview(){
					$query = "SELECT * FROM news_table limit 4";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function newsfeed(){
					$query = "SELECT * FROM news_table";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function newsfeedpagination($a,$b){
					$query = "SELECT * FROM news_table limit $a,$b";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function newsfeedviewspin(){
					$query = "SELECT * FROM news_table ORDER BY RAND() limit 1";
					$result = $this->db->dataselect($query);
					return $result;
				}
				public function newsfeedviewid($id){
									$query = "SELECT * FROM news_table WHERE news_id = $id";
									$result = $this->db->dataselect($query);
									return $result;
								}


				public function insertNewsfeed($data,$file){
		$news_title = $this->fm->validation($data['news_title']);
		$news_title = mysqli_real_escape_string($this->db->con, $news_title);
		$news_details = $this->fm->validation($data['news_details']);
		$news_details = mysqli_real_escape_string($this->db->con, $news_details);


		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div            = explode('.', $file_name);
		$file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images/".$unique_image;
	    $move_image = "../images/".$unique_image;


			if (empty($news_title) || empty($news_details)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
				return $loginmsg;


		}else{


		move_uploaded_file($file_temp, $move_image);
		$query = "INSERT INTO news_table(news_title,news_details,image)VALUES('$news_title','$news_details','$uploaded_image')";
		 $insert_row = $this->db->datainsert($query);

				if ($insert_row) {
					$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully Inserted</span>";
					return $msg;
					
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}

 
			}
	} 
		public function insertslide($data,$file){
		$title = $this->fm->validation($data['title']);
		$title = mysqli_real_escape_string($this->db->con, $title);
 


		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div            = explode('.', $file_name);
		$file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images/".$unique_image;
	    $move_image = "../images/".$unique_image;


			if (empty($title)) {
				$loginmsg = "<span style='color:red; font-size: 15px;'>field must not be empty</span>";
				return $loginmsg;


		}else{


		move_uploaded_file($file_temp, $move_image);
		$query = "INSERT INTO slide_table(title,image)VALUES('$title','$uploaded_image')";
		 $insert_row = $this->db->datainsert($query);

				if ($insert_row) {
					$msg=  "<span style='color:green; font-size: 15px;'>SuccessFully Inserted</span>";
					return $msg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}

 
			}
	}





	public function updateslide($data,$file,$id){
            $title = $this->fm->validation($data['title']);
			$title = mysqli_real_escape_string($this->db->con, $title);


            $permited  = array('jpg', 'jpeg', 'png', 'docs', 'pptx', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];


            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_file = "images/".$unique_file;
            $move_file = "../images/".$unique_file;



              if (empty($title)) {
                $loginmsg = "<span style='color:red; font-size: 15px;'>Course title must not be empty</span>";
                return $loginmsg;
            }else{
              if (!empty($file_name)) {
                move_uploaded_file($file_temp, $move_file);
                 $query = "UPDATE slide_table
                                SET
                                 title                 = '$title',
                                image                       = '$uploaded_file'
                                WHERE id              = '$id'";
              } else{
                 $query = "UPDATE slide_table
                                SET
                                
                                title                 = '$title'
                                WHERE id             = '$id'";
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














 }
?>