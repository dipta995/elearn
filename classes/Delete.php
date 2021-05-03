
<?php
 
$filepath = realpath(dirname(__FILE__));
 
 
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 

 ?>
 
<?php

class Delete{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}

	public function deleteadmin($id){
	//$id = mysqli_real_escape_string($this->db->link, $id);
	$query = "DELETE FROM admin_table WHERE admin_id = '$id'";
	$deldata = $this->db->datadelete($query);
	if ($deldata) {
		$msg = "<span class='success'>  Successfully Deleted.</span>";
		return $msg;
	}
	}public function delpostbyid($id){
	//$id = mysqli_real_escape_string($this->db->link, $id);
	$query = "DELETE FROM data_table WHERE data_id = '$id'";
	$deldata = $this->db->datadelete($query);
	if ($deldata) {
		$msg = "<span class='success'>  Successfully Deleted.</span>";
		return $msg;
	}
	}
	public function deletemsg($id){
		//$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM message_table WHERE message_id = '$id'";
		$deldata = $this->db->datadelete($query);
		if ($deldata) {
			$msg = "<span class='success'>  Successfully Deleted.</span>";
			return $msg;
		}
		}
		public function deletecat($id){
		//$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM catagory_table WHERE catId = '$id'";
		$deldata = $this->db->datadelete($query);
		if ($deldata) {
			$msg = "<span class='success'>  Successfully Deleted.</span>";
			return $msg;
		}
		}
		public function deletestudent($id){
		//$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM student_table WHERE student_id = '$id'";
		$deldata = $this->db->datadelete($query);
		if ($deldata) {
			$msg = "<span class='success'>  Successfully Deleted.</span>";
			return $msg;
		}
		}
		public function deleteteacher($id){
		//$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "DELETE FROM teacher_table WHERE teacher_id = '$id'";
		$deldata = $this->db->datadelete($query);
		if ($deldata) {
			$msg = "<span class='success'>  Successfully Deleted.</span>";
			return $msg;
		}
		}

	public function delaudiopostbyid($id){
		$query = "SELECT * FROM audio_table WHERE audio_id = '$id'";
	    	$result = $this->db->dataselect($query);
	    if ($result) {
	        while ($delimg = $result->fetch_assoc()) {
	            $dellink = '../'.$delimg['audio'];
	           // $delrate = $delimg['course_name'];
	            unlink($dellink);
	        }
	    } 
	//$id = mysqli_real_escape_string($this->db->link, $id);
	$query = "DELETE FROM audio_table WHERE audio_id = '$id'";
	$deldata = $this->db->datadelete($query);
	if ($deldata) {
		$msg = "<span class='success'>  Successfully Deleted.</span>";
		return $msg;
	}
	}


public function delslide($id){
		$query = "SELECT * FROM slide_table WHERE id = '$id'";
	    	$result = $this->db->dataselect($query);
	    if ($result) {
	        while ($delimg = $result->fetch_assoc()) {
	            $dellink = '../'.$delimg['image'];
	           // $delrate = $delimg['course_name'];
	            unlink($dellink);
	        }
	    } 
	//$id = mysqli_real_escape_string($this->db->link, $id);
	$query = "DELETE FROM slide_table WHERE id = '$id'";
	$deldata = $this->db->datadelete($query);
	if ($deldata) {
		$msg = "<span class='success'>  Successfully Deleted.</span>";
		return $msg;
	}
	}

public function delfilepostbyid($id){
		$query = "SELECT * FROM file_table WHERE file_id = '$id'";
	    	$result = $this->db->dataselect($query);
	    if ($result) {
	        while ($delimg = $result->fetch_assoc()) {
	            $dellink = '../'.$delimg['file_txt'];
	           // $delrate = $delimg['course_name'];
	            unlink($dellink);
	        }
	    } 
	//$id = mysqli_real_escape_string($this->db->link, $id);
	$query = "DELETE FROM file_table WHERE file_id = '$id'";
	$deldata = $this->db->datadelete($query);
	if ($deldata) {
		$msg = "<span class='success'>  Successfully Deleted.</span>";
		return $msg;
	}
	}

	public function delcoursebyid($id){
		$delrate = "";
		//$id = mysqli_real_escape_string($this->db->link, $id);

	$query = "SELECT * FROM course_table WHERE courseId = '$id'";
	    	$result = $this->db->dataselect($query);
	    if ($result) {
	        while ($delimg = $result->fetch_assoc()) {
	            $dellink = '../'.$delimg['image'];
	            $delrate = $delimg['course_name'];
	            unlink($dellink);
	        }
	    } 

		$query =" DELETE FROM course_table WHERE courseId='$id'";
		$deldata = $this->db->datadelete($query);
		$querye =" DELETE FROM data_table WHERE course_id='$id'";
		$deldatae = $this->db->datadelete($querye);
		$queryes =" DELETE FROM rate_table WHERE course_name='$delrate'";
		$deldataes = $this->db->datadelete($queryes);
		if ($deldata) {
			$msg = "<span class='success'>  Successfully Deleted.</span>";
			return $msg;
		}
		}
		public function delnews($id){
				$delrate = "";
				//$id = mysqli_real_escape_string($this->db->link, $id);

			$query = "SELECT * FROM news_table WHERE news_id = '$id'";
			    	$result = $this->db->dataselect($query);
			    if ($result) {
			        while ($delimg = $result->fetch_assoc()) {
			            $dellink = '../'.$delimg['image'];
			       
			            unlink($dellink);
			        }
			    } 

				$query =" DELETE FROM news_table WHERE news_id='$id'";
				$deldata = $this->db->datadelete($query);
				 
				if ($deldata) {
					$msg = "<span class='success'>  Successfully Deleted.</span>";
					return $msg;
				}
				}

	
}