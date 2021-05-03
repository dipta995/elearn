
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Rate{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}
 
	
	public function avgRate($course_name){
			$query = "SELECT * FROM rate_table INNER JOIN course_table ON rate_table.course_name = course_table.course_name WHERE course_table.course_name ='$course_name' ";
			$result = $this->db->dataselect($query);
			
   
    return $result;


	}

	public function updateRating($data,$course_name,$student_id){
		$rateNum = $this->fm->validation($data['rateNum']);
		$rateNum = mysqli_real_escape_string($this->db->con, $rateNum);
		$totalhit = $this->fm->validation($data['totalhit']);
		$totalhit = mysqli_real_escape_string($this->db->con, $totalhit);
		$ratenumber = $this->fm->validation($data['ratenumber']);
		$ratenumber = mysqli_real_escape_string($this->db->con, $ratenumber);


		

		if (empty($rateNum)) {
				$loginmsg = "<div class='alert alert-danger'>Please Rate !</div>";
				return $loginmsg;
		}
		else{

			$sql = "SELECT * FROM ratechack_table WHERE student_id= '$student_id' and course_name = '$course_name'";
				$result = $this->db->dataselect($sql);
				if ($result !=false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
              if ($row > 0) {
					$loginmsg = "<div class='alert alert-danger'>Already Voted By you</div>";
				return $loginmsg;
              } else{



              }
          }




			$query = "INSERT INTO ratechack_table(student_id,course_name)VALUES('$student_id','$course_name')";
		 $insert_row = $this->db->datainsert($query);



$ratenumber = $rateNum + $ratenumber;

			$query = "UPDATE rate_table
                        SET
                        rateNum                 = '$ratenumber',
                        totalHit                 = '$totalhit'
                       
                        WHERE course_name             = '$course_name'";
		 $up_row = $this->db->dataupdate($query);
				if ($up_row) {
					$loginmsg = "<div class='alert alert-success'>Ratting successful</div>";
				return $loginmsg;
					return $msg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}
		

}
