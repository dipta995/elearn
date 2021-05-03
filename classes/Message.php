
<?php
 
$filepath = realpath(dirname(__FILE__));
 
 
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 

 ?>
 
<?php
 class Message{
 	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}


	public function insertStudentMessage($data){
		$f_name = $this->fm->validation($data['f_name']);
		$f_name = mysqli_real_escape_string($this->db->con, $f_name);
		$l_name = $this->fm->validation($data['l_name']);
		$l_name = mysqli_real_escape_string($this->db->con, $l_name);
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->con, $email);
		$message = $this->fm->validation($data['message']);
		$message = mysqli_real_escape_string($this->db->con, $message);
		$phone = $this->fm->validation($data['phone']);
		$phone = mysqli_real_escape_string($this->db->con, $phone);

		if (empty($f_name)||empty($l_name)||empty($email)||empty($message)||empty($message)||empty($phone)) {
				$loginmsg = "<div class='alert alert-danger'>Please Fill up All the fields </div>";
				return $loginmsg;
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$loginmsg = "<div class='alert alert-danger'>Invalid Email Formet</div>";
				return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$f_name)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use A-z Character For Name</div>";
				return $loginmsg;
		}elseif (!preg_match("/^[a-zA-Z-' ]*$/",$l_name)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use A-z Character For Name</div>";
				return $loginmsg;
		}elseif (strlen($message)>300) {
			$loginmsg = "<div class='alert alert-danger'>You can not use more then 300 Word</div>";
				return $loginmsg;
		}elseif (preg_match("/[^0-9+\(\)-]/",$phone)) {
			$loginmsg = "<div class='alert alert-danger'>You Can only Use 0-9 Character For Mobile Number</div>";
				return $loginmsg;
		} 
		else{
			$query = "INSERT INTO message_table(f_name,l_name,email,phone,message)VALUES('$f_name','$l_name','$email','$phone','$message')";
		 $insert_row = $this->db->datainsert($query);
				if ($insert_row) {
					$loginmsg = "<div class='alert alert-success'>Successfully Send </div>";
				return $loginmsg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}


		public function studentMessageView(){
				$query = "SELECT * FROM message_table WHERE status='0'";
				$result = $this->db->dataselect($query);
				return $result;
		}
		public function studentMessageViewseen(){
				$query = "SELECT * FROM message_table WHERE status='1'";
				$result = $this->db->dataselect($query);
				return $result;
		}
		

		public function seenup($id){
			 $query = "update message_table
                    set 
                    status = '1'
                    where message_id = '$id' ";
        $update_row = $this->db->dataupdate($query);
        if ($update_row) {
            echo "<span class='success'>Message send in seen box!</span>";
        } else {
            echo "<span class='error'>Something wrong !</span>";
        }
		}

		public function unseenup($id){
			 $query = "update message_table
                    set 
                    status = '0'
                    where message_id = '$id' ";
        $update_row = $this->db->dataupdate($query);
        if ($update_row) {
            echo "<span class='success'>Message send in Unseen box!</span>";
        } else {
            echo "<span class='error'>Something wrong !</span>";
        }
		}

		

}