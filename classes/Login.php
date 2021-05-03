
<?php
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
 Session::checkLogin();


include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

 ?>

<?php

class Login{
	private $db;
	private $fm; 
	
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}

	public function gmailDataInsert($data){
		$first_name = $this->fm->validation($data['fname']);
		$first_name = mysqli_real_escape_string($this->db->con, $first_name);
		$last_name = $this->fm->validation($data['lname']);
		$last_name = mysqli_real_escape_string($this->db->con, $last_name);
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->con, $email);

		$query = "INSERT INTO student_table(first_name,last_name,email)VALUES('$first_name','$last_name','$email')";
		 $insert_row = $this->db->datainsert($query);
				if ($insert_row) {
					header("Location:../index.php");
				}else{
					$msg=  "<span class='error'>Try again</span>";
					return $msg;
				}


	}



	public function studentDataInsert($data){
		$first_name = $this->fm->validation($data['first_name']);
		$first_name = mysqli_real_escape_string($this->db->con, $first_name);
		$last_name = $this->fm->validation($data['last_name']);
		$last_name = mysqli_real_escape_string($this->db->con, $last_name);
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->con, $email);
		$password = $this->fm->validation($data['password']);
		$password = mysqli_real_escape_string($this->db->con, $password);
		$password=md5($password);

			if (empty($first_name) || empty($last_name)  || empty($email) || empty($password)) {
				$loginmsg = "<div class='alert alert-danger'>All Field is Required</div>";
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
		}

		else{

			$sql = "SELECT * FROM student_table WHERE email= '$email'";
				$result = $this->db->dataselect($sql);
				if ($result==false) {
						$query = "INSERT INTO student_table(first_name,last_name,email,password)VALUES('$first_name','$last_name','$email','$password')";
		 $insert_row = $this->db->datainsert($query);
				if ($insert_row) {
					header("Location:glog/index.php");
				}else{
					$msg=  "<span class='error'>Try again</span>";
					return $msg;
				}
					
				}else{
					$loginmsg = "<div class='alert alert-danger'>Already Registeded</div>";
				return $loginmsg;

				}
		}
	}


		public function studentLogin($studentEmail, $studentPass){
			$studentEmail = $this->fm->validation($studentEmail);
			$studentPass = $this->fm->validation($studentPass);

			$adminEmail = mysqli_real_escape_string($this->db->con, $studentEmail);
			$studentPass = mysqli_real_escape_string($this->db->con, $studentPass);
			$studentPass = md5($studentPass);

			if (empty($studentEmail) || empty($studentPass)) {
				$loginmsg = "<div class='alert alert-danger'>Please Enter Your Email And Password</div>";
				return $loginmsg;
			}else{
				$sql = "SELECT * FROM student_table WHERE email= '$studentEmail' and password = '$studentPass'";
				$result = $this->db->dataselect($sql);
				if ($result != false ) {
					$value = $result->fetch_assoc();
					Session::set("login",true);
					Session::set("first_name",$value['first_name']);
                    Session::set("last_name",$value['last_name']);
                    Session::set("student_id",$value['student_id']);

					echo "<script>window.location= '../index.php';</script>";

				}else{
					$loginmsg = "<div class='alert alert-danger'>Email and password does not match </div>";
				return $loginmsg;

				}

			}

		}
