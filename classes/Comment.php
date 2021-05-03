
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Comment{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}

	public function commentviewByteacher($teacherId,$id){
		$query = "SELECT * FROM comment_table LEFT JOIN course_table ON course_table.courseId = comment_table.course_id WHERE teacherId='$teacherId' AND course_id='$id' ";
		$result = $this->db->dataselect($query);
		return $result;
	}
 
	
	public function commentviewBystudent($id){
		$query = "SELECT * FROM comment_table LEFT JOIN course_table ON course_table.courseId = comment_table.course_id LEFT JOIN student_table ON  student_table.student_id = comment_table.s_id WHERE course_id='$id' ";
		$result = $this->db->dataselect($query);
		return $result;
	}
	
	 
	

	public function updateComment($data,$replayid){
		$teacher_comment = $this->fm->validation($data['teacher_comment']);
		$teacher_comment = mysqli_real_escape_string($this->db->con, $teacher_comment);
	


		

		if (empty($teacher_comment)) {
				$loginmsg = "<div class='alert alert-danger'>Please write</div>";
        return $loginmsg;
		}
		else{



			$query = "UPDATE comment_table
                        SET
                        teacher_comment                 = '$teacher_comment',
                        teacher_status                 = '1'
                       
                        WHERE c_id             = ' $replayid'";
		 $insert_row = $this->db->dataupdate($query);
				if ($insert_row) {
				 
					$loginmsg = "<div class='alert alert-success'>Replay Successfully Send</div>";
        return $loginmsg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}	public function insertComment($data,$id){
		$student_comment = $this->fm->validation($data['student_comment']);
		$s_id = $this->fm->validation($data['s_id']);
		$student_comment = mysqli_real_escape_string($this->db->con, $student_comment);

		if (empty($student_comment)) {
				$loginmsg = "<div class='alert alert-danger'>Please Type your comment</div>";
				return $loginmsg;
		}elseif (strlen($student_comment)>199) {
			$loginmsg = "<div class='alert alert-danger'>Your comment length will 200 Words.</div>";
				return $loginmsg;
		}else{



	$query = "INSERT INTO comment_table (student_comment,s_id,course_id , student_status)VALUES('$student_comment','$s_id','$id','1')";
		 $insert_row = $this->db->datainsert($query);
				if ($insert_row) {
					$msg=  "<span style='color:green; font-size: 15px;'></span>";
					return $msg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}
	
		

}
