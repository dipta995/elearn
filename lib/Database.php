<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("NAME", "e_learn");
 
 
Class Database_logic{
	public $host   = HOST;
	public $user   = USER;
	public $pass   = PASS;
	public $name   = NAME;
	public $con;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
	$this->con = new mysqli($this->host, $this->user, $this->pass, $this->name);
	if(!$this->con){
		$this->error ="Connection fail".$this->con->connect_error;
		return false;
	}
 }



	public function dataselect($sql){
		$result = $this->con->query($sql);
		if($result->num_rows >0){
			return $result;
		} else {
			return false;
		}
	}
	public function select($sql){
		return $result = $this->con->query($sql);
		 
	}
 


	public function datainsert($sql){
	$insert_row = $this->con->query($sql);
	if($insert_row){
		return $insert_row;
	} else {
		return false;
	}
  }


  	public function dataupdate($sql){
	$update_row = $this->con->query($sql);
	if($update_row){
		return $update_row;
	} else {
		return false;
	}
  }


   public function datadelete($sql){
	$delete_row = $this->con->query($sql);
	if($delete_row){
		return $delete_row;
	} else {
		return false;
	}
  }



}