public function studentLoginre($studentEmail, $studentPass,$backlink){
			$studentEmail = $this->fm->validation($studentEmail);
			$studentPass = $this->fm->validation($studentPass);

			$adminEmail = mysqli_real_escape_string($this->db->con, $studentEmail);
			$studentPass = mysqli_real_escape_string($this->db->con, $studentPass);
			$studentPass=md5($studentPass);

			if (empty($studentEmail) || empty($studentPass)) {
				$loginmsg = "<div class='alert alert-danger'>Please Enter Your Email And Password</div>";
				return $loginmsg;
			}else{
				$sql = "SELECT * FROM student_table WHERE email= '$studentEmail' and password = '$studentPass'";
				$result = $this->db->dataselect($sql);
				if ($result != false ) {
					$value = $result->fetch_assoc();
					Session::set("login",true);
					Session::set("first_name",$value['first_name']);
                    Session::set("last_name",$value['last_name']);
                    Session::set("student_id",$value['student_id']);

					echo "<script>window.location='$backlink';</script>";

				}else{
					$loginmsg = "<div class='alert alert-danger'>Email and password does not match </div>";
				return $loginmsg;

				}

			}

		}






	public function tracherDataInsert($data,$file){
		$first_name = $this->fm->validation($data['first_name']);
		$first_name = mysqli_real_escape_string($this->db->con, $first_name);
		$last_name = $this->fm->validation($data['last_name']);
		$last_name = mysqli_real_escape_string($this->db->con, $last_name);
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->con, $email);
		$phone = $this->fm->validation($data['phone']);
		$phone = mysqli_real_escape_string($this->db->con, $phone);
		$password = $this->fm->validation($data['password']);
		$password = mysqli_real_escape_string($this->db->con, $password);
		$password=md5($password);


		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div            = explode('.', $file_name);
		$file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images/".$unique_image;
	    $move_image = "../images/".$unique_image;


			if (empty($first_name)  || empty($last_name)  || empty($email) || empty($phone) || empty($password)) {
				$loginmsg = "<div class='alert alert-danger'>All Field is Required</div>";
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
		}elseif (preg_match("/[^0-9+\(\)-]/",$phone)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use 0-9 Character For Mobile Number</div>";
				return $loginmsg;
		}elseif (strlen($password)<7) {
			$loginmsg = "<div class='alert alert-danger'>Minimum Password Will Eight Character</div>";
				return $loginmsg;
		}

	
		else{
			$sql = "SELECT * FROM teacher_table WHERE email= '$email'";
				$result = $this->db->dataselect($sql);
				if ($result==false) { 
					move_uploaded_file($file_temp, $move_image);
			$query = "INSERT INTO teacher_table(first_name,last_name,email,image,phone,password)VALUES('$first_name','$last_name','$email','$uploaded_image','$phone','$password')";
		 $insert_row = $this->db->datainsert($query);
				if ($insert_row) {
					header("Location:login.php");
				}else{
					$msg=  "<span class='error'>Try again</span>";
					return $msg;
				}
			}else{
				$loginmsg = "<div class='alert alert-danger'>Already Registeded</div>";
				return $loginmsg;
			}






			
			}


	}





	public function teacherLogin($teacherEmail, $teacherPass){
			$teacherEmail = $this->fm->validation($teacherEmail);
			$teacherPass = $this->fm->validation($teacherPass);

			$adminEmail = mysqli_real_escape_string($this->db->con, $teacherEmail);
			$teacherPass = mysqli_real_escape_string($this->db->con, $teacherPass);
			$teacherPass = md5($teacherPass);

			if (empty($teacherEmail) || empty($teacherPass)) {
				$loginmsg = "<div class='alert alert-danger'>Enter Your Email and password </div>";
				return $loginmsg;
			}else{
				$sql = "SELECT * FROM teacher_table WHERE email= '$teacherEmail' and password = '$teacherPass'";
				$result = $this->db->dataselect($sql);
				if ($result !=false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
              if ($row > 0) {
                    Session::set("login", true);

                    Session::set("teacher_id",$value['teacher_id']);
                    Session::set("first_name",$value['first_name']);
                    Session::set("last_name",$value['last_name']);
                    header("Location:index.php");
                } else {
                    $loginmsg = "<div class='alert alert-danger'>Email and password does not match </div>";
				return $loginmsg;

                }

            }else{
					$loginmsg = "<div class='alert alert-danger'>Email and password does not match </div>";
				return $loginmsg;

				}

			}

		}




	public function adminLogin($adminEmail, $adminPass){


	 $adminEmail = $this->fm->validation($adminEmail);
            $adminPass = $this->fm->validation($adminPass);

            $adminEmail = mysqli_real_escape_string($this->db->con, $adminEmail);
            $adminPass = mysqli_real_escape_string($this->db->con, $adminPass);

            if (empty($adminEmail) || empty($adminPass)) {
                $loginmsg = "<div class='alert alert-danger'>Please Enter Email and Password</div>";
        return $loginmsg;
            }else{
                $sql = "SELECT * FROM admin_table WHERE email= '$adminEmail' and password = '$adminPass'";
                $result = $this->db->dataselect($sql);
                if ($result != false ) {

                    $value = $result->fetch_assoc();
                    Session::set("login",true);
                    Session::set("admin_id",$value['admin_id']);
                    Session::set("status",$value['status']);
                    Session::set("last_name",$value['last_name']);
                    Session::set("first_name",$value['first_name']);
                    header('Location: index.php');

                }else{
                    
                    $loginmsg = "<div class='alert alert-danger'>Invelied user or passwordd</div>";
        return $loginmsg;

                }

            }

        }






}
?>
