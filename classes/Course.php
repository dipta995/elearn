
<?php

$filepath = realpath(dirname(__FILE__));


include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

 ?>

<?php

class Course{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}
 
	public function courseInsert($data,$file){
		$course_name = $this->fm->validation($data['course_name']);
		$course_name = mysqli_real_escape_string($this->db->con, $course_name);
		$catId = $this->fm->validation($data['catId']);
		$catId = mysqli_real_escape_string($this->db->con, $catId);
		$course_overview = $this->fm->validation($data['course_overview']);
		$course_overview = mysqli_real_escape_string($this->db->con, $course_overview);
		$teacherId = $this->fm->validation($data['teacherId']);
		$teacherId = mysqli_real_escape_string($this->db->con, $teacherId);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div            = explode('.', $file_name);
		$file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images/".$unique_image;
	    $move_image = "../images/".$unique_image;


			if (empty($course_name) || empty($catId) || empty($course_overview)| empty($file_name) ) {
				$loginmsg = "<div class='alert alert-danger'>All Field is Required</div>";
				return $loginmsg;


		}else{


		move_uploaded_file($file_temp, $move_image);
		$query = "INSERT INTO course_table(course_name,image,teacherId,catId,course_overview)VALUES('$course_name','$uploaded_image','$teacherId','$catId','$course_overview')";
		 $insert_row = $this->db->datainsert($query);
				$querys = "INSERT INTO  rate_table(course_name)VALUES('$course_name')";
		 $insert_rowss = $this->db->datainsert($querys);
				if ($insert_row && $insert_rowss) {
					$loginmsg = "<div class='alert alert-success'>course Created successfully</div>";
				return $loginmsg;
					  
					return "<script> window.location = 'viewcourse.php';</script>";
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Something wrong try again</span>";
					return $msg;
				}

 
			}
	}
	public function courseView($teacherId){
		$query = "SELECT * FROM course_table WHERE teacherId = $teacherId";
		$result = $this->db->dataselect($query);
		return $result;
	}
	public function courseViewbyId( $teacherId,$id){
		$query = "SELECT * FROM course_table LEFT JOIN data_table ON course_table.courseId = data_table.course_id WHERE data_id = $id AND teacherId = $teacherId";
		$result = $this->db->dataselect($query);
		return $result;
	}public function coursefileViewbyId( $teacherId,$id){
		$query = "SELECT * FROM course_table LEFT JOIN file_table ON course_table.courseId = file_table.course_id WHERE file_id = $id AND teacherId = $teacherId";
		$result = $this->db->dataselect($query);
		return $result;
	}public function courseaudioViewbyId( $teacherId,$id){
		$query = "SELECT * FROM course_table LEFT JOIN audio_table ON course_table.courseId = audio_table.course_id WHERE audio_id = $id AND teacherId = $teacherId";
		$result = $this->db->dataselect($query);
		return $result;
	}
 
	public function coursetitleViewbyId( $teacherId,$id){
		$query = "SELECT * FROM course_table LEFT JOIN catagory_table ON course_table.catId = catagory_table.catId WHERE courseId = $id AND teacherId = $teacherId";
		$result = $this->db->dataselect($query);
		return $result;
	}
	public function videoViewbyId($id){
		$query = "SELECT * FROM data_table WHERE data_id = $id";
		$result = $this->db->dataselect($query);
		return $result;
	}
	public function courseViewByteacher($teacherId){
		$query = "SELECT * FROM course_table WHERE teacherId = $teacherId";
		$result = $this->db->dataselect($query);
		return $result;
	}
	public function courseViewStudent(){
		$query = "SELECT * FROM course_table LEFT JOIN catagory_table ON course_table.catId = catagory_table.catId";
		$result = $this->db->dataselect($query);
		return $result;
	}
	public function courseViewStudentids($c){
		$query = "SELECT * FROM course_table LEFT JOIN catagory_table ON course_table.catId = catagory_table.catId WHERE course_table.catId=$c";
		$result = $this->db->select($query);
		return $result;
	} public function courseViewStudentlimit($a,$b,$c){
		$query = "SELECT * FROM course_table LEFT JOIN catagory_table ON course_table.catId = catagory_table.catId WHERE course_table.catId=$c limit $a,$b";
		$result = $this->db->dataselect($query);
		return $result;
	} public function courseViewStudentlimits(){
		$query = "SELECT * FROM course_table LEFT JOIN catagory_table ON course_table.catId = catagory_table.catId limit 7";
		$result = $this->db->dataselect($query);
		return $result;
	} 
	

		 public function teacher_profile($id){
			$query = "SELECT * FROM teacher_table  WHERE teacher_id='$id' ";
			$result = $this->db->dataselect($query);
			return $result;
		}


}
