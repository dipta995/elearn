
<?php
 
$filepath = realpath(dirname(__FILE__));
 
 
include_once ($filepath.'/../lib/Database.php'); 
include_once ($filepath.'/../helpers/Format.php'); 

 ?>
 
<?php

class Catagory{
	private $db;
	private $fm;
		// construct can access anywhere in class
	public function __construct(){
		$this->db = new Database_logic();
		$this->fm = new Format();
	}

	public function insertCatName($data){
		$catName = $this->fm->validation($data['catName']);
		$catName = mysqli_real_escape_string($this->db->con, $catName);

		if (empty($catName)) {
				$loginmsg = "<div class='alert alert-danger'>Enter New catagory Name</div>";
        return $loginmsg;
		}
		else{
			$query = "INSERT INTO catagory_table(catName)VALUES('$catName')";
		 $insert_row = $this->db->datainsert($query);
				if ($insert_row) {
					$loginmsg = "<div class='alert alert-success'>New Catagory Created</div>";
        return $loginmsg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}
	public function updateCatName($data,$id){
		$catName = $this->fm->validation($data['catName']);
		$catName = mysqli_real_escape_string($this->db->con, $catName);
		

		if (empty($catName)) {
				$loginmsg = "<div class='alert alert-danger'>Enter Proper Data</div>";
        return $loginmsg;
		}
		else{
			$query = "UPDATE catagory_table
                        SET
                        catName                 = '$catName'
                       
                        WHERE catId             = '$id'";
		 $insert_row = $this->db->dataupdate($query);
				if ($insert_row) {
					$loginmsg = "<div class='alert alert-success'>Catagory Name Updated</div>";
        return $loginmsg;
				}else{
					$msg=  "<spanstyle='color:red; font-size: 15px;'>Try again</span>";
					return $msg;
				}
		}
	}
	public function catView(){
		$query = "SELECT * FROM catagory_table";
		$result = $this->db->dataselect($query);
		return $result;
	}
	public function catViewById($id){
		$query = "SELECT * FROM catagory_table WHERE catId = '$id'";
		$result = $this->db->dataselect($query);
		return $result;
	}
	
}